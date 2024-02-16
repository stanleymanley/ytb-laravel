@extends('admin.layouts.base')
@section('title','Tambah Users Baru')
@section('content')

<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>

    </div>
    <!-- Card Body -->
    <div class="card-body">
        <form method="POST" action="{{url('/admin/users/add')}}" autocomplete="off" class="@if($errors->any()) needs-validation was-validated @endif" novalidate>
            @csrf
            <div class="form-group">
                <label for="input_name">Nama :</label>
                <input type="text" name="nama" class="form-control" id="input_name" placeholder="Masukan nama" required>
                @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input_username">Username :</label>
                    <input type="text" name="username" class="form-control" id="input_username" placeholder="Masukan username" required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                    <div class="form-group col-md-6">
                    <label for="input_passowrd">Password :</label>
                    <input type="password" name="password" class="form-control" id="input_passowrd" placeholder="Masukan password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="{{url('/admin/users')}}" class="btn btn-light">Kembali</a>
            </form>
    </div>
</div>

@endsection
