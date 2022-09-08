<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Surat\Entities\Suratedaran;
use Illuminate\Contracts\Support\Renderable;

class SuratedaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $terbaru = Suratedaran::select()->latest()->first();
        $cek = Carbon::parse($terbaru->tgl_suratedaran);

        if ($cek->format('Y') != Carbon::now()->format('Y')) {
            $no = 1;
        } elseif ($cek->format('Y') == Carbon::now()->format('Y')) {
            $no = $terbaru->no_suratedaran + 1;
        }

        $no_suratedaran = $no . '/A/SWB-EDR/' . $cek->format('m') . '/' . $cek->format('Y');

        return view('surat::buatsurat.suratedaran.index', [
            'suratedarans' => Suratedaran::all(),
            'no_suratedaran' => $no_suratedaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // return view('surat::buatsurat.suratedaran.create');
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
            $no = $terbaru->n_suratedaran + 1;
        }

        $dokumen = $request->file('dokumen')->store('dok_suratedaran');
        if ($request->file('dokumen')) {
            $dokumen;
        }

        Suratedaran::create([
            'no_suratedaran' => str_replace("/A/SWB-EDR/" . $cek->format('m') . "/" . $cek->format('Y'), "", $request->no_suratedaran),
            'tgl_suratedaran' => $request->tgl_suratedaran,
            'perihal' => $request->perihal,
            'instansi' => $request->instansi,
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
        return view('surat::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $suratedaran = Suratedaran::find($id);
        return view('surat::buatsurat.suratedaran.editarsip', compact('suratedaran'));
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
            'tgl_suratedaran' => 'required',
            'perihal' => 'required',
            'instansi' => 'required',
            'keterangan' => 'required',
            'dokumen' => '',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            if ($request->oldDokumen) {
                Storage::delete($request->oldDokumen);
            }
            $validatedData['dokumen'] = $request->file('dokumen')->store('dok_suratedaran');
        }
        $input = $validatedData;
        Suratedaran::where('id', $id)->update($input);

        return redirect('/surat/suratedaran')->with('success', 'Data berhasil diupdate!');
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
