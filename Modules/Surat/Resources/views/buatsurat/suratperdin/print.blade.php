@include('surat::layouts.head')
<style>
    .p {
        font-family: 'Times New Roman';
        font-size: 12px;
    }

    .li {
        font-size: 12pt;
        font-family: 'Times New Roman';
        line-height: 1;
    }
</style>
@php
$hari = Carbon\Carbon::now();
$surat = Modules\Surat\Entities\Suratperdin::select()
    ->where('id', $suratperdin->id)
    ->get()
    ->first();
$bulan = Carbon\Carbon::parse($surat->tgl_suratperdin)->format('m');
$tahun = Carbon\Carbon::parse($surat->tgl_suratperdin)->format('Y');
$tanggal = Carbon\Carbon::parse($surat->tgl_suratperdin)->translatedFormat('d F Y');
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
$nosurat = sprintf('%03d', $suratperdin->no_suratperdin);
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
                            <h1 style="font-size:16pt; font-family:'Times New Roman'; color:black;"><b><u>SURAT
                                        PERINTAH DINAS</u></b>
                            </h1>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman';">
                                <b><u>SPD
                                        No.{{ $nosurat }}/A/SWB-SPD/{{ $bln }}/{{ $tahun }}</u></b>
                            </p>
                        </center>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Diperintahkan
                                Kepada</b></p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Nama/NIP&emsp;: </b>
                        <ol>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->nama }}
                            </li>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->pengikut1 }}
                            </li>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->pengikut2 }}
                            </li>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->pengikut3 }}
                            </li>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->pengikut4 }}
                            </li>
                            <li style="font-size:12pt; font-family:'Times New Roman'; line-height:1">
                                {{ $suratperdin->pengikut5 }}
                            </li>
                        </ol>
                        </p>

                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Untuk : </b>
                            {{ $suratperdin->untuk }}</p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Waktu Pelaksanaan
                                :</b> {{ $suratperdin->waktu }}
                        </p>

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
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2"><b>Pengesahan
                                Tujuan : </b></p>
                        <br>
                        <br>

                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            Dikeluarkan di :
                            Cibinong </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <u> Tanggal : {{ $tanggal }} <u />
                        </p>

                        <p
                            style="font-size:12pt;
                            font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <b>{{ $suratperdin->tertanda }}</b>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <b>
                                <font size="3" face="Times" style="align:right; line-height:1.2">
                                    <u> {!! $suratperdin->nama !!}</u>
                                </font>
                            </b>
                        </p><br>
                        </p>
                        <br>
                        {{-- <img src="{{ asset('storage/' . $suratmasuk->dokumen) }}" height="30%" width="10%" alt=""> --}}
                    </div>
                </td>
            </tr>


            <tr>
                <td>
                    <br>
                    <div class="col-lg-10 px-3">
                        <center>
                            <h1 style="font-size:16pt; font-family:'Times New Roman'; color:black;"><b><u>UANG
                                        PERJALANAN DINAS</u></b>
                            </h1>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman';">
                                <b><u>SPD
                                        No.{{ $nosurat }}/A/SWB-SPD/{{ $bln }}/{{ $tahun }}</u></b>
                            </p>
                        </center>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Diperintahkan
                                Kepada</b></p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Nama/NIP&emsp;:
                            </b>
                        </p>
                        <font size="3" face="Times">{!! $suratperdin->kepada !!}</font>

                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Untuk : </b></p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">
                            {{ $suratperdin->untuk }}</p>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5"><b>Waktu Pelaksanaan
                                :</b>
                            {{-- {{ $waktupelaksanaan }} --}}
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
                            <b>{{ $suratperdin->tertanda }}</b>
                        </p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; text-align:right; line-height:1.2">
                            <b>
                                <font size="3" face="Times" style="align:right; line-height:1.2">
                                    {!! $suratperdin->nama !!}</font>
                            </b>
                        </p><br>
                        </p>
                        <br>
                        {{-- <img src="{{ asset('storage/' . $suratmasuk->dokumen) }}" height="30%" width="10%" alt=""> --}}
                    </div>
                </td>s
            </tr>
        </tbody>
    </table>
</body>


<script type="text/javascript">
    window.print();
</script>
