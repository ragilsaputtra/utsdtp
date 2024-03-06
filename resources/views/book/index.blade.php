@extends('templates.default')

@php
    $title = 'Data Buku';
@endphp

@push('page-action')
    <a href="{{ route('book.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Buku</a>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center">
      <h5 class="card-title mb-0">{{ $title }}</h5>
      <div class="search-wrapper ms-auto"> <form action="{{ route('search') }}" method="get" class="d-flex align-items-center">
          <input type="text" name="searching" class="form-control search-field" placeholder="Pencarian...">
          <button type="submit" class="btn btn-primary rounded-pill ms-2"><i class="fas fa-search"></i>search</button>
        </form>
      </div>
    </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped card-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Cover</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <th class="text-center">Penerbit</th>
                        <th>Tahun</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author->name }}</td>
                            {{-- <td>
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" height="50" class="rounded">
                            </td> --}}

                            <td class="text-secondary"><img src="{{ asset('storage/'.$book->cover) }}" height="150px" alt="foto buku tidak ada"/></td>
                            <td>{{ $book->created_at->format('d F Y') }}</td>
                            <td>{{ $book->updated_at->format('d F Y') }}</td>
                            <td class="text-center">{{ $book->publisher->name }}</td>
                            <td>{{ $book->year }}</td>
                            <td>
                              <div class="d-flex flex-column gap-1 align-items-center">
                                  <a href="{{ route('book.show', $book->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat</a>
                                  <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                  <form action="{{ route('book.destroy', $book->id) }}" method="post" style="display: inline-block;">
                                      @csrf
                                      @method('delete')
                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus buku ini?')"><i class="fas fa-trash-alt"></i> Hapus</button>
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
