<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider as MainModel;

class SliderController extends Controller
{
    private $pathViewController = 'admin.pages.slider';
    private $controllerName     = 'slider';
    private $params             = [];
    private $model;

    public function __construct(){
        $this->model = new MainModel();
        $this->params['pagination']['totalItemPerPage'] = 1;
        view()->share('controllerName',$this->controllerName);
    }
    public function index(){
        $items              = $this->model->getAllItems($this->params,  ['task' => 'admin-list-items']);
        $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        // dd($countByStatus);
        return view($this->pathViewController.'.index',[
            'items' => $items,
            'itemsStatusCount' => $itemsStatusCount,
        ]);
    }

     public function edit(){
        return 'SliderController - Form';
    }

     public function delete(){
        return 'SliderController - Delete';
    }
}
