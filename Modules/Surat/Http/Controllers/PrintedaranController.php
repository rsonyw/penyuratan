<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Suratedaran;
use Illuminate\Contracts\Support\Renderable;

class PrintedaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('surat::buatsurat.suratedaran.print', [
            // 'suratedaran' => Suratedaran::select()->where('id', request('id'))->get()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $terbaru = Suratedaran::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tgl_suratedaran);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->no_suratedaran + 1;
        }

        $no_suratedaran = $no . '/A/SWB/' . $cek->format('m') . '/' . $cek->format('Y');

        // return $no_suratedaran;

        $query = Suratedaran::select()->whereYear('tgl_suratedaran', Carbon::now()->format('Y'))->get()->first();
        // return $query;
        return view('surat::buatsurat.suratedaran.create', [
            'no_suratedaran' => $no_suratedaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $terbaru = Suratedaran::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tgl_suratedaran);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->no_suratedaran + 1;
        }

        Suratedaran::create([
            'no_suratedaran' => str_replace("/A/SWB/" . $cek->format('m') . "/" . $cek->format('Y'), "", $request->no_suratedaran),
            'tentang' => $request->tentang,
            'isi' => $request->isi,
            'tgl_suratedaran' => $request->tgl_suratedaran,
            'instansi' => $request->instansi,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'perihal' => $request->perihal,
            'keterangan' => $request->keterangan,
            'dokumen' => $request->dokumen
        ]);

        return redirect()->action([SuratedaranController::class, 'index'])->with('success', 'Surat Berhasil Dibuat, Silahkan Cetak Surat!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::buatsurat.suratedaran.print', [
            'suratedaran' => Suratedaran::select()->where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $suratedaran = Suratedaran::find($id);
        return view('surat::buatsurat.suratedaran.edit', compact('suratedaran'));
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
            'no_suratedaran' => 'required',
            'tentang' => 'required',
            'isi' => 'required',
            'tgl_suratedaran' => 'required',
            'instansi' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',

        ];

        $validatedData = $request->validate($rules);

        $input = $validatedData;
        Suratedaran::where('id', $id)->update($input);

        return redirect('/surat/suratedaran')->with('success', 'Data berhasil diupdate');
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
