@extends('layouts.app')
@section('title', 'Agenda - Masjid Miftahul Jannah - Agenda')

@section('content')
    <div>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card mb-3" style="max-width: 100%" data-bs-toggle="modal" data-bs-target="#Agenda1">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start" src="img/pengajian-1.jpg" alt="Agenda1" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pengajian Ahad</h5>
                                    <p class="card-text" id="date1">
                                        Pengajian Ahad yang dibawakan oleh Ust.Aldi
                                    </p>
                                    <i class="bi bi-alarm">10.00 WIB</i>
                                    <i class="bi bi-calendar-event">10 Aug 2023</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 100%" data-bs-toggle="modal" data-bs-target="#Agenda2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start" src="img/pengajian-2.jpg" alt="Agenda2" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pengajian Ahad</h5>
                                    <p class="card-text">
                                        Pengajian Ahad yang dibawakan oleh Ust.Dichenk
                                    </p>
                                    <i class="bi bi-alarm">10.00 WIB</i>
                                    <i class="bi bi-calendar-event">20 Aug 2023</i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="max-width: 100%" data-bs-toggle="modal" data-bs-target="#Agenda3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img class="img-fluid rounded-start" src="img/pengajian-3.jpg" alt="Agenda3" />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Pengajian Ahad</h5>
                                    <p class="card-text">
                                        Pengajian Ahad yang dibawakan oleh Ust.Reza
                                    </p>
                                    <i class="bi bi-alarm">10.00 WIB</i>
                                    <i class="bi bi-calendar-event">30 Aug 2023</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Agenda End -->

        <!-- Modal Start -->
        <div class="modal fade" id="Agenda1" tabindex="-1" aria-labelledby="Agenda1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="#Agenda1">Pengajian Ahad Oleh Ust.Aldi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Agenda2" tabindex="-1" aria-labelledby="Agenda2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="#Agenda2">Pengajian Ahad Oleh Ust.Dichenk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Agenda3" tabindex="-1" aria-labelledby="Agenda3" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="#Agenda3">Pengajian Ahad Oleh Ust.Reza</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
