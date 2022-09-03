@include('surat::layouts.head')
<style>
    .p {
        font-family: 'Times New Roman';
        font-size: 12px;
    }
</style>
@php
$hari = Carbon\Carbon::now();
$surat = Modules\Surat\Entities\Surattgskk::select()
    ->where('id', $surattgskk->id)
    ->get()
    ->first();
$bulan = Carbon\Carbon::parse($surat->tgl_surattgskk)->format('m');
$tahun = Carbon\Carbon::parse($surat->tgl_surattgskk)->format('Y');
$tanggal = Carbon\Carbon::parse($surat->tgl_surattgskk)->translatedFormat('d F Y');
$waktupelaksanaan = Carbon\Carbon::parse($surat->waktupelaksanaan)->translatedFormat('d F Y');
$array_bln = [
    '01' => 'I',
    '02' => 'II',
    '03' => 'III',
    '04' => 'IV',
    '05' => 'V',
    '06' => 'VI',
    '07' => 'VII',
    '08' => 'VIII',
    '09' => 'IX',
    '10' => 'X',
    '11' => 'XI',
    '12' => 'XII',
];
$bln = $array_bln[$bulan];
$nosurat = sprintf('%03d', $surattgskk->no_surattgskk);
@endphp

<body onload="window.print()">

    <table>
        <thead>
            <tr>
                <td>
                    <img class="mt-0" src="{{ asset('storage/kop_surat/Kop_sayaga.png') }}" width="100%"
                        alt="PT Sayaga Wisata Bogor">
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <br>
                    <div class="col-lg-10 px-3">
                        <center>
                            <h1 style="font-size:16pt; font-family:'Times New Roman'; color:black;"><b><u>SURAT DINAS
                                        KELUAR KANTOR</u></b>
                            </h1>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman';">
                                <b><u>SDKK No.
                                        {{ $nosurat }}/A/SWB-SDKK/{{ $bln }}/{{ $tahun }}</u></b>
                            </p>
                        </center>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Diperintahkan
                                Kepada</b></p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Nama/NIP&emsp;: </b>
                        </p>
                        <font size="3" face="Times">{!! $surattgskk->kepada !!}</font>

                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Untuk : </b></p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">
                            {{ $surattgskk->untuk }}</p>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Waktu Pelaksanaan
                                :</b>
                            {{ $waktupelaksanaan }}
                        </p>
                        <br>

                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">Catatan :
                        </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">1. Melaksanakan
                            Perintah ini dengan seksama dan penuh rasa tanggung
                            jawab.</p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">2. Sebelum dan sesudah
                            melaksanakan Perintah ini, agar melapor kepada
                            Direktur Umum & Keuangan. </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">3. Pembebanan biaya
                            ini sesuai dengan surat keputusan direksi </p>

                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            Dikeluarkan di :
                            Cibinong </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            {{ $tanggal }} </p>
                        <hr style=" float:right; width: 35%; border-top: 1px solid black; opacity: 0.5;">
                        <br>
                        <br>
                        <p
                            style="font-size:12pt;
                            font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <b>{{ $surattgskk->tertanda }}</b>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <b>
                                <font size="3" face="Times" style="align:right; line-height:1.2">
                                    {!! $surattgskk->nama !!}</font>
                            </b>
                        </p><br>
                        </p>
                        <br>
                        {{-- <img src="{{ asset('storage/' . $suratmasuk->dokumen) }}" height="30%" width="10%" alt=""> --}}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>


<script type="text/javascript">
    window.print();
</script>
