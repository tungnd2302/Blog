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
    private $pathViewController = 'admin.slider';
    private $controllerName     = 'slider123';

    public function __construct(){
        view()->share('controllerName',$this->controllerName);
    }
    public function index(){
        return view($this->pathViewController.'.index');
    }

     public function edit(){
        return 'SliderController - Form';
    }

     public function delete(){
        return 'SliderController - Delete';
    }
}