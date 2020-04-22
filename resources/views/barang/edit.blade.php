@extends('layouts.adminmain')

@section('content')
<section class="section">
  @if(count($errors) > 0)
            <div class="card-body">
                <div class="alert alert-danger">
                    Create Error
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('/barang/') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/barang/updateBarang/'.$barang->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="text" name="id" class="form-control" value="{{ $barang->id }}" hidden>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <select name="ruangan_id" class="form-control" required="">
                  @foreach($ruangan as $r)
                  <option value="{{ $r->id }}" {{ ($barang->ruangan_id == $r->id) ? 'selected' : ''}}>{{ $r->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="name" class="form-control" value="{{ $barang->name }}">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" min="1" name="total" class="form-control" value="{{ $barang->total }}">
              </div>
              <div class="form-group">
                <label>Rusak</label>
                <input type="number" min="0" name="broken" class="form-control" value="{{ $barang->broken }}">
              </div>
              <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" id="foto" accept=".jpg, .png, .jpeg">
              </div>
              <input type="hidden" name="created_by" value="{{ $barang->created_by }}">
              <input type="hidden" name="updated_by" value="{{ auth()->user()->id }}">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()

