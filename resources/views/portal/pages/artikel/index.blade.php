@extends('portal.layouts.base')
@section('title','Artikel')
@section('content')

<div class="container-xxl py-5">
    <div class="container">
        @if ($list_artikel)
            <div class="row g-4">
                @foreach ($list_artikel as $artikel)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        @component('portal.components.card-article',['data'=>$artikel]) @endcomponent
                    </div>
                @endforeach
            </div>
            {{-- {{ $list_artikel->links() }} --}}
        @endif
    </div>
</div>

@endsection
