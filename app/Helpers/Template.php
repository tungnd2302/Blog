<?php
namespace App\Helpers;
use Config;
class Template{
    public static function ShowButtonFilter($countByStatus){
        $xhtml = '';
        $tmplStatus   = Config::get('zvn.template.status');
        // 'template' => [
		// 	'status' => [
		// 		'active'   => ['name' => 'Kích hoạt',      'class' => 'btn-success'],
		// 		'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-danger'],
		// 	]
		// ]

        if(count($countByStatus) > 0){
            array_unshift($countByStatus,[
                'count' => array_sum(array_column($countByStatus,'count')),
                'status' => 'all',
            ]);
            
            foreach($countByStatus as $item){
                $statusValue            = $item['status'];
                $statusValue            = (array_key_exists($statusValue,$tmplStatus)) ? $statusValue : 'default';
                $currentTemplateStatus  =  $tmplStatus[$statusValue];
                $xhtml .= sprintf('<a href="?filter_status=active" type="button" class="btn btn-success">
                                            %s <span class="badge bg-white">%s</span>
                                    </a>',$currentTemplateStatus['name'],$item['count']);
                    
            }
            
            
        }
        
        return $xhtml;
    }

    
    //<a href="?filter_status=inactive"
    //                                 type="button" class="btn btn-success">
    //                             Inactive <span class="badge bg-white">2</span>
    //                         </a>

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
        $tmplButton = [
            'edit'   => ['class' => 'btn-success' , 'title' => 'Edit'   , 'icon' => 'fa-pencil' , 'route-name' => $controllerName . '/form'],
            'delete' => ['class' => 'btn-danger'  , 'title' => 'Delete' , 'icon' => 'fa-trash'  , 'route-name' => $controllerName . '/delete'],
            'info  ' => ['class' => 'btn-info'    , 'title' => 'Show'   , 'icon' => 'fa-eye'    , 'route-name' => $controllerName . '/form'],
        ];

        $btnInArea = [
            'default' => ['edit','delete'],
            'slider'  => ['edit','delete'],
        ];

        $controllerName = (array_key_exists($controllerName,$btnInArea)) ? $controllerName : '';
        $listButtons    = $btnInArea[$controllerName];

        $xhtml = '';
        foreach($listButtons as $btn){
            $currentButton = $tmplButton[$btn];
            $link = route($currentButton['route-name'],['id' => $id]);
            $xhtml .= sprintf(
                '<a href="%s" class="btn btn-round %s" data-toggle="tooltip" data-placement="top" data-original-title="%s">
                    <i class = "fa %s" ></i>
                </a>'
            ,$link,$currentButton['class'],$currentButton['title'],$currentButton['icon']);
        }
        return $xhtml;
    }
}
//$controllerName . '/status'
?>