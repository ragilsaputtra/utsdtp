@extends('templates.default')


{{-- @php
  $title = 'Data Siswa';
@endphp --}}

@push('page-action')
  <a href="{{ route('publisher.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
 <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>name</th>
            <th>address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $publishers->name }}</td>
            <td>{{ $publishers->address }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  {{-- <h1>bebek</h1> --}}
@endsection