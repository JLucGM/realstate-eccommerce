<!DOCTYPE html>
<html lang="en" data-url-prefix="/" data-footer="true" data-override='{"attributes": {"color": "dark-blue" }}'
@isset($html_tag_data)
    @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
@endisset
>

<?php
    $setting = DB::table('setting_generals')->first();
?>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>{{$title.' | '.$setting->name}}</title>
    <meta name="description" content="{{$description}}"/>
    @include('_layout.head')
   
</head>

<body>
<div id="root">
    <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) @foreach ($custom_nav_data as $key=> $value)
    data-{{$key}}="{{$value}}"
        @endforeach
        @endisset
    >
        @include('_layout.nav')
    </div>
    <main
        @isset($custom_main_class)
        class="{{$custom_main_class}}"
        @endisset
    >
        @yield('content')
    </main>
    @include('_layout.footer')
</div>

@hasrole('super Admin')

@include('_layout.modal_settings')
    
@endhasrole

@include('_layout.modal_search')
@include('_layout.scripts')

</body>
</html>
