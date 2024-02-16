@extends('admin.layouts.base')
@section('title','Edit Image Slider Baru')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Image Slider</h6>

    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{url('/admin/widget-image-slider/update/'.$content->id)}}" enctype="multipart/form-data" autocomplete="off" class="@if($errors->any()) needs-validation was-validated @endif" novalidate>
            @csrf
            <div class="form-group">
                <label for="input_name">Judul :</label>
                <input type="text" name="judul" class="form-control" id="input_name" placeholder="Masukan judul" value="{{$content->title}}" required>
                @error('judul')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="input_image">Image :</label>
                <input type="file" name="image" class="form-control" id="input_image" accept="image/*" required>
                @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                <img class="img-thumbnail" src="{{asset('/media/cover/'.$content->image)}}" style="width: 30%;height:30%;object-fit: cover;"/>
            </div>
            <div class="form-group">
                <label for="input_deskripsi">Deskripsi :</label>
                <textarea name="deskripsi" class="form-control" id="input_deskripsi" placeholder="Masukan deskripsi" rows="3">{{$content->description}}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{url('/admin/widget-image-slider')}}" class="btn btn-light">Kembali</a>
            </form>
    </div>
</div>

@endsection
