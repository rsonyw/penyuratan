<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Suratkeluar;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Carbon as SupportCarbon;

class PrintsuratController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        return view('surat::buatsurat.suratkeluar.print', [
            'suratkeluar' => Suratkeluar::select()->where('id', request('id'))->get()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // Carbon::parse(strtotime('tanggal_buat'))->format('Y')
        // return $terbaru->tanggal_buat;
        // $tanggal = strtotime($terbaru->tanggal_buat);
        // return $cek->format('Y');

        $terbaru = Suratkeluar::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tanggal_buat);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->nomor_surat + 1;
        }

        $nomor_surat = $no . '/B/SWB/' . $cek->format('m') . '/' . $cek->format('Y');

        // return $nomor_surat;

        $query = Suratkeluar::select()->whereYear('tanggal_buat', Carbon::now()->format('Y'))->get()->first();
        // return $query;
        return view('surat::buatsurat.suratkeluar.create', [
            'nomor_surat' => $nomor_surat,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $terbaru->tanggal_buat;
        // $tanggal = strtotime($terbaru->tanggal_buat);

        // return $cek->format('Y');
        $terbaru = Suratkeluar::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tanggal_buat);

        // $array_bln = [
        //     '01' => 'I',
        //     '02' => 'II',
        //     '03' => 'III',
        //     '04' => 'IV',
        //     '05' => 'V',
        //     '06' => 'VI',
        //     '07' => 'VII',
        //     '08' => 'VIII',
        //     '09' => 'IX',
        //     '10' => 'X',
        //     '11' => 'XI',
        //     '12' => 'XII',
        // ];
        // $bln = $array_bln[$cek];

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->nomor_surat + 1;
        }

        Suratkeluar::create([
            'user_id' => $request->user_id,
            'tanggal_buat' => $request->tanggal_buat,
            'sifat' => $request->sifat,
            'nomor_surat' => str_replace("/B/SWB/" . $cek->format('m') . "/" . $cek->format('Y'), "", $request->nomor_surat),
            'lampiran' => $request->lampiran,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'isi' => $request->isi,
            'tertanda' => $request->tertanda,
            'tertanda2' => $request->tertanda2,
            'jabatan' => $request->jabatan,
            'tembusan' => $request->tembusan,
            'keterangan' => $request->keterangan,
            'dokumen' => $request->dokumen
        ]);


        return redirect()->action([SuratkeluarController::class, 'index'])->with('success', 'Surat Berhasil Dibuat, Silahkan Cetak Surat!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('surat::buatsurat.suratkeluar.print', [
            'suratkeluar' => Suratkeluar::select()->where('id', $id)->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $suratkeluar = Suratkeluar::find($id);
        return view('surat::buatsurat.suratkeluar.edit', compact('suratkeluar'));
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
            'user_id' => 'required',
            'tanggal_buat' => 'required',
            'sifat' => 'required',
            'nomor_surat' => 'required',
            'lampiran' => 'required',
            'perihal' => 'required',
            'penerima' => 'required',
            'isi' => 'required',
            'tertanda' => 'required',
            'tertanda2' => 'required',
            'jabatan' => 'required',
            'tembusan' => 'required',
            'keterangan' => 'required'

        ];

        $validatedData = $request->validate($rules);

        $input = $validatedData;
        Suratkeluar::where('id', $id)->update($input);

        return redirect('/surat/suratkeluar')->with('success', 'Data berhasil diupdate');
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
