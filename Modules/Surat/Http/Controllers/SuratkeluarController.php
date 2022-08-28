<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Surat\Entities\Suratkeluar;
use Illuminate\Contracts\Support\Renderable;
use Modules\Surat\Http\Controllers\PrintsuratController;
// use Illuminate\Http\RedirectResponse;

class SuratkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $terbaru = Suratkeluar::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tanggal_buat);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->nomor_surat + 1;
        }

        $nomor_surat = $no . '/B/SWB/' . $cek->format('m') . '/' . $cek->format('Y');

        return view('surat::buatsurat.suratkeluar.index', [
            'asuratkeluar' => Suratkeluar::all(),
            'nomor_surat' => $nomor_surat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('surat::buatsurat.suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $terbaru = Suratkeluar::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tanggal_buat);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->nomor_surat + 1;
        }

        $dokumen = $request->file('dokumen')->store('dok_suratkeluar');
        if ($request->file('dokumen')) {
            $dokumen;
        }

        Suratkeluar::create([
            'nomor_surat' => str_replace("/B/SWB/" . $cek->format('m') . "/" . $cek->format('Y'), "", $request->nomor_surat),
            'tanggal_buat' => $request->tanggal_buat,
            'perihal' => $request->perihal,
            'tertanda' => $request->tertanda,
            'keterangan' => $request->keterangan,
            'dokumen' => $dokumen
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // return view('surat::buatsurat.suratkeluar.print', [
        //     'title' => 'Cetak Surat',
        //     'suratkeluar' => Suratkeluar::find($id)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $suratkeluar = Suratkeluar::find($id);
        return view('surat::buatsurat.suratkeluar.editarsip', compact('suratkeluar'));
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
            'nomor_surat' => 'required',
            'tanggal_buat' => 'required',
            'tertanda' => 'required',
            'perihal' => 'required',
            'keterangan' => 'required',
            'dokumen' => '',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratkeluar');
        }
        $input = $validatedData;
        Suratkeluar::where('id', $id)->update($input);

        return redirect('/surat/suratkeluar')->with('success', 'Data berhasil diupdate!');
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
