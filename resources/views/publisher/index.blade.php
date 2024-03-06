@extends('templates.default')

@php
    $title = 'Data Penerbit';
@endphp

@push('page-action')
    <a href="{{ route('publisher.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Penerbit</a>
@endpush

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ $title }}</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped card-table">
                <thead>
                    <tr>
                        <th>Nama Penerbit</th>
                        <th>Alamat</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publishers as $publisher)
                        <tr>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->address }}</td>
                            <td>{{ $publisher->created_at->format('d F Y') }}</td>
                            <td>{{ $publisher->updated_at->format('d F Y') }}</td>
                            <td>
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('publisher.show', $publisher->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat</a>
                                    <a href="{{ route('publisher.edit', $publisher->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                    <form action="{{ route('publisher.destroy', $publisher->id) }}" method="post" style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus penerbit ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
