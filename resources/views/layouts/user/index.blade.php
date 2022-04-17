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
                    <th scope="col">NOMOR</th>
                    <th scope="col">Nama Pelapor</th>
                    <th scope="col">Keluhan Anda</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keluhan as $list)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 + ($keluhan->currentPage() - 1) * 5 }}</th>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$list->keluhan}}
                        </td>
                        <td>
                            {{$list->status}}
                        </td>
                        <td>
                            <form action="{{ route('users.hapus-data-keluhan', ['id' => $list->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah Data ini ingin dihapus?')">
                                <div class="btn-group" role="group" aria-label="Basic mixed style example">
                                    @csrf
                                    <a href="{{ route('users.detail-data-keluhan', ['id' => $list->id]) }}" type="button"
                                        class="btn btn-success">Detail</a>
                                    <a href="{{ route('users.edit-data-keluhan', ['id' => $list->id]) }}" type="button"
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
    {{ $keluhan->links() }}
    <div class="mb-3">
        <div class="btn-group-lg" role="group" aria-label="Basic example">
            <a style="position: right;" type="button" class="btn btn-info" href="{{ route('users.tambah-data-keluhan')}}">Ajukan Keluhan</a>
        </div>
    </div>
</div>
@endsection