<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/showprofile');      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/createprofile');                
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return view('pages/showprofile')->with('user', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('pages/showprofile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit() {
        return view('pages/editprofile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request  $request
     * @return \Illuminate\Support\Facades\View;
     */
    public function update(Request $request)
    {

        //Validate that the required information are filled in.
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'current_password' => 'required'
        ]);

        //Validates that the posted password matches the database hashed password.
        if (Hash::check($request->current_password, auth()->user()->password)) {

            //Searches for the user in the database by id.
            $user = User::where('id', auth()->user()->id)->first();

            //Changes the name and email to the new posted name and email.
            //Note: On production scale we need to revalidate the new email by sending a verification email.
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            
            //Checks if a new password is requested.
            if (isset($request->new_password) && isset($request->repeat_password)) {
                if ($request->new_password === $request->repeat_password) {
                    //Hash the new password so we can put it into the database.
                    $user->password = Hash::make($request->new_password);
                } else {
                    //Occurs if the user filled the new and repeat password incorrectly.
                    return redirect('/profile/edit')->with('message', 'New and repeat password do not match.');
                }
            }

            //Directly updates the $request variable so the next page
            //will load with the new values rather than the old one.
            $user->update($request->all());

        } else {
            //Occurs when the password is invalid.
            return redirect('/profile/edit')->with('message', 'Invalid password given.');
        }
        //Occurs when the user succesfully updated his profile.
        return redirect('/profile')->with('message', 'Account has succesfully been updated!');
    }
}