<?php

namespace Modules\Surat\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Surat\Entities\Suratkeluar;
use Illuminate\Contracts\Support\Renderable;

class SuratkosongController extends Controller
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
        return view('surat::buatsurat.suratkosong.index', [
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
        return view('surat::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('surat::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
