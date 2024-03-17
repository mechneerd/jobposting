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
           
            'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(6),
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
        //dd($request->file('logo'));
        $formfields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'loacation'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'description'=>'required'

        ]);
        if($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos','public');
           // dd($formfields['logo']);
        }

        $formfields['user_id'] = auth()->id();

        Listing::create($formfields);
        
        return redirect('/')->with('message','posting created successfully');
       
    }

    public function edit(Listing $listing){
      // dd($listing);
        return view('listings.edit',['listing'=>$listing]);

    }

    public function update(Request $request,Listing $listing){
        //dd($request->file('logo'));
        $formfields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'loacation'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'description'=>'required'

        ]);
        if($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos','public');
           // dd($formfields['logo']);
        }

        $listing->update($formfields);
        
       // return redirect('/')->with('message','posting created successfully');
       return back()->with('message','updated successfully');
    }  

    public function delete(Listing $listing){
        Listing::where('id',$listing->id)->delete();
        //dd($listing);
        //$listing->delete();
        return redirect('/')->with('message','Listing deleted successfully');

    }

    public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
    }
}
