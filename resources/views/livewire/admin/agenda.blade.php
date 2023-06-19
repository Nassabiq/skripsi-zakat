@section('title', 'Agenda - Dashboard Masjid Miftahul Jannah')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    {{ $count }}
    <button wire:click="counter">click</button>
    <div class="d-flex justify-content-between">
        <h1 class="h3 mb-4 text-gray-800">Agenda</h1>
        <div>
            <button class="btn btn-primary fs-6" type="button" data-bs-toggle="modal" data-bs-target="#modalAddAgenda">
                Tambah Agenda
            </button>
            {{ $count }}
        </div>
    </div>
    <div class="col-12">
        <div class="row justify-content-between">
            <div class="input-group my-4 col">
                <input type="text" class="form-control col-3" placeholder="Search..." aria-label="Search"
                    aria-describedby="search-button" required="" />
                <button class="btn btn-primary" type="button" id="search-button">
                    Search
                </button>
            </div>
            <div class="form-inline col-auto">
                <label for="per-page"> Per-Page</label>
                <select id="per-page" class="form-control">
                    <option value="5">5</option>
                    <option value="5">10</option>
                    <option value="5">15</option>
                </select>
                <label for="status-validasi"> Status</label>
                <select id="status-validasi" class="form-control col-auto">
                    <option value="belum-validasi">Belum Validasi</option>
                    <option value="sudah-validasi">Sudah Validasi</option>
                </select>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id Agenda</th>
                    <th scope="col">Tittle</th>
                    <th scope="col">Date</th>
                    <th scope="col">File</th>
                    <th scope="col">Validation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">id_agenda1_</th>
                    <td>Qurban</td>
                    <td>10-05-2023</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn btn-secondary mr-2" type="button">
                                    <i class="bi bi-file-earmark-text"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4">
                                <button class="btn btn-success mr-2" type="button">
                                    <i class="bi bi-check-square"></i>
                                </button>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-danger mr-2" type="button">
                                    <i class="bi bi-x-square"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                <!-- Tambahkan baris data sesuai kebutuhan -->
            </tbody>
        </table>
        <div class="d-flex my-4 justify-content-between">
            <button class="btn btn-primary mr-2 btn-prev" type="button">
                Prev
            </button>
            <button class="btn btn-primary btn-next" type="button">
                Next
            </button>
        </div>
    </div>

    {{-- Modal Add Agenda --}}
    <div id="modalAddAgenda" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Agenda</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="p-2 rounded row">
                            <input type="file" class="d-none" id="file" name="foto_agenda" />
                            <div class="col-6 p-4" style="background-color: #d7d7d7; border-radius: 20px">
                                <label for="file" id="file" required="">
                                    <img style="width: 100%;border-radius: 20px;border: 2px dashed black; cursor:pointer;"
                                        src="https://blogmedia.evbstatic.com/wp-content/uploads/engineering/2018/08/09141147/Flexible-Reusable-React-File-Uploader.png" />
                                </label>
                                <p class="mt-3 text-center">
                                    Sebaiknya gunakan file .jpg berkualitas tinggi file dengan
                                    ukuran kurang dari 20MB
                                </p>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama Agenda</label>
                                    <input type="text" class="form-control" placeholder="Nama Agenda"
                                        wire:model="nama_agenda">
                                    {{-- {{ $nama_agenda }} --}}
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Agenda</label>
                                    <input type="datetime-local" class="form-control" placeholder="Tanggal Agenda">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Agenda</label>
                                    <textarea id="editorAgenda"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto Agenda</label>
                                    <input class="form-control" type="file" id="formFile"
                                        wire:model="foto_agenda" accept="image/*">
                                </div>
                                @if ($foto_agenda)
                                    {{ $foto_agenda }}
                                    {{-- <img src=""> --}}
                                    {{-- <div class="col-6">
                                            Photo Preview:
                                        </div> --}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        ClassicEditor
            .create(document.querySelector('#editorAgenda'), {
                ckfinder: {
                    uploadUrl: "{{ route('storeAgenda') . '?_token=' . csrf_token() }}",
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script> --}}
</div>
