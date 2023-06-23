@extends('layouts.app')
@section('title', 'Zakat Maal - Masjid Miftahul Jannah')

@section('content')
    <div>
        <div class="row d-flex justify-content-center container m-5">
            <div class="col-7 bg-abu p-4">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-6 col-md-4">
                            <img src="img/donation-jar.jpg" class="img-fluid rounded-2" style="height: 10rem"
                                alt="zakat ma'al" />
                        </div>
                        <div class="col-6 col-md-8">
                            <div class="card-body">
                                <h6 class="card-title">You will donate to the program</h6>
                                <p class="card-text my-3">Zakat Ma'al</p>
                                <p class="card-text my-3">
                                    <a href="kalkulator.html">click here</a> to calculate charity.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center container m-5">
            <div class="col-7 bg-abu p-4">
                <form action="">
                    <small>Nominal*</small>
                    <div class="input-group flex-nowrap">
                        <input type="number" class="form-control" placeholder="" aria-label="Nominal"
                            aria-describedby="addon-wrapping" required="" value="10000" min="10000" />
                    </div>
                    <div class="dropdown">
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
                    </div>
                    <div class="input-group flex-nowrap">
                        <input type="text" pattern="[0-9]" class="form-control" placeholder="" aria-label="Nama"
                            aria-describedby="addon-wrapping" required="" />
                    </div>
                    <div class="input-group mb-3 my-4">
                        <input class="form-check-input mt-1" type="checkbox" value=""
                            aria-label="Checkbox for following text input" />
                        <div class="ms-3">Hide my name</div>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-hijau w-100 mt-4">
                        Next
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
