<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\signup;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $countries = Country::all();
        $data = signup::paginate(4);
        return view('home_show',compact('countries','data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = Country::all();
        return view('form',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|min:2|max:20',
            'email'=>'required|unique:signups,email',
            'address'=>'required|min:2|max:20',
            'gender'=>'required|min:2|max:20',
            'hobbies'=>'required|min:2|max:20',
            'country'=>'required|min:2|max:20',
            'profile'=>'required|mimes:jpg.png,jpeg',
        ]);

    

        $requestdata= $request->except('_token');

        $img='lv'.rand().'.'.$request->profile->extension();
        $request->profile->move(public_path('profile/'),$img);
        $requestdata['profile']=$img; 

        $store= signup::create($requestdata);

        return redirect()->route('crud.index')->with('success', $request->name.'  Inserted Successfully.');






    }

    /**
     * Display the specified resource.
     */
    public function show(signup $crud)
    {
        //
        $countries = Country::all();
        return view('show1',compact('countries','crud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(signup $crud)
    {
        //
        $countries = Country::all();
        return view('edit',compact('countries','crud'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, signup $crud)
    {
        //

        $crud->name=$request->name ?? $crud->name;
        $crud->email=$request->email ?? $crud->email;
        $crud->address=$request->address ?? $crud->address;
        $crud->gender=$request->gender ?? $crud->gender;
        $crud->hobbies=$request->hobbies ?? $crud->hobbies;
        $crud->country=$request->country ?? $crud->country;


        if(isset($request->profile)){
            
        $img='lv'.rand().'.'.$request->profile->extension();
        $request->profile->move(public_path('profile/'),$img);
        $requestdata['profile']=$img; 

        }

        $crud->save();

        return redirect()->route('crud.index')->with('success', $request->name.'  Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(signup $crud)
    {
        //
        $crud->delete();
        return redirect()->route('crud.index')->with('success',' Deleted Successfully.');

    }
}
