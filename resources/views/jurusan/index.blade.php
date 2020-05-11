@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{url('/jurusan/search')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{url('/jurusan')}}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{url('/jurusan/createJurusan')}}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $jurusan)
                <tr>
                  <td>{{$data -> firstItem() + $key}}</td>
                  <td>@foreach($fakultas as $f)
                          @if($f->id == $jurusan->id_fakultas)
                          {{ $f->name }}
                          @endif
                      @endforeach</td>
                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td ><a name="btn-update" href="{{ url('/jurusan/editJurusan/'. $jurusan->id) }}"> Edit</a> |
                  <a name="btn-delete" href="{{ url('/jurusan/deleteJurusan/'. $jurusan->id) }}"> Delete</a></td>
                </tr>
               @empty
                <tr>
                  <td colspan="4"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$data->links()}}</div>
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()