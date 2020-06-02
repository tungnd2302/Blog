<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    // public function show($id)
    // {
    //     return view('user.profile', ['user' => User::findOrFail($id)]);
    // }
    public function index(){
        return 'SliderController - Index';
    }

     public function edit(){
        return 'SliderController - Form';
    }

     public function delete(){
        return 'SliderController - Delete';
    }
}