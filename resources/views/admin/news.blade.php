@extends('layouts.admin')
@section('title', 'News - Dashboard Masjid Miftahul Jannah')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">News</h1>
            <div>
                @hasanyrole('takmir|admin')
                    <button class="btn btn-primary fs-6" type="button" data-bs-toggle="modal" data-bs-target="#modalAddBerita">
                        Tambah Berita
                    </button>
                @endhasanyrole
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">-</th>
                        <th scope="col">Id</th>
                        <th scope="col">Judul Berita</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($berita as $item)
                        <tr class="align-middle">
                            <th>
                                <img src="{{ asset('img/berita/' . $item->id_berita_masjid . '/' . json_decode($item->foto_berita)[0]) }}"
                                    style="width: 250px" alt="" srcset="">
                            </th>
                            <td scope="row">{{ $item->id_berita_masjid }}</td>
                            <td>{{ $item->nama_berita }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tgl_berita)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                            </td>
                            <td>
                                @if ($item->is_published == 0)
                                    <span class="badge text-bg-danger">Belum Dipublish</span>
                                @else
                                    <span class="badge text-bg-success">Publish</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    @hasanyrole('ketua|admin')
                                        @if ($item->is_published == 0)
                                            <button class="btn btn-secondary mr-2" type="button" data-bs-toggle="modal"
                                                data-bs-target="#modalPublishBerita-{{ $item->id_berita_masjid }}">
                                                <i class="bi bi-file-arrow-up"></i>
                                            </button>
                                        @endif
                                    @endhasanyrole
                                    <button class="btn btn-success mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDetailBerita-{{ $item->id_berita_masjid }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-primary mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalEditBerita-{{ $item->id_berita_masjid }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteBerita-{{ $item->id_berita_masjid }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Detail Berita --}}

                        {{-- Modal Delete Berita --}}
                        <div class="modal fade" id="modalDeleteBerita-{{ $item->id_berita_masjid }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Berita </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus data berita ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('deleteBerita', $item->id_berita_masjid) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Delete Berita --}}

                        {{-- Modal Publish Berita --}}
                        <div class="modal fade" id="modalPublishBerita-{{ $item->id_berita_masjid }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Publish Berita </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin mempublish data berita ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('publishBerita', $item->id_berita_masjid) }}"
                                            method="post">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Publish</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Publish Berita --}}

                        {{-- Modal Edit Berita --}}
                        <div id="modalEditBerita-{{ $item->id_berita_masjid }}" class="modal fade" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Galeri</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('updateBerita', $item->id_berita_masjid) }}" method="post"
                                        class="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="px-3">
                                                <div class="p-2 rounded">
                                                    <div class="mb-3">
                                                        <label class="form-label">Judul Berita</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('nama_galeri', $item->nama_berita) }}"
                                                            placeholder="Nama Berita" name="nama_berita">
                                                        @error('nama_berita')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                        {{-- {{ $nama_agenda }} --}}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Deskripsi</label>
                                                        <textarea class="form-control" rows="5" class="deskripsi_berita" name="deskripsi_berita">
                                                            {{ old('deskripsi_berita', $item->deskripsi_berita) }}
                                                        </textarea>
                                                        @error('deskripsi_berita')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Foto Berita</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            name="foto_berita[]" accept="image/*" multiple>
                                                        @error('foto_berita')
                                                            <div class="text-danger error-messages">{{ $message }}</div>
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

        {{-- Modal Add Berita --}}
        <div id="modalAddBerita" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Berita</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('addBerita') }}" method="post" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="px-3">
                                <div class="p-2 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Judul Berita</label>
                                        <input type="text" class="form-control" placeholder="Judul Berita"
                                            name="nama_berita">
                                        @error('nama_berita')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Berita</label>
                                        <textarea class="form-control" rows="5" name="deskripsi_berita"></textarea>
                                        @error('deskripsi_berita')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto Berita</label>
                                        <input class="form-control" type="file" id="formFile" name="foto_berita[]"
                                            accept="image/*" multiple>
                                        @error('foto_berita')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                        <p class="mt-3 text-center">
                                            Sebaiknya gunakan file .jpg berkualitas tinggi file dengan
                                            ukuran kurang dari 20MB. File dapat berisi lebih dari satu gambar.
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
        {{-- End Modal Add Berita --}}
    </div>
    <!-- /.container-fluid -->
@endsection
