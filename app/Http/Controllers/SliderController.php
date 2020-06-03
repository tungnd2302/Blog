<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider as MainModel;

class SliderController extends Controller
{
    private $pathViewController = 'admin.slider';
    private $controllerName     = 'slider123';
    private $model;

    public function __construct(){
        $this->model = new MainModel();
        view()->share('controllerName',$this->controllerName);
    }
    public function index(){
        $items = $this->model->getAllItems(null,['task' => 'admin-list-items']);
        return view($this->pathViewController.'.index',[
            'items' => $items
        ]);
    }

     public function edit(){
        return 'SliderController - Form';
    }

     public function delete(){
        return 'SliderController - Delete';
    }
}
