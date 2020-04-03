<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use App\Jurusan;
use DB;

class JurusanController extends Controller
{

public function search(Request $request)
    {
        $fakultas = Fakultas::all();
        $search = $request->search;
        $searchFakultas = DB::table('fakultas')
                            ->select('id')
                            ->where('name', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $data = DB::table('Jurusan')->where('id_fakultas', '=', $src)->paginate(10);

            return view('jurusan.index', compact('data','fakultas'));
        }
    }

    public function index(Request $request){
        $data = Jurusan::paginate(10);
        $fakultas = Fakultas::all();

        return view('jurusan.index', compact('data','fakultas'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view ('jurusan.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'id_fakultas' => $request->id_fakultas
        ]);

        return redirect('jurusan');
    }

    public function edit($id)
    {
        $fakultas = Fakultas::all();
        $data = Jurusan::find($id);

        return view('jurusan.edit', compact('data', 'fakultas'));
    }

    public function update($id, Request $request)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->id_fakultas = $request->id_fakultas;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect('jurusan');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete($jurusan);

        return redirect('jurusan');
    }
}
