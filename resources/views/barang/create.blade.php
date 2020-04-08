@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang <small>Add Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{url('/barang/')}}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{url('/barang/storeBarang')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nama Ruangan</label>
                <select name="ruangan_id" class="form-control" required="">
                  @foreach($ruangan as $r)
                  <option value="{{ $r->id }}">{{ $r->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" min="1" name="total" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Rusak</label>
                <input type="number" min="0" name="broken" class="form-control" required>
              </div>
              <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">
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