@extends('templates.default')

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('publisher.store') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3"></div>
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="Input name">
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
                <input type="text" name="address" class="form-control" placeholder="Input alamat">
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