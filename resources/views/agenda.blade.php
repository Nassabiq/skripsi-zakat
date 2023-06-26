@extends('layouts.app')
@section('title', 'Agenda - Masjid Miftahul Jannah - Agenda')

@section('content')
    <div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    @foreach ($data as $item)
                        <div class="card mb-3" style="max-width: 100%" data-bs-toggle="modal"
                            data-bs-target="#agenda-{{ $item->id_agenda }}">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img class="img-fluid rounded-start"
                                        src="{{ asset('img/agenda/' . $item->foto_agenda) }}" alt="Agenda1" />
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->nama_agenda }}</h5>
                                        <div class="d-flex">
                                            <i class="bi bi-calendar-event mr-2"></i>
                                            <span>{{ \Carbon\Carbon::parse($item->tgl_agenda)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}</span>
                                        </div>
                                        <div class="d-flex">
                                            <i class="bi bi-alarm mr-2"></i>
                                            <span>
                                                {{ \Carbon\Carbon::parse($item->tgl_agenda)->locale('id')->isoFormat('HH:mm') }}
                                                WIB
                                            </span>
                                        </div>
                                        <p class="card-text" id="date1">
                                            {!! substr($item->deskripsi_agenda, 0, 200) !!}...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Start -->
                        <div class="modal fade" id="agenda-{{ $item->id_agenda }}" tabindex="-1" aria-labelledby="Agenda1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="#Agenda1">{{ $item->nama_agenda }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $item->deskripsi_agenda !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Agenda End -->


    </div>
@endsection
