@php
$html_tag_data = [];
$title = ' ';
$description= $title
@endphp

@include('frontend.header')

@foreach ($pageShow as $page)
<div class="banner text-center text-white">
  <h1 class="pt-5 fw-bold">{{$page->name}}</h1>
</div>

<div class="container">
    <div class="my-3 rounded shadow-sm bg-white p-4">
        {!! $page->body !!}
    </div>
</div>
    
@endforeach

@include('frontend.footer')
