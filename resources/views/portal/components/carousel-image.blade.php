 <!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @if ($data)
                @foreach ($data as $item)
                    <div class="carousel-item">
                        <img class="w-100" src="{{asset('/media/cover/'.$item->image)}}" alt="{{$item->title}}">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-3 text-white mb-4 animated slideInDown">{{$item->title}}</h1>
                                <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">{{ Str::limit($item->description, 100, ' ...')}}</h6>
                                {{-- <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca
                                    Selengkapnya</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Daftar Berita
                                </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{-- <div class="carousel-item active">
                <img class="w-100" src="{{ asset('/img/bg1.png') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Selamat
                            Datang</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Judul Berita</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca
                            Selengkapnya</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Daftar Berita</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('/img/bg1.png') }}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 700px;">
                        <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Selamat
                            Datang</h6>
                        <h1 class="display-3 text-white mb-4 animated slideInDown">Cover Berita</h1>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca
                            Selengkapnya</a>
                        <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Daftar Berita
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
