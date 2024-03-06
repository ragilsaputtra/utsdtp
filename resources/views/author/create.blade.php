@extends('templates.default')

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('author.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"></div>
                <label class="form-label">nama</label>
                <input type="text" name="name" class="form-control" name="example-text-input" 
                 placeholder="Input nama">
                <div class="mb-3"></div>

                <div class="mb-3"></div>
                <label class="form-label">photo</label>
                <input type="file" name="photo" class="form-control" placeholder="Input cover">
                <div class="mb-3"></div>

                 <div class="mb-3"></div>
                <label class="form-label">Dibuat</label>
                <input type="text" name="created_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Dibuat">
                 <div class="mb-3"></div>
                <label class="form-label">Diupdate</label>
                <input type="text" name="updated_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Diupdite">
                 {{-- <div class="mb-3"></div>
                <label class="form-label">tahun</label>
                <input type="number" name="year" class="form-control" 
                 placeholder="Input alamat"> --}}
                 <br>
                 <br>

                 <div class="mb-3">
                    <input type="submit" value="simpan" class="btn btn-primary">
                </div>
        </div>

       
                
    </form>
          </div>
        </div>
    </div>
@endsection

{{-- <div class="dropdown-menu dropdown-menu-demo">
    <a class="dropdown-item" href="#">
      Action
    </a>
    <a class="dropdown-item" href="#">
      Another action
    </a>
  </div> --}}