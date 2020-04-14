<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Ruangan;
use App\User;
use App\Barang;

class BarangController extends Controller
{
     public function index(Request $request){

    	$barang = Barang::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $ruangan = Ruangan::all();
        $user = User::all();

        return view('barang.index', compact('ruangan', 'barang', 'user'));
    }

    public function create(){
    	$ruangan=Ruangan::all();
    	$barang=Barang::all();

    	return view('barang.create',compact('ruangan','barang'));
    }

    public function store(Request $request){
    	$barang = new Barang;
    	$barang->ruangan_id = $request->ruangan_id;
    	$barang->name = $request->name;
    	$barang->total = $request->total;
    	$barang->broken = $request->broken;
    	$barang->created_by = $request->created_by;
    	$barang->save();
    	return redirect('/barang');
    }

    public function destroy($id){
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang');
    }

    public function edit($id){
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::all();
        return view('barang.edit', compact('ruangan', 'barang'));
    }

    public function update($id, Request $request){
        $barang = Barang::findOrFail($id);
        $barang->ruangan_id = $request->ruangan_id;
        $barang->name = $request->name;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->save();
        return redirect('/barang');
    }

    public function exportXLSX(){
        return Excel::download(new BarangExport, 'Barang-'.date("d-m-Y").'.xlsx');
    }
}
