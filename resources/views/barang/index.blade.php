@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{url('/barang')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{url('/barang')}}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
            <a href="{{url('/barang/exportXLSX')}}">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Barang</button>
            </a>
          </div>
          @if(auth()->user()->role == "admin")
          <div class="card-header">
            <a href="{{url('/barang/createBarang')}}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Total Barang</th>
                  <th scope="col">Barang Rusak</th>
                  <th scope="col">Dibuat Oleh</th>
                  <th scope="col">Diupdate Oleh</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($barang as $key => $b)
                <tr>
                  <td>{{$barang -> firstItem() + $key}}</td>
                  <td>{{$b->ruangan->name}}</td>
                  <td>{{ $b->name }}</td>
                  <td>{{ $b->total }}</td>
                  <td>{{ $b->broken }}</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->created_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->updated_by)
                          {{ $u->nama_user }}
                        @endif
                      @endforeach</td>
                  <td ><a name="btn-update" href="{{ url('/barang/editBarang/'. $b->id) }}"> Edit</a>
                    @if(auth()->user()->role == "admin") |
                  <a name="btn-delete" href="{{ url('/barang/deleteBarang/'. $b->id) }}"> Delete</a>
                  @endif
                </td>
                </tr>
               @empty
                <tr>
                  <td colspan="8"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{$barang->links()}}</div>
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