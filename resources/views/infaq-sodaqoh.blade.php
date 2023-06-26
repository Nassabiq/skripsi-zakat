@extends('layouts.app')
@section('title', 'Infaq Sodaqoh - Masjid Miftahul Jannah')

@section('content')
    <div>
        <!-- Infaq Sedekah Start -->
        <div class="row d-flex justify-content-center container m-5">
            <div class="col-7 bg-abu p-4">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-6 col-md-4">
                            <img src="{{ asset('img/money.jpg') }}" class="img-fluid rounded-2" style="height: 10rem"
                                alt="infaq sedekah" />
                        </div>
                        <div class="col-6 col-md-8">
                            <div class="card-body">
                                <h6 class="card-title">You will donate to the program</h6>
                                <p class="card-text my-3">Infaq Sedekah</p>
                                <p class="card-text my-3">
                                    <a href="kalkulator">click here</a> to calculate charity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center container m-5">
            <div class="col-7 bg-abu p-4">
                <form action="{{ route('addZis') }}" method="POST">
                    @csrf
                    <input type="hidden" name="zis" value="infaq-sodaqoh">

                    <small>Nominal*</small>
                    <div class="input-group mb-3 flex-nowrap">
                        <input type="text" class="form-control" placeholder="" aria-label="Nominal"
                            aria-describedby="addon-wrapping" required="" value="10000" min="10000"
                            name="jumlah_zakat" />
                        @error('jumlah_zakat')
                            <div class="text-danger error-messages">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <select class="form-select mb-3" aria-label=".form-select-lg example" name="selected_bank">
                            <option value="" selected>Choose a payment method</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BCA">BCA</option>
                            <option value="BRI">BRI</option>
                            <option value="BSI">BSI</option>
                        </select>
                        @error('selected_bank')
                            <div class="text-danger error-messages">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle mb-3 col-12 mt-3" type="button"
                            id="dropdownPayment" style="background-color: #ffffff; color: black" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Choose a payment method
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">
                                <img src="img/bank-mandiri.svg" class="me-2" style="width: 10%" alt="Mandiri" />
                                <span class="option-text"> Mandiri</span>
                            </li>
                            <li class="dropdown-item">
                                <img src="img/logo-bca.png" class="me-2" style="width: 10%" alt="BCA" />
                                <span class="option-text">BCA</span>
                            </li>
                            <li class="dropdown-item">
                                <img src="img/BANK_BRI_logo.svg" class="me-2" style="width: 10%" z alt="BRI" />
                                <span class="option-text">BRI</span>
                            </li>
                            <li class="dropdown-item">
                                <img src="img/Bank_Syariah_Indonesia.svg" class="me-2" style="width: 10%"
                                    alt="BSI" />
                                <span class="option-text">BSI</span>
                            </li>
                        </ul>
                    </div> --}}
                    <div>
                        <small>Nama Muzakki <sup>*optional</sup> </small>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="" aria-label="Nama"
                                aria-describedby="addon-wrapping" placeholder="Nama Muzakki" name="nama_muzakki" />
                            @error('nama_muzakki')
                                <div class="text-danger error-messages">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-hijau w-100 mt-4">
                        Next
                    </button>
                </form>
            </div>
        </div>
        <!-- Infaq Sedekah End -->
    </div>
@endsection
