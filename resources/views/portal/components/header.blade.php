<!-- Header Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{url('/')}}"
                class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <img src="{{ asset('/img/blud.png') }}" alt="Logo Kamu" width="250" height="100" />
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0">test@gmail.com</p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0">382 2137</p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                        <a class="" href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{url('/')}}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">Hotelier</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">PROFILE</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="profile.html" class="dropdown-item">Profile Singkat</a>
                                <a href="strukturorganisasi.html" class="dropdown-item">Struktur Organisasi</a>
                                <a href="informasiorganisasi.html" class="dropdown-item">Informasi Organisasi</a>
                                <a href="bidang.html" class="dropdown-item">Bidang</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">POJOK MEDIA</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="berita.html" class="dropdown-item">Berita</a>
                                <a href="infokegiatan.html" class="dropdown-item">Info Kegiatan</a>
                                <a href="galeri.html" class="dropdown-item">Galeri Foto</a>
                                <a href="video.html" class="dropdown-item">Galeri Video</a>
                                <a href="https://www.beritajakarta.id/siaran-pers/provinsi" class="dropdown-item">Siaran Pers</a>
                            </div>
                        </div>
                        <a href="info-grafis.html" class="nav-item nav-link">Infografis</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">PPID</a>
                        </div>
                        <a href="produk-hukum.html" class="nav-item nav-link">PRODUK HUKUM</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">INFO KEUANGAN</a>
                        </div>
                    </div>
                    <a href="{{url('/admin')}}"
                        class="btn btn-primary rounded-0 py-4 px-md-2 d-none d-lg-block">Login<i
                            class="fa fa-user ms-3"></i></a>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
