@extends('layouts.app')
@section('title', 'News - Masjid Miftahul Jannah')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-4">
                    <div class="card mb-3 my-5" style="max-width: 300px;" data-bs-toggle="modal"
                        data-bs-target="#modalDetailBerita-{{ $item->id_berita_masjid }}">
                        <div class="">
                            <img src="{{ asset('img/berita/' . $item->id_berita_masjid . '/' . json_decode($item->foto_berita)[0]) }}"
                                class="img-thumbnail border-0 rounded-1" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->nama_berita }}</h5>
                                {{-- <p class="card-text">{!! substr($item->deskripsi_berita, 0, 300) !!}...</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Modal Detail Berita --}}
                <div class="modal fade" id="modalDetailBerita-{{ $item->id_berita_masjid }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Berita</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div id="carouselExample" class="carousel slide">
                                            <div class="carousel-inner">
                                                @foreach (json_decode($item->foto_berita) as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                                        <img src="{{ asset('img/berita/' . $item->id_berita_masjid . '/' . $image) }}"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $item->nama_berita }}</h2>
                                        <div class="d-flex">
                                            <i class="bi bi-calendar3 mr-2"></i>
                                            <p>{{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                            </p>
                                        </div>
                                        <p>{!! $item->deskripsi_berita !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal Detail Berita --}}
            @endforeach
        </div>
    </div>
@endsection
