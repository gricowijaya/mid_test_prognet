@extends('layouts.app')

@section('content')

<div class="col d-flex justify-content-center">
    <div class="card m-4" style="width:500px;">
        <div class="container-md mt-5 mb-5 mr-3 ml-3">
            <div class="container">
                <label for="name" class="form-label">Nama Pelapor</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="1"
                    readonly>{{ $user->name }}</textarea>
                <label for="name" class="form-label mt-5">Tanggal Pengajuan</label>
                <textarea class="form-control" id="tanggal" name="tanggal" rows="1"
                    readonly>{{ $keluhans->updated_at }}</textarea>
                <label for="keluhan" class="form-label mt-5">Deskripsi Keluhan</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="10"
                    readonly>{{ $keluhans->keluhan }}</textarea>
                <a type="button" class="btn  btn-success mt-5 ml-5" href="{{ route('admins.daftar-keluhan') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
