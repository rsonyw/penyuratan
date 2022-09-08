@include('surat::layouts.head')
<style>
    .p {
        font-family: 'Times New Roman';
        font-size: 12px;
    }
</style>
@php
$hari = Carbon\Carbon::now();
$surat = Modules\Surat\Entities\Suratedaran::select()
    ->where('id', $suratedaran->id)
    ->get()
    ->first();
$bulan = Carbon\Carbon::parse($surat->tgl_suratedaran)->format('m');
$tahun = Carbon\Carbon::parse($surat->tgl_suratedaran)->format('Y');
$tanggal = Carbon\Carbon::parse($surat->tgl_suratedaran)->translatedFormat('d F Y');
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
$nosurat = sprintf('%03d', $suratedaran->no_suratedaran);
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
                                        EDARAN</u></b>
                            </h1>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman';">
                                <b><u>{{ $nosurat }}/A/SWB-EDR/{{ $bln }}/{{ $tahun }}</u></b>
                            </p>
                        </center>
                        <br>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">Tentang</p>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">
                                {{ $suratedaran->tentang }} </p>
                        </center>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">
                            <font size="3" face="Times">{!! $suratedaran->isi !!}</font>
                        </p>

                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">Cibinong,
                            {{ $tanggal }}
                            <br>
                            <b>{{ $suratedaran->instansi }}</b><br>
                            <br>
                            <br>
                            <br>
                            <b><u>{{ $suratedaran->nama }}</u></b><br>
                            {{ $suratedaran->jabatan }}
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
