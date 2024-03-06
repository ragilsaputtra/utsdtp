@extends('templates.default')

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('publisher.update',$publishers) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3"></div>
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" name="example-text-input" placeholder="Input nama" value="{{ $publishers->name }}">
                <div class="mb-3"></div>
                
                {{-- <label class="form-label">Dibuat</label>
                <input type="text" name="created_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Dibuat">
                 <div class="mb-3"></div>
                <label class="form-label">Diupdate</label>
                <input type="text" name="updated_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Diupdite"> --}}
                 <div class="mb-3"></div>
                <label class="form-label">address</label>
                <input type="text" name="alamat" class="form-control" placeholder="Input alamat" value="{{ $publishers->address }}">
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