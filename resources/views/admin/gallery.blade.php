@extends('layouts.admin')
@section('title', 'Gallery - Dashboard Masjid Miftahul Jannah')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Gallery</h1>
            <div>
                <button class="btn btn-primary fs-6" type="button" data-bs-toggle="modal" data-bs-target="#modalAddGallery">
                    Tambah Gallery
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">-</th>
                        <th scope="col">Id Galeri</th>
                        <th scope="col">Nama Galeri</th>
                        <th scope="col">Tanggal</th>
                        {{-- <th scope="col">Deskripsi</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeri as $item)
                        <tr class="align-middle">
                            <th>
                                <img src="{{ asset('img/galeri/' . $item->id_galeri . '/' . json_decode($item->foto_galeri)[0]) }}"
                                    style="width: 250px" alt="" srcset="">
                            </th>
                            <td scope="row">{{ $item->id_galeri }}</td>
                            <td>{{ $item->nama_galeri }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tgl_galeri)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                            </td>
                            {{-- <td>{!! Str::substr($item->deskripsi_galeri, 0, 300) !!} ...</td> --}}
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-success mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDetailGaleri-{{ $item->id_galeri }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-primary mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalEditGaleri-{{ $item->id_galeri }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteGaleri-{{ $item->id_galeri }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Detail Galeri --}}
                        <div class="modal fade" id="modalDetailGaleri-{{ $item->id_galeri }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Galeri </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div id="carouselExample" class="carousel slide">
                                                    <div class="carousel-inner">
                                                        @foreach (json_decode($item->foto_galeri) as $key => $image)
                                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                                                                <img src="{{ asset('img/galeri/' . $item->id_galeri . '/' . $image) }}"
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
                                                <h2>{{ $item->nama_galeri }}</h2>
                                                <div class="d-flex">
                                                    <i class="bi bi-calendar3 mr-2"></i>
                                                    <p>{{ \Carbon\Carbon::parse($item->tgl_galeri)->locale('id')->isoFormat('dddd, DD MMMM YYYY') }}
                                                    </p>
                                                </div>
                                                <p>{!! $item->deskripsi_galeri !!}</p>
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
                        {{-- End Modal Detail Galeri --}}

                        {{-- Modal Delete Galeri --}}
                        <div class="modal fade" id="modalDeleteGaleri-{{ $item->id_galeri }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Galeri </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus data galeri ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('deleteGallery', $item->id_galeri) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Delete Galeri --}}

                        {{-- Modal Edit Galeri --}}
                        <div id="modalEditGaleri-{{ $item->id_galeri }}" class="modal fade" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Galeri</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('updateGallery', $item->id_galeri) }}" method="post"
                                        class="" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="px-3">
                                                <div class="p-2 rounded">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Galeri</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('nama_galeri', $item->nama_galeri) }}"
                                                            placeholder="Nama Galeri" name="nama_galeri">
                                                        @error('nama_galeri')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                        {{-- {{ $nama_agenda }} --}}
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Deskripsi Galeri</label>
                                                        <textarea class="form-control" rows="5" name="deskripsi_galeri">
                                                            {{ old('deskripsi_galeri', $item->deskripsi_galeri) }}
                                                        </textarea>
                                                        @error('deskripsi_galeri')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Foto Galeri</label>
                                                        <input class="form-control" type="file" id="formFile"
                                                            name="foto_galeri[]" accept="image/*" multiple>
                                                        @error('foto_galeri')
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
        {{-- Modal Add Galeri --}}
        <div id="modalAddGallery" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Galeri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('addGallery') }}" method="post" class=""
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="px-3">
                                <div class="p-2 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Galeri</label>
                                        <input type="text" class="form-control" placeholder="Nama Galeri"
                                            name="nama_galeri">
                                        @error('nama_galeri')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Galeri</label>
                                        <textarea class="form-control" rows="5" name="deskripsi_galeri"></textarea>
                                        @error('deskripsi_galeri')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto Galeri</label>
                                        <input class="form-control" type="file" id="formFile" name="foto_galeri[]"
                                            accept="image/*" multiple>
                                        @error('foto_galeri')
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
        {{-- End Modal Add Galeri --}}
    </div>
    <!-- /.container-fluid -->
@endsection
