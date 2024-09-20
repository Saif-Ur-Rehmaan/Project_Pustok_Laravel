<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Crypt;

class AppController extends Controller
{

    function ProductDetails($EncryptedBookId)
    {
        $Id = Crypt::decrypt($EncryptedBookId);
        $Book = Book::find((int)$Id);
        if (empty($Book)) {
            return redirect('/shop-grid')->with('fail', 'No Book Found Of this type');
            die();
        }
        $RelatedBooks = Book::with('author')->where('subcategory_id', $Book->subcategory_id)->get();
        $Reviews=Review::with('user')->where('book_id',$Id)->get();
       
        return view('product-details', compact(['Book', 'RelatedBooks','Reviews']));
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
        $reqV=$req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phoneNumber'=>'required',
            'message'=>'required'
        ]); 
        Contact::create([
            'name'=>$req['name'],
            'email'=>$req['email'],
            'phoneNumber'=>$req['phoneNumber'],
            'message'=>$req['message'],
        ]);

        return back()->with('success','Message Sended Successfully We Will Respond you Soon');
    
    }
    
}
