<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ListingController extends Controller
{
    //show all listing
    public function index(){

        return view('listings.index',[
           
            'listings'=>Listing::latest()->filter(request(['tag','search']))->get(),
        ]);

    }
//show single listng
    public function show(Listing $listing){
     
        return view('listings.show',[
           
            'listings'=>$listing,
        ]);
        
    }
    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $formfields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'loacation'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'description'=>'required'

        ]);

        Listing::create($formfields);
        
        return redirect('/')->with('message','posting created successfully');
       
    }


}
