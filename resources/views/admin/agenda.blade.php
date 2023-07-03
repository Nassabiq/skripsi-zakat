@extends('layouts.admin')
@section('title', 'Agenda - Dashboard Masjid Miftahul Jannah')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Agenda</h1>
            <div>
                @hasanyrole('takmir|admin')
                    <button class="btn btn-primary fs-6" type="button" data-bs-toggle="modal" data-bs-target="#modalAddAgenda">
                        Tambah Agenda
                    </button>
                @endhasanyrole
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">-</th>
                            <th scope="col">Id Agenda</th>
                            <th scope="col">Nama Agenda</th>
                            <th scope="col">Date</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Validation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agenda as $item)
                            <tr class="align-middle">
                                <td>
                                    <img src="{{ asset('img/agenda/' . $item->foto_agenda) }}" style="width: 250px"
                                        alt="" srcset="">
                                </td>
                                <th scope="row">{{ $item->id_agenda }}</th>
                                <td>{{ $item->nama_agenda }}</td>
                                <td>{{ $item->tgl_agenda }}</td>
                                <td>{!! $item->deskripsi_agenda !!}</td>
                                <td>
                                    @if ($item->status_agenda == 0)
                                        <span class="badge text-bg-danger">Belum Divalidasi</span>
                                    @else
                                        <span class="badge text-bg-success">Sudah Divalidasi</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        @hasanyrole('admin|ketua')
                                            @if ($item->status_agenda == 0)
                                                <button class="btn btn-success mr-2" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#modalValidasiAgenda-{{ $item->id_agenda }}">
                                                    <i class="bi bi-check-square"></i>
                                                </button>
                                            @endif
                                        @endhasanyrole
                                        <button class="btn btn-primary mr-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalEditAgenda-{{ $item->id_agenda }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-danger mr-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalDeleteAgenda-{{ $item->id_agenda }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Validasi Agenda --}}
                            <div class="modal fade" id="modalValidasiAgenda-{{ $item->id_agenda }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Validasi Agenda </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda ingin memvalidasi data ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('validasiAgenda', $item->id_agenda) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary">Validasi</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Validasi Agenda --}}

                            {{-- Modal Delete Agenda --}}
                            <div class="modal fade" id="modalDeleteAgenda-{{ $item->id_agenda }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Agenda </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda ingin menghapus data agenda ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('deleteAgenda', $item->id_agenda) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Delete Agenda --}}

                            {{-- Modal Edit Agenda --}}
                            <div id="modalEditAgenda-{{ $item->id_agenda }}" class="modal fade" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Agenda</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('updateAgenda', $item->id_agenda) }}" method="post"
                                            class="" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="px-3">
                                                    <div class="p-2 rounded">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Agenda</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('nama_agenda', $item->nama_agenda) }}"
                                                                placeholder="Nama Agenda" name="nama_agenda">
                                                            @error('nama_agenda')
                                                                <div class="text-danger error-messages">{{ $message }}
                                                                </div>
                                                            @enderror
                                                            {{-- {{ $nama_agenda }} --}}
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal Agenda</label>
                                                            <input type="datetime-local" name="tgl_agenda"
                                                                value="{{ old('tgl_agenda', $item->tgl_agenda) }}"
                                                                class="form-control" placeholder="Tanggal Agenda">
                                                            @error('tgl_agenda')
                                                                <div class="text-danger error-messages">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Deskripsi Agenda</label>
                                                            <textarea class="form-control" rows="5" name="deskripsi_agenda">
                                                                {{ old('deskripsi_agenda', $item->deskripsi_agenda) }}
                                                            </textarea>
                                                            @error('deskripsi_agenda')
                                                                <div class="text-danger error-messages">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">Foto Agenda</label>
                                                            <input class="form-control" type="file" id="formFile"
                                                                name="foto_agenda" accept="image/*">
                                                            @error('foto_agenda')
                                                                <div class="text-danger error-messages">{{ $message }}
                                                                </div>
                                                            @enderror
                                                            <p class="mt-3 text-center">
                                                                Upload File nya kembali jika ingin melakukan perubahan
                                                                menyeluruh!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal Edit Agenda --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Add Agenda --}}
        <div id="modalAddAgenda" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Agenda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="agenda" method="post" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="px-3">
                                <div class="p-2 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Agenda</label>
                                        <input type="text" class="form-control" placeholder="Nama Agenda"
                                            name="nama_agenda">
                                        @error('nama_agenda')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                        {{-- {{ $nama_agenda }} --}}
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Agenda</label>
                                        <input type="datetime-local" name="tgl_agenda" class="form-control"
                                            placeholder="Tanggal Agenda">
                                        @error('tgl_agenda')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Agenda</label>
                                        <textarea class="form-control" rows="5" name="deskripsi_agenda"></textarea>
                                        @error('deskripsi_agenda')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto Agenda</label>
                                        <input class="form-control" type="file" id="formFile" name="foto_agenda"
                                            accept="image/*">
                                        @error('foto_agenda')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                        <p class="mt-3 text-center">
                                            Sebaiknya gunakan file .jpg berkualitas tinggi file dengan
                                            ukuran kurang dari 20MB
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Add Agenda --}}
    </div>
@endsection
