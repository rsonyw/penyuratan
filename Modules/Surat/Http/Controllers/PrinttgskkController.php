<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Surattgskk;
use Illuminate\Contracts\Support\Renderable;

class PrinttgskkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $terbaru = Surattgskk::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tgl_surattgskk);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->no_surattgskk + 1;
        }

        $no_surattgskk = $no . '/A/SWB-SDKK/' . $cek->format('m') . '/' . $cek->format('Y');
        return view('surat::buatsurat.surattgskk.create', [
            'no_surattgskk' => $no_surattgskk,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $terbaru = Surattgskk::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tgl_surattgskk);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->no_surattgskk + 1;
        }

        Surattgskk::create([
            'no_surattgskk' => str_replace("/A/SWB-SDKK/" . $cek->format('m') . "/" . $cek->format('Y'), "", $request->no_surattgskk),
            'tgl_surattgskk' => $request->tgl_surattgskk,
            'kepada' => $request->kepada,
            'untuk' => $request->untuk,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'tertanda' => $request->tertanda,
            'nama' => $request->nama,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'instansi' => $request->instansi,
            'dokumen' => $request->dokumen,
        ]);

        return redirect()->action([SurattgskkController::class, 'index'])->with('success', 'Surat Berhasil Dibuat, Silahkan Cetak Surat!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::buatsurat.surattgskk.printtgskk', [
            'surattgskk' => Surattgskk::select()->where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $surattgskk = Surattgskk::find($id);
        return view('surat::buatsurat.surattgskk.edit', compact('surattgskk'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'no_surattgskk' => 'required',
            'tgl_surattgskk' => 'required',
            'kepada' => 'required',
            'untuk' => 'required',
            'waktu_pelaksanaan' => 'required',
            'tertanda' => 'required',
            'nama' => 'required',

        ];

        $validatedData = $request->validate($rules);

        $input = $validatedData;
        Surattgskk::where('id', $id)->update($input);

        return redirect('/surat/surattgskk')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
