@php
$html_tag_data = [];
$title = 'Preguntas frecuentes';
$description= $title
@endphp

@include('frontend.header')

<div class="row mb-3 ">
    <div class="col-12">
        <div class="banner text-center text-white ">
            <h1 class="pt-5 fw-bold">{{$title}}</h1>
        </div>

        <div class="container py-4 ">
            <div class="accordion rounded shadow-sm bg-white" id="accordionExample">
                @foreach($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$faq->id}}" aria-expanded="true" aria-controls="{{$faq->id}}">
                            {{$faq->question}}
                        </button>
                    </h2>
                    <div id="{{$faq->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p class="mb-0">{{$faq->answer}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')