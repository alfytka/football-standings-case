<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkorRequest;
use App\Models\Klub;
use App\Models\Skor_pertandingan;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function index()
    {
        return view('pages.skor-pertandingan.index', [
            'skor' => Skor_pertandingan::latest()->get()
        ]);
    }

    public function create()
    {
        return view('pages.skor-pertandingan.add', [
            'klub' => Klub::latest()->get()
        ]);
    }

    public function store(SkorRequest $request)
    {
        $skor = Skor_pertandingan::all();

        if ($request->id_klub1 == $request->id_klub2) {
            return redirect(route('skor-pertandingan.create'))->with('info', 'Perhatian, Klub yang saling berlawanan tidak boleh sama.');
        } else if ($skor->where('id_klub1', $request->id_klub1)->where('id_klub2', $request->id_klub2)->count() > 0) {
            return redirect(route('skor-pertandingan.create'))->with('info', 'Pertandingan dengan dua tim yang Anda pilih sudah ada, coba cek lagi.');
        } else {
            Skor_pertandingan::create($request->all());
            $klub1 = $request->id_klub1;
            $klub2 = $request->id_klub2;
            if ($request->skor_1 > $request->skor_2) {
                $klubs = Klub::find($klub1);
                $klubMenang = [
                    'main' => + $klubs->main += 1,
                    'menang' => $klubs->menang += 1,
                    'goal_menang' => $klubs->goal_menang += $request->skor_1,
                    'goal_kalah' => $klubs->goal_kalah += $request->skor_2,
                    'point' => + $klubs->point += 3
                ];
                Klub::where('id', $klub1)->update($klubMenang);
                $klubs2 = Klub::find($klub2);
                $klubKalah = [
                    'main' => + $klubs2->main += 1,
                    'kalah' => $klubs2->kalah += 1,
                    'goal_menang' => $klubs2->goal_menang += $request->skor_2,
                    'goal_kalah' => $klubs2->goal_kalah += $request->skor_1
                ];
                Klub::where('id', $klub2)->update($klubKalah);
            } else if ($request->skor_1 < $request->skor_2) {
                $klubb = Klub::find($klub2);
                $klub2Menang = [
                    'main' => + $klubb->main += 1,
                    'menang' => $klubb->menang += 1,
                    'goal_menang' => $klubb->goal_menang += $request->skor_2,
                    'goal_kalah' => $klubb->goal_kalah += $request->skor_1,
                    'point' => + $klubb->point += 3
                ];
                Klub::where('id', $klub2)->update($klub2Menang);
                $klubs1 = Klub::find($klub1);
                $klub1Kalah = [
                    'main' => + $klubs1->main += 1,
                    'kalah' => $klubs1->kalah += 1,
                    'goal_menang' => $klubs1->goal_menang += $request->skor_1,
                    'goal_kalah' => $klubs1->goal_kalah += $request->skor_2
                ];
                Klub::where('id', $klub2)->update($klub1Kalah);
            } else if ($request->skor_1 == $request->skor_2) {
                $klub1Seri = Klub::find($klub1);
                $upKlub1 = [
                    'main' => + $klub1Seri->main += 1,
                    'seri' => $klub1Seri->seri += 1,
                    'goal_menang' => $klub1Seri->goal_menang += $request->skor_1,
                    'goal_kalah' => $klub1Seri->goal_kalah += $request->skor_2,
                    'point' => + $klub1Seri->point += 1
                ];
                Klub::where('id', $klub1)->update($upKlub1);
                $klub2Seri = Klub::find($klub2);
                $upKlub2 = [
                    'main' => + $klub2Seri->main += 1,
                    'seri' => $klub2Seri->seri += 1,
                    'goal_menang' => $klub2Seri->goal_menang += $request->skor_2,
                    'goal_kalah' => $klub2Seri->goal_kalah += $request->skor_1,
                    'point' => + $klub2Seri->point += 1
                ];
                Klub::where('id', $klub2)->update($upKlub2);
            }
        }

        return redirect(route('skor-pertandingan.index'))->with('info', 'Berhasil menambahkan skor pertandiban baru.');
    }

    public function show($id)
    {
        return view('pages.skor-pertandingan.edit', [
            'klub' => Klub::latest()->get(),
            'skor' => Skor_pertandingan::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(SkorRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Skor_pertandingan::find($id)->delete();
        return redirect(route('skor-pertandingan.index'))->with('info', 'Berhasil menghapus data skor pertandingan.');
    }
}
