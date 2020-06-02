<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.elements.head')
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @include('admin.elements.sidebar')
        @include('admin.elements.top_nav')
        @yield('content')
        @include('admin.elements.foot')
    </div>
</div>
    @include('admin.elements.script')
</body>
</html>