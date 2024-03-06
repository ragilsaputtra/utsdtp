@extends('templates.default')

@php
$title = 'Data Author';
@endphp

@push('page-action')
<a href="{{ route('author.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Author</a>

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
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Dibuat</th>
                    <th>Diperbarui</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td class="text-secondary"><img src="{{ asset('storage/'.$author->photo) }}" height="150px" alt="foto author tidak ada"/></td>
                        <td>{{ $author->created_at->format('d F Y') }}</td>
                        <td>{{ $author->updated_at->format('d F Y') }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('author.show', $author->id) }}" class="btn btn-sm btn-info text-sm"><i class="fas fa-eye"></i> Lihat</a>
                                <a href="{{ route('author.edit', $author->id) }}" class="btn btn-sm btn-warning text-sm"><i class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('author.destroy', $author->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger text-sm" onclick="return confirm('Yakin ingin menghapus author ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
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
