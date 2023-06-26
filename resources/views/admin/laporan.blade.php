@extends('layouts.admin')
@section('title', 'Laporan ZIS - Masjid Miftahul Jannah')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Laporan ZIS</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nomor Pembayaran</th>
                        <th scope="col">Muzakki</th>
                        <th scope="col">Type</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
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
                            <td>{{ $item->user->name }}</td>
                            <td>{{ ucwords($item->tipe_zis) }}</td>
                            <td>{{ $item->jenis_bank }}</td>
                            <td>Rp. {{ number_format($item->nominal_pembayaran) }}</td>
                            <td>
                                <div class="d-flex">
                                    <p
                                        class="badge mr-2 {{ $item->status_pembayaran == 0 ? 'text-bg-danger' : 'text-bg-success' }}">
                                        {{ $item->status_pembayaran == 0 ? 'Belum Membayar' : 'Sudah Membayar' }}
                                    </p>
                                    <p class="badge {{ $item->validasi_data == 0 ? 'text-bg-danger' : 'text-bg-success' }}">
                                        {{ $item->validasi_data == 0 ? 'Belum Divalidasi' : 'Sudah Divalidasi' }}
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-between">
                                    @if ($item->status_pembayaran == 1)
                                        <a href="{{ asset('pembayaran/' . $item->bukti_pembayaran) }}" target="_blank"
                                            class="btn btn-sm btn-success mr-2">
                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                        </a>
                                    @endif
                                    @hasanyrole('admin|bendahara')
                                        @if ($item->validasi_data == 0)
                                            <button class="btn btn-sm btn-primary d-flex items-center" data-bs-toggle="modal"
                                                data-bs-target="#validasi-{{ $item->id_zis }}">
                                                <i class="bi bi-check2-circle mr-2"></i>
                                                <span>Validasi</span>
                                            </button>
                                        @endif
                                    @endhasanyrole
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="validasi-{{ $item->id_zis }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Validasi Pembayaran</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda ingin memvalidasi data pembayaran ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('validasiPembayaran', $item->id_zis) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Validasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
