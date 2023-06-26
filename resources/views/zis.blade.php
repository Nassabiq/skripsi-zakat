@extends('layouts.app')
@section('title', 'ZIS - Masjid Miftahul Jannah')

@section('content')
    <div>
        <div class="row">
            <div class="col-12 justify-content-center text-center pt-3 pb-3">
                <h2>Program ZIS</h2>
                <p>
                    Pilih dan salurkan zis untuk program yang berarti bagi Anda dan Mereka
                </p>
            </div>
        </div>

        <!-- Cards Menu Start -->
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-4 mb-3 mb-sm-0 d-flex justify-content-center">
                    <a href="zakat-mal">
                        <div class="card" style="width: 18rem; color: black">
                            <img src="{{ asset('img/donation-jar.jpg') }}" alt="Zakat Ma'al" style="height: 15rem" />
                            <div class="card-body">
                                <h5 class="card-tittle text-center">Zakat Ma'al</h5>
                                <hr style="color: grey; border: 1px solid" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <a href="zakat-fitrah">
                        <div class="card" style="width: 18rem; color: black">
                            <img src="{{ asset('img/sack-rice.jpg') }}" alt="Zakat Fitrah" style="height: 15rem" />
                            <div class="card-body">
                                <h5 class="card-tittle text-center">Zakat Fitrah</h5>
                                <hr style="color: grey; border: 1px solid" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 d-flex justify-content-center">
                    <a href="infaq-sodaqoh">
                        <div class="card" style="width: 18rem; color: black">
                            <img src="{{ asset('img/money.jpg') }}" alt="Infaq Sedekah" style="height: 15rem" />
                            <div class="card-body">
                                <h5 class="card-tittle text-center">Infaq Sedekah</h5>
                                <hr style="color: grey; border: 1px solid" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
