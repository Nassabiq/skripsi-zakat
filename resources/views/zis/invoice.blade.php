@extends('layouts.app')
@section('title', 'Invoice - Masjid Miftahul Jannah')

@section('content')
    <div>
        {{-- @dump($data) --}}
        <div class="row justify-content-center m-5">
            <div class="col-7 bg-light p-4 text-center">
                <p class="text-center mt-2">No Pembayaran</p>
                <h2 class="text-center font-semibold text-black mt-2">{{ $data->id_zis }}</h2>
                <p class="text-center mt-2">Total Pembayaran</p>
                <h2 class="text-center font-bold text-black mt-2" id="Nominal">
                    Rp. {{ number_format($data->nominal_pembayaran) }}
                </h2>
                <button class="btn btn-secondary btn-salin px-3 justify-content-center mt-3">
                    <i class="bi bi-clipboard" onclick="copyNominal()"> Salin Nominal </i>
                </button>

                <!-- Start Information -->
                <div class="info-box d-flex gap-1 align-items-center p-2 w-100 mb-4 mt-4">
                    <div class="p-3"><img src="{{ asset('img/info.png') }}" class="icon-info" /></div>
                    <p class="m-0 text-start">
                        <strong style="color: rgb(255, 167, 3)">PENTING</strong> Mohon
                        transfer tepat sampai 3 angka terakhir agar pembayaran Anda dapat
                        diproses secara otomatis.
                    </p>
                </div>
                <!-- End Information -->

                <div class="row g-0">
                    <div class="form-group">
                        <input type="text" class="form-control text-end" id="nominal"
                            value="Rp. {{ number_format($data->nominal_pembayaran) }}" disabled readonly />
                        {{-- <input type="text" class="form-control mt-0 text-end" id="nomor-unik" value="345" disabled
                            readonly /> --}}
                    </div>
                    <div class="mb-3 mt-4 fw-bold">
                        *Kode unik akan didonasikan, Untuk nominal donasi yang tidak sesuai
                        dengan kode unik yang tertera, akan kami catat di kategori infak.
                    </div>
                    <div class="text-center mb-3 mt-4">
                        <span><img src="{{ asset('img/time.svg') }}" class="icon-time" /></span>
                        Selesaikan pembayaran donasi sebelum <strong>besok</strong> jam
                        {{ $data->created_at }}
                    </div>

                    <div class="text-center mb-3 mt-4">Silahkan Transfer ke:</div>
                    <div class="rekening-box d-flex flex-column align-items-center gap-2 mb-3 mt-4">
                        <div><img src="{{ asset('img/bank-mandiri.svg') }} " class="bank-logo" /></div>
                        <input type="text" class="form-control text-center border-0" id="nomor-rekening"
                            style="background-color: transparent !important; font-size: 1.4rem;" value="112309482312"
                            disabled readonly>
                        </input>
                        <div class="fs-5">an. Masjid Miftahul Jannah</div>
                        <button class="btn btn-secondary btn-salin px-3 justify-content-center mt-4">
                            <i class="bi bi-clipboard" onclick="copyNomorRekening()">
                                Salin Rekening
                            </i>
                        </button>
                        <button class="btn btn-success btn-salin px-3 justify-content-center mt-4" data-bs-toggle="modal"
                            data-bs-target="#modalPayment">
                            <i class="bi bi-wallet2 mr-2"></i>
                            Selesaikan Pembayaran
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="modalPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('uploadPembayaran', $data->id_zis) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Selesaikan Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Masukan Bukti Pembayaran</label>
                                    <input class="form-control" type="file" id="formFile" name="bukti_pembayaran">
                                    @error('bukti_pembayaran')
                                        <div class="text-danger error-messages">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <script>
            function copyNominal() {
                var nominalElement = document.getElementById("nominal");
                nominalElement.select();
                document.execCommand("copy");
                alert("Angka nominal telah disalin!");
            }

            function copyNomorRekening() {
                var nomorRekeningElement = document.getElementById("nomor-rekening");
                nomorRekeningElement.select();
                document.execCommand("copy");
                alert("Nomor rekening telah disalin!");
            }

            // // Generate 3-digit unique number
            // function generateUniqueNumber() {
            //     var totalPembayaran = 200000; // Total pembayaran, bisa disesuaikan dengan nilai yang sesuai
            //     var uniqueNumber = Math.floor(Math.random() * 1000); // Generate random number between 0 and 999
            //     var nomorUnikElement = document.getElementById("nomor-unik");

            //     nomorUnikElement.value = uniqueNumber.toString().padStart(3, "0");
            // }

            // Call generateUniqueNumber function when the page is loaded
            // window.addEventListener("load", generateUniqueNumber);
        </script>
    </div>
@endsection
