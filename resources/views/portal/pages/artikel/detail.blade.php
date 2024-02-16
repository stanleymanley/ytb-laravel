@extends('portal.layouts.base')
@section('title',$artikel->title)
@section('content')

<div class="container" style="margin-top: 70px;">
    <div class="room-item shadow rounded overflow-hidden">
        <div class="position-relative">
            @if ($artikel->cover)
            <img class="img-fluid" src="{{asset('/media/cover/'.$artikel->cover)}}" alt="">
            @else

            @endif
        </div>
        <div class="p-3 mt-2">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">{{$artikel->title}}</h5>
            </div>
            <div class="d-flex mb-3">
                <small class="border-end me-3 pe-3"><i
                        class="fa fa-user text-primary me-2"></i>{{$artikel->author->name}}</small>
                <small class="border-end me-3 pe-3"><i
                        class="fa fa-eye text-primary me-2"></i>{{$artikel->viewers_count}}</small>
                <small><i class="fa fa-calendar text-primary me-2"></i>{{$artikel->created_at}}</small>
            </div>
            <p class="text-body mb-3">{!! $artikel->content !!}</p>
        </div>
    </div>

</div>
@endsection
