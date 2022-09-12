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
        $formFields = $request -> validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],//table name
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tag'=>'required',
            'description'=>'required',
        ]);

        Listing::create($formFields);
        // return redirect('/');
        return redirect('/')->with('message','Listing created successfully');

    }
}
