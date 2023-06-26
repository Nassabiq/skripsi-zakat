@extends('layouts.admin')
@section('title', 'Laporan ZIS - Masjid Miftahul Jannah')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Kelola User</h1>
            <div>
                <button class="btn btn-primary fs-6" type="button" data-bs-toggle="modal" data-bs-target="#modalAddGallery">
                    Tambah User
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Date</th>
                        <th scope="col">-</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr class="align-middle">
                            <td scope="row">{{ $key + 1 }}</td>
                            <td scope="row">{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->roles[0]->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <button class="btn btn-primary mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalEditUser-{{ $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger mr-2" type="button" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteUser-{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Delete User --}}
                        <div class="modal fade" id="modalDeleteUser-{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data User </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda ingin menghapus data user ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('deleteUser', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Delete User --}}

                        {{-- Modal Edit Galeri --}}
                        <div id="modalEditUser-{{ $item->id }}" class="modal fade" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('updateUser', $item->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="px-3">
                                                <div class="p-2 rounded">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama User</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('name', $item->name) }}" placeholder="Nama User"
                                                            name="name">
                                                        @error('name')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control"
                                                            value="{{ old('email', $item->email) }}" placeholder="Email"
                                                            name="email">
                                                        @error('email')
                                                            <div class="text-danger error-messages">{{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Role</label>
                                                        <select class="form-select mb-3"
                                                            aria-label=".form-select-lg example" name="role">
                                                            <option value="" selected>Select User</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->name }}"
                                                                    {{ old('role', $item->roles[0]->name) === $role->name ? 'selected' : '' }}>
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('role')
                                                            <div class="text-danger error-messages">{{ $message }}</div>
                                                        @enderror
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
        {{-- Modal Add User --}}
        <div id="modalAddGallery" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Galeri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('addUser') }}" method="post" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="px-3">
                                <div class="p-2 rounded">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama User"
                                            name="nama_user">
                                        @error('nama_user')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email">
                                        @error('email')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="form-label">Role</label>
                                        <select class="form-select mb-3" aria-label=".form-select-lg example"
                                            name="role">
                                            <option value="" selected>Select User</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="text-danger error-messages">{{ $message }}</div>
                                        @enderror
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
