@extends('layouts.admin')
@section('title', 'News - Dashboard Masjid Miftahul Jannah')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">News</h1>
        <div class="p-3 bg-secondary">
            <input type="file" class="d-none" id="file" />
            <div class="row">
                <div class="col-6 p-4" style="background-color: #d7d7d7; border-radius: 20px">
                    <label for="file" id="file" required="">
                        <img style="width: 490px;border-radius: 20px;border: 2px dashed black;"
                            src="https://blogmedia.evbstatic.com/wp-content/uploads/engineering/2018/08/09141147/Flexible-Reusable-React-File-Uploader.png" /></label>
                    <p class="mt-3 text-center">
                        Sebaiknya gunakan file .jpg berkualitas tinggi file dengan
                        ukuran kurang dari 20MB
                    </p>
                </div>
                <div class="col-6">
                    <div class="row justify-content-end">
                        <button class="btn btn-primary btn-simpan col-4 my-4 mx-3" type="submit">
                            Simpan
                        </button>
                    </div>
                    <div class="input-group flex-nowrap my-4">
                        <input type="text" class="form-control" placeholder="Add Tittle..." aria-label="Text"
                            aria-describedby="addon-wrapping" required="" />
                    </div>
                    <div class="input-group flex-nowrap my-4">
                        <input type="text" class="form-control" placeholder="Add Caption..." aria-label="Text"
                            aria-describedby="addon-wrapping" required="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
