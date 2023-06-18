@extends('layouts.app')
@section('title', 'Masjid Miftahul Jannah')

@section('content')
    <!-- Slideshow Start -->
    <section id="content" style="transform: none" class="mt-4">
        {{ auth()->check() }}
        <div class="content-wrap" style="transform: none">
            <div class="container" style="transform: none">
                <div class="row clearfix" style="transform: none">
                    <div class="col-12 bottommargin">
                        <div class="row col-mb-50">
                            <div class="col-12">
                                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="img/Kurban1.jpeg" class="d-block w-100 img-stretch" alt="Kurban1" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/Kurban2.jpeg" class="d-block w-100 img-stretch" alt="Kurban2" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="img/Kurban3.jpeg" class="d-block w-100 img-stretch" alt="Kurban3" />
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Slideshow End -->

    <!-- Album Start -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <h2>Album Terbaru</h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <img src="img/Kurban1.jpeg" style="width: 100%; height: 300px" alt="" />
            </div>
            <div class="col-4">
                <img src="img/Kurban2.jpeg" style="width: 100%; height: 300px" alt="" />
            </div>
            <div class="col-4">
                <img src="img/Kurban3.jpeg" style="width: 100%; height: 300px; object-fit: cover" alt="" />
            </div>
        </div>
    </div>
@endsection
