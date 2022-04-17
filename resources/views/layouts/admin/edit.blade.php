@extends('layouts.app')

@section('content')

<div class="col d-flex justify-content-center">
    <div class="card m-4" style="width:500px;">
        <div class="container-md mt-5 mb-5 mr-3 ml-3">
            <div class="container">
                <form action="{{route('admins.simpan-data-edit-keluhan', ['id'=>$keluhan->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($formdata as $key => $value)
                        @if ($key == 'reply')
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ $value[1] }}</label>
                                <input type="{{ $value[0] }}" class="form-control" id="{{ $key }}"
                                    name="{{ $key }}" value="{{ $keluhan->keluhan }}">
                            </div>
                        @endif

                    @endforeach
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a type="button" class="btn btn-success" href="{{route('admins.daftar-keluhan')}}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
