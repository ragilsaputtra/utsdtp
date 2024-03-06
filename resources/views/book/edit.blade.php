@extends('templates.default')

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('book.update',$books) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3"></div>
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" placeholder="Input judul" value="{{ $books->title }}">
                <div class="mb-3"></div>
                
                <div class="mb-3"></div>
                <label class="form-label">cover</label>
                <input type="file" name="photo" class="form-control" placeholder="Input cover">
                <div class="mb-3"></div>

                <label class="form-label">Author</label>
                <select class="dropdown-menu dropdown-menu-demo" name="author_id" id="">
                    @foreach ($authors as $author)
                        <option class="dropdown-item" value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach 
                </select>

                <label class="form-label">publisher</label>
                <select class="dropdown-menu dropdown-menu-demo" name="publisher_id" id="">
                    @foreach ($publishers as $taski)
                        <option class="dropdown-item" value="{{ $taski->id }}">{{ $taski->name }}</option>
                    @endforeach
                </select>
                 <div class="mb-3"></div>
                {{-- <label class="form-label">Dibuat</label>
                <input type="text" name="created_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Dibuat">
                 <div class="mb-3"></div>
                <label class="form-label">Diupdate</label>
                <input type="text" name="updated_at" class="form-control" name="example-text-input" 
                 placeholder="Input Tanggal Diupdite"> --}}
                 <div class="mb-3"></div>
                <label class="form-label">tahun</label>
                <input type="number" name="year" class="form-control" 
                 placeholder="Input tahun"
                 value="{{ $books->year }}">
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