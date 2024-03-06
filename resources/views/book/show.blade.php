@extends('templates.default')


{{-- @php
  $title = 'Data Siswa';
@endphp --}}

@push('page-action')
  <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
 <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Cover</th>
            <th>Dibuat</th>
            <th>Diperbarui</th>
            <th class="text-center">Penerbit</th>
            <th>Tahun</th>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $books->title }}</td>
            <td class="text-secondary">{{ $books->author->name }}</td>
            <td class="text-secondary"><img src="{{ asset('storage/'.$books->cover) }}" height="150px" alt="hilang"/></td>
            <td class="text-secondary">{{ $books->created_at }}</td>
            <td class="text-secondary">{{ $books->updated_at }}</td>
            <td class="text-secondary">{{ $books->publisher->name }}</td>
            <td>{{ $books->year }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection