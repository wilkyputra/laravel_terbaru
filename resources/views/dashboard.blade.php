@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Dashboard";
  document.getElementById('dashboard').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Dashboard</h1>
  </div>

  <div class="row d-flex justify-content-around mb-5">
	    <div class="col-12 col-md-6 col-lg-4">
	    <a href="{{url('fakultas')}}" class="nounderline">
	      <div class="card card-primary">
	        <div class="card-header">
	          <i class="fas fa-angle-double-right"></i>
	          <div class="ml-auto">
	            <h4>Total Fakultas</h4>
	            <h3 align="center">{{ $totalfakultas }}</h3>
	          </div>
	        </div>
	      </div>
	    </a>
	    </div>
	    <div class="col-12 col-md-6 col-lg-4">
	    <a href="{{url('jurusan')}}" class="nounderline">
	      <div class="card card-primary">
	        <div class="card-header">
	          <i class="fas fa-angle-double-right"></i>
	          <div class="ml-auto">
	            <h4>Total Jurusan</h4>
	            <h3 align="center">{{ $totaljurusan }}</h3>
	          </div>
	        </div>
	      </div>
	    </a>
	    </div>
	</div>
	<div class="row d-flex justify-content-around">
	    <div class="col-12 col-md-6 col-lg-4">
	    <a href="{{url('ruangan')}}" class="nounderline">
	      <div class="card card-secondary">
	        <div class="card-header">
	          <i class="fas fa-angle-double-right"></i>
	          <div class="ml-auto">
	            <h4>Total Ruangan</h4>
	            <h3 align="center">{{ $totalruangan }}</h3>
	          </div>
	        </div>
	      </div>
	    </a>
	    </div>
	    <div class="col-12 col-md-6 col-lg-4">
	    <a href="{{url('barang')}}" class="nounderline">
	      <div class="card card-info">
	        <div class="card-header">
	          <i class="fas fa-angle-double-right"></i>
	          <div class="ml-auto">
	            <h4>Total Barang</h4>
	            <h3 align="center">{{ $totalbarang }}</h3>
	          </div>
	        </div>
	      </div>
	    </a>
	    </div>
	</div>

</section>
@endsection()