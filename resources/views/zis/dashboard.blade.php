@extends('layouts.app')
@section('title', 'Dashboard - Masjid Miftahul Jannah')

@section('content')
    <div class="container mt-4">
        <!-- Page Heading -->
        <h1 class="text-center">Riwayat Pembayaran</h1>
        <div class="col-12">
            {{-- <div class="row justify-content-between">
                <div class="input-group my-4 col">
                    <input type="text" class="form-control col-1" placeholder="Search..." aria-label="Search"
                        aria-describedby="search-button" required="" />
                    <button class="btn btn-primary" type="button" id="search-button">
                        Search
                    </button>
                </div>
                <div class="form-inline col-auto">
                    <label for="per-page">Per-Page</label>
                    <select id="per-page" class="form-control">
                        <option value="5">5</option>
                        <option value="5">10</option>
                        <option value="5">15</option>
                    </select>
                </div>
            </div> --}}
            <table class="table my-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nomor Pembayaran</th>
                        <th scope="col">Type</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>
                                {{ \Carbon\Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                            </td>
                            <td>{{ $item->no_pembayaran }}</td>
                            <td>{{ ucwords($item->tipe_zis) }}</td>
                            <td>{{ $item->jenis_bank }}</td>
                            <td>Rp. {{ number_format($item->nominal_pembayaran) }}</td>
                            <td>
                                @if ($item->status_pembayaran == 0)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <p class="badge text-bg-danger">Belum Membayar</p>
                                        <a href="{{ route('invoice', $item->id_zis) }}" class="btn btn-sm btn-primary mr-2"
                                            type="button">
                                            Bayar
                                        </a>
                                    </div>
                                @else
                                    <span class="badge text-bg-success">Sudah Membayar</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
