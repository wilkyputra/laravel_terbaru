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
            <form method="GET" action="{{url('/fakultas')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" >
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ url('/fakultas') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
            <button type="button" data-toggle="modal" data-target="#importData" class="btn btn-success"><i class="fas fa-file-import"></i> Import Fakultas</button>
          </div>
          <div class="card-header">
            <a href="{{url('/fakultas/createFakultas')}}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $key => $fakultas)
                <tr>
                  <td>{{ $data -> firstItem() + $key }}</td>
                  <td>{{ $fakultas->name }}</td>
                  <td ><a name="btn-update" href="{{ url('/fakultas/editFakultas/'. $fakultas->id) }}"> Edit</a> |
                  <a name="btn-delete" href="{{ url('/fakultas/deleteFakultas/'. $fakultas->id) }}"> Delete</a></td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
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

<!-- Modal -->
    <div class="modal hide fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Tambah Data Fakultas</h5>
          </div>
          <div class="modal-body">
            <form action="{{url('/fakultas/add')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
              <label for="inputNamaFakultas">Nama Fakultas <i style="color: red;">*</i></label>
              <input name="name" type="text" class="form-control" id="inputNamaFakultas" placeholder="Nama Fakultas" required="">
              <br>
              <span style="font-size: 12px;"><i style="color: red;"> * </i> : Data harus terisi</span>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <!-- Modal Import -->
    <div class="modal hide fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="importData" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content"> 
          <div class="modal-header">
            <h5 class="modal-title" id="DataLabel">Import Data Fakultas (Excel)</h5>
          </div>
          <div class="modal-body">
            <form action="{{url('/fakultas/import')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
              <input id="upload" type="file" accept=".xls, .xlsx" name="file" class="form-control">
              <label id="upload-label" for="upload" class="font-weight-light text-muted">Format Wajib .xls / .xlsx</label>
              <div class="input-group-append" style="margin-top: 5px;">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2"></i><small style="font-size: 14px;" class="text-bold">Pilih File</small></label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Import -->