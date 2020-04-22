<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
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

        $this->validate($request, [
            'name' => 'required',
            'total' => 'required',
            'broken' => 'required',
            'created_by' => 'required',
            'ruangan_id' => 'required',
            'gambar' => 'required'
        ]);

        $upgambar = 'barang-'.date('Ymdhis').'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move('uploads', $upgambar);
    	$barang = new Barang;
    	$barang->ruangan_id = $request->ruangan_id;
    	$barang->name = $request->name;
    	$barang->total = $request->total;
    	$barang->broken = $request->broken;
    	$barang->created_by = $request->created_by;
        $barang->gambar =  $upgambar;
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

        $this->validate($request, [
            'name' => 'required',
            'total' => 'required',
            'broken' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
            'ruangan_id' => 'required',
            'gambar' => 'required'
        ]);

        $barang = Barang::findOrFail($id);
        $barang->ruangan_id = $request->ruangan_id;
        $barang->name = $request->name;
        $barang->total = $request->total;
        $barang->broken = $request->broken;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        if( $request->gambar){
            $upgambar = 'barang-'.date('Ymdhis').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move('uploads', $upgambar);
            $barang->gambar = $upgambar;
        }

        $barang->save();
        return redirect('/barang');
    }

    public function exportXLSX(){
        return Excel::download(new BarangExport, 'Barang-'.date("d-m-Y").'.xlsx');
    }


}
