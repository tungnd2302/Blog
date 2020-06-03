<?php
namespace App\Helpers;
use Config;
class Template{
    public static function ShowButtonFilter($controllerName,$countByStatus,$params){
        $xhtml = '';
        $tmplStatus   = Config::get('zvn.template.status');
        if(count($countByStatus) > 0){
            array_unshift($countByStatus,[
                'count' => array_sum(array_column($countByStatus,'count')),
                'status' => 'all',
            ]);
            
            foreach($countByStatus as $item){
                $statusValue            = $item['status'];
                $statusValue            = (array_key_exists($statusValue,$tmplStatus)) ? $statusValue : 'default';
                $currentTemplateStatus  =  $tmplStatus[$statusValue];
                $link                   = route($controllerName) . '?filter_status=' . $item['status'];
                $class                  = $params['filter']['status'] == $item['status'] ? 'btn-danger' : 'btn-primary';
                $xhtml .= sprintf('<a href="%s" type="button" class="btn %s">
                                            %s <span class="badge bg-white">%s</span>
                                    </a>',$link,$class,$currentTemplateStatus['name'],$item['count']);
            }
        }
        return $xhtml;
    } 

    public static function ShowItemHistory($by,$time){
        $xhtml = '';
        $xhtml .= sprintf('<p><i class="fa fa-user">%s</i></p>
                         <p><i class="fa fa-clock">%s</i></p>',$by,date(Config::get('zvn.format.format_long_time'),strtotime($time)));
        return $xhtml;
    }

    public static function ShowItemStatus($controllerName,$id,$status){
        $xhtml = '';
        $tmplStatus = Config::get('zvn.template.status');
        $statusValue            = (array_key_exists($status,$tmplStatus)) ? $status : 'default';
        $currentTemplateStatus  =  $tmplStatus[$statusValue];
        $curentLink    = route($controllerName . '/status',['status' => $status , 'id' => $id ]);
        $currentStatus = $tmplStatus[$statusValue];
        $xhtml .= sprintf('<a href="%s" class="btn btn-round %s">%s</a>',$curentLink,$currentStatus['class'],$currentStatus['name']);
        return $xhtml;
    }

    public static function ShowItemThumb($controllerName,$thumbName,$thumbAlt){
        $xhtml = '';
        $xhtml .= sprintf('<img src="%s" alt="%s" class="zvn-thumb" />',asset("admin/img/$controllerName/$thumbName"),$thumbAlt);
        return $xhtml;
    }

    public static function ShowButtonAction($controllerName,$id){
        $tmplButton = Config::get('zvn.template.button');

        $btnInArea = Config::get('zvn.config.button');

        $controllerName = (array_key_exists($controllerName,$btnInArea)) ? $controllerName : '';
        $listButtons    = $btnInArea[$controllerName];

        $xhtml = '';
        foreach($listButtons as $btn){
            $currentButton = $tmplButton[$btn];
            $link = route($controllerName.$currentButton['route-name'],['id' => $id]);
            $xhtml .= sprintf(
                '<a href="%s" class="btn btn-round %s" data-toggle="tooltip" data-placement="top" data-original-title="%s">
                    <i class = "fa %s" ></i>
                </a>'
            ,$link,$currentButton['class'],$currentButton['title'],$currentButton['icon']);
        }
        return $xhtml;
    }

    public static function ShowAreaSearch($controllerName){
        $xhtml = '';
        $tmplField         = Config::get('zvn.template.search');
        $fieldInController = Config::get('zvn.config.search');
        $controllerName = array_key_exists($controllerName, $fieldInController) ? $controllerName : 'default';
        
        $xhtmlField = '';
        foreach ($fieldInController[$controllerName] as $value) {
           $xhtmlField .= sprintf('<li>
                                <a href="#" class="select-field" data-field="%s">
                                    %s
                                </a>
                            </li>',$value,$tmplField[$value]['name']);
        }
        $xhtml .= sprintf('<div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button"
                                            class="btn btn-default dropdown-toggle btn-active-field"
                                            data-toggle="dropdown" aria-expanded="false">
                                        Search by All <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        %s
                                    </ul>
                                </div>
                                <input type="text" class="form-control" name="search_value" value="">
                                <span class="input-group-btn">
                            <button id="btn-clear" type="button" class="btn btn-success"
                                    style="margin-right: 0px">Xóa tìm kiếm</button>
                            <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                            </span>
                                <input type="hidden" name="search_field" value="all">
                </div>',$xhtmlField);
        return $xhtml;
    } 
}
//$controllerName . '/status'
?>