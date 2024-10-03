<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookSubCategory;
use App\Models\Contact;
use App\Models\DealOfTheDay;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    function Index()
    {

        $Featured = Book::all()->where('isFeatured', true);
        $NewArrival = Book::all()->where('created_at', '>=', Carbon::now()->subDays(30));
        $MostSelling = DB::table('books')
            ->join('user_orders', 'user_orders.book_id', '=', 'books.id')
            ->join('users', 'users.id', '=', 'books.author_id')

            ->select([
                DB::raw('SUM(user_orders.quantity) as Quantity'),
                'books.id',
                'users.displayName as author',
                'books.author_id',
                'books.subcategory_id',
                'books.isFeatured',
                'books.RewardPoints',
                'books.productSummary',
                'books.title',
                'books.brand',
                'books.image',
                'books.tags',
                'books.extax',
                'books.priceInUSD',
                'books.discountPercent',
                'books.productDescription',
                'books.manufacturer',
                'books.color',
                'books.productCode',
                'books.availability'


            ])

            ->groupBy(
                'books.author_id',
                'books.id',
                'user_orders.book_id',
                'users.displayName',
                'books.subcategory_id',
                'books.isFeatured',
                'books.RewardPoints',
                'books.productSummary',
                'books.title',
                'books.brand',
                'books.image',
                'books.tags',
                'books.extax',
                'books.priceInUSD',
                'books.discountPercent',
                'books.productDescription',
                'books.manufacturer',
                'books.color',
                'books.productCode',
                'books.availability'
            )
            ->orderBy('Quantity', 'desc')
            ->get()
        ;
        $Deals = DealOfTheDay::with('Book')
            ->where('expireDate', '>', Carbon::now())
            ->get()
            ->unique('book_id')
        ;
            
        if ($MostSelling->first()) {
            $Author = User::find( $MostSelling->first()->author_id);
            $BestSellerBooks = Book::where('author_id', $MostSelling->first()->author_id)->limit(4)->get();
        } else {
            $BestSellerBooks = null;
        } 
        $FeaturedCatsWithBooks=null;
        //parent categories where isFeatured=true
        $FeaturedCats=BookCategory::all()->where('isFeatured',true);
        foreach ($FeaturedCats as  $Cat) {
            //getting subcats of that parent cat
            $subCatIds_ofFeaturedCategories=BookSubCategory::all()->where('category_id',$Cat->id)->pluck('id');
            //pushing books (having  subcategories's parent category isFeatured) and parent Cat Name
            $books=Book::all()->whereIn('subcategory_id',$subCatIds_ofFeaturedCategories);
            if ($books->count()>5) {
                    $FeaturedCatsWithBooks[]=[
                        'ParentCatName'=>$Cat->name,
                        'Books'=>$books,
                    ];
            }
            
        }
 
           

        $Data = [
            'Section_FNM' => [

                'Featured' => $Featured,
                'NewArrival' => $NewArrival,
                'MostSelling' => $MostSelling

            ],
            'DealOfTheDay' => $Deals,
            'BestSeller' => [
                'books'=>$BestSellerBooks,
                'author'=>$Author
            ],
            'FeaturedCatsWithBooks'=>$FeaturedCatsWithBooks

        ];
        return view('Index', compact('Data'));
    }



    function ProductDetails($EncryptedBookId)
    {
        $Id = Crypt::decrypt($EncryptedBookId);
        $Book = Book::find((int)$Id);
        if (empty($Book)) {
            return redirect('/shop-grid')->with('fail', 'No Book Found Of this type');
            die();
        }
        $RelatedBooks = Book::with('author')->where('subcategory_id', $Book->subcategory_id)->where('books.id', '!=', $Id)->get();
        $Reviews = Review::with('user')->where('book_id', $Id)->get();

        return view('product-details', compact(['Book', 'RelatedBooks', 'Reviews']));
    }

    function Search($Query = "")
    {


        return view('search', compact('Query'));
    }

    function ContactUs()
    {
        $APIKEY = config('services.api.GOOGLE_MAP_API_KEY');
        return view('contact', compact('APIKEY'));
    }
    function SendMessage(Request $req)
    {
        $reqV = $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'message' => 'required'
        ]);
        Contact::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'phoneNumber' => $req['phoneNumber'],
            'message' => $req['message'],
        ]);

        return back()->with('success', 'Message Sended Successfully We Will Respond you Soon');
    }
}
