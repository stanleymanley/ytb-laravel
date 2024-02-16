<div class="room-item shadow rounded overflow-hidden">
    <div class="position-relative">
        @if ($data->cover)
        <img class="img-fluid" src="{{asset('/media/cover/'.$data->cover)}}" alt="">
        @else

        @endif
    </div>
    <div class="p-3 mt-2">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="mb-0">{{$data->title}}</h5>
        </div>
        <div class="d-flex mb-3">
            <small class="border-end me-3 pe-3"><i
                    class="fa fa-user text-primary me-2"></i>{{$data->author->name}}</small>
            <small class="border-end me-3 pe-3"><i
                    class="fa fa-eye text-primary me-2"></i>{{$data->viewers_count}}</small>
            <small><i class="fa fa-calendar text-primary me-2"></i>{{$data->created_at}}</small>
        </div>
        {{-- <p class="text-body mb-3">{!! Str::limit($data->content, 100, ' ...') !!}</p> --}}
        <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-primary rounded py-2 px-4" href="{{url('/artikel/detail/'.$data->id)}}">Baca Selengkapnya</a>
        </div>
    </div>
</div>
