<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use App\Barang;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function dashboard(){
    	$totalfakultas = Fakultas::count();
    	$totaljurusan = Jurusan::count();
    	$totalruangan = Ruangan::count();
    	$totalbarang = Barang::count();
        return view('dashboard', compact('totalfakultas', 'totaljurusan', 'totalruangan', 'totalbarang'));
    }
}
