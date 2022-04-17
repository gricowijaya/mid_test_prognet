@extends('layouts.app')

@section('content')
<div class="container">
    {{-- untuk memberikan status yang sudah dituliskan --}}
    @if (session('status'))
        <h6 class="alert alert-success alert-dismissible fade show">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </h6>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <caption>Daftar Keluhan</caption>
            <thead>
                <tr>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Keluhan Anda</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keluhan as $list)
                    <tr>
                        <td>
                            {{$list->users->name}}
                        </td>
                        <td>
                            {{$list->keluhan}}
                        </td>
                        <td>
                            {{$list->status}}
                        </td>
                        <td>
                            <form action="{{ route('admins.hapus-data-keluhan', ['id' => $list->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah Data ini ingin dihapus?')">
                                <div class="btn-group" role="group" aria-label="Basic mixed style example">
                                    @csrf
                                    <a href="{{ route('admins.detail-data-keluhan', ['id' => $list->id]) }}" type="button"
                                        class="btn btn-success">Detail</a>
                                    <a href="{{ route('admins.edit-data-keluhan', ['id' => $list->id]) }}" type="button"
                                        class="btn btn-warning">Sunting</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="mb-3">
</div>
@endsection