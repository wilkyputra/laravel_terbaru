<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Jurusan;

class RuanganController extends Controller
{
     public function index(Request $request){

    	$ruangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);
        $jurusan = Jurusan::all();

        return view('ruangan.index', compact('ruangan', 'jurusan'));
    }

    public function create(){
    	$ruangan=Ruangan::all();
    	$jurusan=Jurusan::all();

    	return view('ruangan.create',compact('ruangan','jurusan'));
    }

    public function store(Request $request){
    	$ruangan = new Ruangan;
    	$ruangan->jurusan_id = $request->jurusan_id;
    	$ruangan->name = $request->name;
    	$ruangan->save();
    	return redirect('/ruangan');
    }

    public function destroy($id){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        return redirect('/ruangan');
    }

    public function edit($id){
        $ruangan = Ruangan::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('ruangan.edit', compact('ruangan', 'jurusan'));
    }

    public function update($id, Request $request){
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->jurusan_id = $request->jurusan_id;
        $ruangan->name = $request->name;
        $ruangan->save();
        return redirect('/ruangan');
    }
}
