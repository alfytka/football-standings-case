<?php

namespace App\Http\Controllers;

use App\Http\Requests\KlubRequest;
use App\Http\Requests\UpdateKlubRequest;
use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    public function index()
    {
        return view('pages.klub.index', [
            'klub' => Klub::orderBy('nama_klub', 'asc')->get()
        ]);
    }

    public function create()
    {
        return view('pages.klub.add');
    }

    public function store(KlubRequest $request)
    {
        Klub::create($request->all());
        return redirect(route('klub.index'))->with('info', 'Berhasil menambahkan data klub baru.');
    }

    public function show($id)
    {
        return view('pages.klub.edit', [
            'klub' => Klub::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateKlubRequest $request, $id)
    {
        $klub = [
            'nama_klub' => $request->nama_klub,
            'kota' => $request->kota
        ];
        Klub::where('id', $id)->update($klub);
        return redirect(route('klub.index'))->with('info', 'Berhasil mengubah data klub.');
    }

    public function destroy($id)
    {
        Klub::find($id)->delete();
        return redirect(route('klub.index'))->with('info', 'Berhasil menghapus data klub.');
    }
}
