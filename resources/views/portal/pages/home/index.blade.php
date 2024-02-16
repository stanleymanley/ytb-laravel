@extends('portal.layouts.base')
@section('title','Home')
@section('content')

@component('portal.components.carousel-image',['data'=>$widget_img_slider])@endcomponent
@component('portal.components.carousel-icon')@endcomponent

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @if ($list_artikel)
                @foreach ($list_artikel as $artikel)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        @component('portal.components.card-article',['data'=>$artikel]) @endcomponent
                    </div>
                @endforeach
            @endif

            {{-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                @component('portal.components.card-article') @endcomponent
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                @component('portal.components.card-article') @endcomponent
            </div> --}}
        </div>
    </div>
</div>

@component('portal.components.carousel-article')@endcomponent
@component('portal.components.counter')@endcomponent
@component('portal.components.card-about')@endcomponent
@component('portal.components.testimonial')@endcomponent


@push('scripts')
    <script>
        $(function(){
            $('.carousel-item:first').addClass('active');
        });
    </script>
@endpush
@endsection
