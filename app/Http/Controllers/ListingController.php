<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listing
    public function index(){
        $to = Listing::all();
       // dd($to);
       
        return view('listings.index',[
           
            'listings'=>Listing::all(),
        ]);

    }
//show single listng
    public function show(Listing $listing){
     
        return view('listings.show',[
           
            'listings'=>$listing,
        ]);
        
    }
}
