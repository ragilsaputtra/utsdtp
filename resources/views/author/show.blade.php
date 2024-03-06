@extends('templates.default')


{{-- @php
  $title = 'Data Siswa';
@endphp --}}

@push('page-action')
  <a href="{{ route('author.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
 <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>nama</th>
            <th>author</th>
            <th>dibuat</th>
            <th>diperbarui</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $authors->name }}</td>
            <td class="text-secondary"><img src="{{ asset('storage/'.$authors->photo) }}" height="150px" alt="hilang"/></td>
            <td class="text-secondary">{{ $authors->created_at }}</td>
            <td class="text-secondary">{{ $authors->updated_at }}</td>
            <td>{{ $authors->address }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  {{-- <h1>bebek</h1> --}}
@endsection