@extends('layouts.app')


@section('header')
    <h1 class="container" style="text-align: center; margin-top: 1em;">Ajukan Keluhan</h1>
@endsection

@section('content')
    <form action="{{route('admins.simpan-data-keluhan')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            @if (session('status'))
                <h6 class="alert alert-success"> {{ session('status') }}</h6>
            @endif

            <div class="mb-3">
                <label for="keluhan" class="form-label" style="margin-top:1em">Deskripsi </label>
                <textarea name="keluhan" class="form-control" id="keluhan" rows="3">Ketik Deskripsi keluhan</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a type="button" class="btn btn-success" href="{{route('admins.daftar-keluhan')}}">Kembali</a>
        </div>
    </form>
@endsection