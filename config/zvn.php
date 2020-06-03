<?php
	return [
		'url' => [
			'prefix_admin' => 'admin69',
			'prefix_news'  => 'news'
		],
		'format' => [
			'format_long_time' => 'H:m:s d-m-y',
			'format_time' => 'd/m/y',
		],
		'template' => [
			'status' => [
				'all'      => ['name' => 'Tât cả'        , 'class' => 'btn-success'],
				'active'   => ['name' => 'Kích hoạt'     , 'class' => 'btn-success'],
				'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-danger' ],
				'default'  => ['name' => 'Chưa xác định' , 'class' => 'btn-danger' ],
			],
			'search' => [
				'name' 	   		   => ['name' => 'Seach by Name'],
				'id' 	           => ['name' => 'Seach by ID'],
				'description' 	   => ['name' => 'Seach by Description'],
				'all' 	      	   => ['name' => 'Seach by All'],
				'username' 	   	   => ['name' => 'Seach by Username'],
				'fullname' 	   	   => ['name' => 'Seach by Fullname'],
				'link' 	   		   => ['name' => 'Seach by Link'],
				'content' 	   	   => ['name' => 'Seach by Content'],
				'email' 	   	   => ['name' => 'Seach by Email'],
			],
			'button' => [
			'edit'   => ['class' => 'btn-success' , 'title' => 'Edit'   , 'icon' => 'fa-pencil' , 'route-name' => '/form'],
            'delete' => ['class' => 'btn-danger'  , 'title' => 'Delete' , 'icon' => 'fa-trash'  , 'route-name' => '/delete'],
            'info  ' => ['class' => 'btn-info'    , 'title' => 'Show'   , 'icon' => 'fa-eye'    , 'route-name' => '/form'],
        	]
		],
		'config' => [
			'search' => [
				'default' => ['name','description','id'],
				'slider'  => ['name','description','id'],
			],
			'button' => [
				'default' => ['edit','delete'],
            	'slider'  => ['edit','delete'],
			]
		]
	];
?>