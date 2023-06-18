@extends('layouts.app')
@section('title', 'News - Masjid Miftahul Jannah')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="row my-5 d-flex justify-content-between align-items-center">
                    <div class="col-8">
                        <from class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" arial-label="Search">
                            </form>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 300px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/Logo MMJ.png" class="img-thumbnail border-0 rounded-1" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Keutamaan Malam Lailatul Qadar</h5>
                                <p class="card-text">This is a wider card.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 300px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/Logo MMJ.png" class="img-thumbnail border-0 rounded-1" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Keutamaan Malam Lailatul Qadar</h5>
                                <p class="card-text">This is a wider card.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="max-width: 300px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/Logo MMJ.png" class="img-thumbnail border-0 rounded-1" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 5 class="card-title">Keutamaan Malam Lailatul Qadar</h5>
                                <p class="card-text">This is a wider card.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Berita Terbaru -->
            <div class="col-8 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="width: 18rem;">
                                <img src="img/..." class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text"> pembagian daging kurban yang dilakukan pihak masjid kepada warga
                                        dikomplek sekitar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="width: 18rem;">
                                <img src="img/..." class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text"> pembagian daging kurban yang dilakukan pihak masjid kepada warga
                                        dikomplek sekitar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="width: 18rem;">
                                <img src="img/..." class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text"> pembagian daging kurban yang dilakukan pihak masjid kepada warga
                                        dikomplek sekitar.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card" style="width: 18rem;">
                                <img src="img/..." class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text"> pembagian daging kurban yang dilakukan pihak masjid kepada warga
                                        dikomplek sekitar.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
