@extends('layouts.app')
@section('title', 'Kalkulator ZIS - Masjid Miftahul Jannah')

@section('content')
    <div>
        <div class="row text-center mt-4 my-4">
            <div class="col-12">
                <h1>ZAKAT CALCULATOR</h1>
                <p class="text-secondary">
                    Let's calculate how much zakat you have to spend this year
                </p>
            </div>
        </div>

        <div class="container mb-4">
            <div class="row p-3" style="border-bottom: 1px solid rgb(216, 216, 216)">
                <div id="profesi-text" class="col-1" style="color: #0d4729; cursor: pointer;" onclick="switchProfesi()">
                    <span style="color: #0d4729;">Profesi</span>
                    <div id="profesi-border"
                        style="position: absolute;width: 50px;margin-top: 16px;border: 1px solid #0d4729;">
                    </div>
                </div>
                <div id="harta-text" class="col-1" style="color: #0d4729; cursor: pointer;" onclick="switchHarta()">
                    <span style="margin-left:5px; color: #0d4729;">Harta</span>
                    <div id="harta-border"
                        style="position: absolute;width: 50px;margin-top: 16px;border: 1px solid #0d4729;">
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-6">
                    <div id="section-profesi">
                        <h3>Components of Zakat</h3>
                        <p>
                            Please fill in your monthly income. Fixed nishab calculations are
                            based on 85gr gold nishob which is calculated monthly
                        </p>
                        <small>Income (Monthly Salary)*</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="income" class="form-control" />
                        </div>
                        <small>Other monthly income (Optional)*</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="other_income" class="form-control" />
                        </div>
                        <small>Debt/Monthly installments (Optional)*</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="cicilan" class="form-control" />
                        </div>
                    </div>
                    <div id="section-harta">
                        <h3>Components of Zakat</h3>
                        <p>
                            Khusus untuk harta yang telah tersimpan selama lebih dari 1 tahun
                            (haul) dan mencapai batas tertentu (nisab)
                        </p>
                        <small>Deposit/Tabungan/Giro</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="deposit" class="form-control" />
                        </div>
                        <small>Emas,perak,permata,atau sejenisnya</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="batu_mulia" class="form-control" />
                        </div>
                        <small>Nilai properti & kendaraan (bukan yang digunakan
                            sehari-hari)</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="properti" class="form-control" />
                        </div>
                        <small>Lainnya (saham, piutang, dan surat-surat berharga lainnya)</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="surat_berharga" class="form-control" />
                        </div>
                        <small>Hutang pribadi yang jatuh tempo tahun ini</small>
                        <div class="input-group flex-nowrap my-4">
                            <span class="input-group-text" id="addon-wrapping">Rp. </span>
                            <input type="text" id="hutang" class="form-control" />
                        </div>
                    </div>

                    <button onclick="sumCalculator()" class="btn btn-success btn-hijau w-100 mt-4">
                        Calculate
                    </button>
                </div>


                <div class="col-6">
                    <h3>Nilai Zakat</h3>
                    <p>
                        Berikut hasil perhitungan dan nilai zakat yang harus anda keluarkan
                    </p>
                    <small>Total Harta</small>
                    <div class="input-group flex-nowrap my-4">
                        <span class="input-group-text" id="addon-wrapping">Rp. </span>
                        <input type="text" id="total_harta" value="0" class="form-control" disabled />
                    </div>
                    <small>Nisab (Menghitung nilai 85 gram saat ini)</small>
                    <div class="input-group flex-nowrap my-4">
                        <span class="input-group-text" id="addon-wrapping">Rp. </span>
                        <input type="text" class="form-control" id="nisab" disabled />
                    </div>
                    <small>Nilai Zakat</small>
                    <div class="input-group flex-nowrap my-4">
                        <span class="input-group-text" id="addon-wrapping">Rp. </span>
                        <input class="form-control" type="text" id="total_zakat" disabled />
                    </div>
                    <button type="submit" class="btn btn-secondary btn-hijau w-100 mt-4">
                        <a href="invoice.html">
                            Next
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <script>
            const url = 'https://logam-mulia-api.vercel.app/prices/pegadaian'
            const nisab = document.getElementById('nisab')
            let price = 0

            fetch(url)
                .then(response => response.json())
                .then(golds => {
                    const goldPrice = golds.data.filter(gold => gold.type == 'ubs');
                    price = goldPrice[0].sell
                    nisab.value = Intl.NumberFormat().format(price * 85)
                })
                .catch(err => console.log(err))

            // DEFINING VARIABLE
            let total_harta = document.getElementById('total_harta')
            let total_zakat = document.getElementById('total_zakat')
            // HARTA
            let deposit = document.getElementById('deposit')
            let batu_mulia = document.getElementById('batu_mulia')
            let properti = document.getElementById('properti')
            let surat_berharga = document.getElementById('surat_berharga')
            let hutang = document.getElementById('hutang')
            // PROFESI
            let income = document.getElementById('income')
            let other_income = document.getElementById('other_income')
            let cicilan = document.getElementById('cicilan')

            function sumCalculator() {
                const section_harta = window.getComputedStyle(document.getElementById('section-harta'), null).display
                const section_profesi = window.getComputedStyle(document.getElementById('section-profesi'), null).display

                let sum = 0
                if (section_harta == 'block') {
                    sum =
                        parseInt(deposit.value) + parseInt(batu_mulia.value) + parseInt(properti.value) +
                        parseInt(surat_berharga.value) + parseInt(hutang.value)
                    total_harta.setAttribute('value', Intl.NumberFormat().format(sum))
                    console.log(Intl.NumberFormat().format(sum))
                } else {
                    sum = parseInt(income.value) + parseInt(other_income.value) + parseInt(cicilan.value)
                    total_harta.setAttribute('value', Intl.NumberFormat().format(sum))
                }

                if (sum > price * 85) {
                    total_zakat.setAttribute('value', Intl.NumberFormat().format(sum * 0.025))
                } else {
                    total_zakat.setAttribute('value', 0)
                }
            }

            $("#section-harta").hide();
            $('#harta-text').css('color', 'black');
            $('#harta-border').hide();

            function nullValue() {
                // PROFESI
                income.setAttribute('value', '')
                console.log(income);
                other_income.setAttribute('value', '')
                cicilan.setAttribute('value', '')
                // DEPOSIT
                deposit.setAttribute('value', '')
                batu_mulia.setAttribute('value', '')
                properti.setAttribute('value', '')
                surat_berharga.setAttribute('value', '')
                hutang.setAttribute('value', '')

                total_harta.setAttribute('value', '')
            }

            function switchHarta() {
                nullValue()
                $("#section-profesi").hide();
                $("#section-harta").show();

                $('#harta-text').css('color', 'orange');
                $('#harta-border').show();

                $('#profesi-text').css('color', 'black');
                $('#profesi-border').hide();
            }

            function switchProfesi() {
                nullValue()
                $("#section-profesi").show();
                $("#section-harta").hide();

                $('#harta-text').css('color', 'black');
                $('#harta-border').hide();

                $('#profesi-text').css('color', 'orange');
                $('#profesi-border').show();
            }
        </script>
    </div>
@endsection
