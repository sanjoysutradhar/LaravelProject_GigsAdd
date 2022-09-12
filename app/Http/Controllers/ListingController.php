<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index()
    {
        return view('listings.index', [
            // 'heading'=>'Latest listing',
            //'listings'=> Listing::all() //get all listings data
            //tags and search filter
            // 'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
            'listings' => Listing::latest()->filter(request(['tag',
             'search']))->paginate(4)
        ]);
    }
    //show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    // show create form
    public function create()
    {
        return view('listings.create');
    }
    // store listing data
    public function store(Request $request){
        // dd($request->all());
        //dd($request->file('logo'));
        $formFields = $request -> validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],//table name
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tag'=>'required',
            'description'=>'required',
        ]);
        if($request->hasfile('logo')){
            $formFields['logo']= $request->file('logo')->storeAs('logos','public');
        }

        Listing::create($formFields);
        // return redirect('/');
        return redirect('/')->with('message','Listing created successfully');

    }
    public function edit(Listing $listing){
        // dd($listing->title);
        return view('listings.edit',['listing'=>$listing]);
    }
    // update listing data
    public function update(Request $request, Listing $listing){
        // dd($request->all());
        //dd($request->file('logo'));
        $formFields = $request -> validate([
            'title'=>'required',
            'company'=>['required'],//table name
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tag'=>'required',
            'description'=>'required',
        ]);
        if($request->hasfile('logo')){
            $formFields['logo']= $request->file('logo')->storeAs('logos','public');
        }

        $listing->update($formFields); //regular listing
        // return redirect('/');
        return back()->with('message','Listing created successfully!');

    }

    //delete listing
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully!');
        
    }
}
