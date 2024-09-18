<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Psy\Command\WhereamiCommand;

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

        return view('product-details', compact(['Book', 'RelatedBooks']));
    }

    function Search($Query = "")
    {


        return view('search', compact('Query'));
    }
}
