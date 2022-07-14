<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * 
     * @return \Collection
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users')->with(['users' => $users]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.index');
    
    }

    /**
     * Adding a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|max:255',
            'email'        => 'required|email|unique:users',
            'phone_number' => 'required|digits:10|unique:users',
            'password'     => 'required|min:6|confirmed'
           
        ]);
          
          // if validation has failed redirect to back
        
        if ($validator->fails()) {
            return back()->withErrors($validator);
                       
        }

        User::create([
            'name' => $request->email,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password),
            'country' => $request->country
        ]);

        Session::flash('success', 'User added successfully!');

        return Redirect::to('/users/create');
    
    }

    /**
     * Deleting a  user.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->destroy();

        Session::flash('success', 'User deleted successfully!');

        return Redirect::to('/users/create');
    
    }
}
