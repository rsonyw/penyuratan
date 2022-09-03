@include('surat::layouts.head')
{{-- <style>
    .p {
        font-family: 'Times New Roman';
        font-size: 12px;
    }
</style> --}}
@php
$hari = Carbon\Carbon::now();
$surat = Modules\Surat\Entities\Suratkeluar::select()
    ->where('id', $suratkeluar->id)
    ->get()
    ->first();
$bulan = Carbon\Carbon::parse($surat->tanggal_buat)->format('m');
$tahun = Carbon\Carbon::parse($surat->tanggal_buat)->format('Y');
$tanggal = Carbon\Carbon::parse($surat->tanggal_buat)->translatedFormat('d F Y');

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
$nosurat = sprintf('%03d', $suratkeluar->nomor_surat);
@endphp

<body onload="window.print()">

    {{-- <div class="logoprint">
        <h3 style="font-family:'Times New Roman'; line-height:1"><b>
                <center>&nbsp;
                    PT. SAYAGA WISATA BOGOR</center>
            </b></h3>

        <p style="font-family:'Times New Roman'; line-height:1">
            <center>Jalan Tegar Beriman, RT/RW 02/09, Tengah, Cibinong Bogor Jawa Baratt</center>
        </p>
        <p style="font-family:'Times New Roman'; line-height:1">
            <center>contact@sayagawisatabogor.com</center>
        </p>
        <p style="font-family:'Times New Roman'; line-height:1">
            <center>(021) 83711243</center>
        </p>
    </div> --}}
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

                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">Bogor,
                            {{ $tanggal }} </p>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">Nomor&emsp;&emsp;:
                            {{ $nosurat }}/B/SWB/{{ $bln }}/{{ $tahun }} </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">
                            Sifat&emsp;&emsp;&emsp;:
                            {{ $suratkeluar->sifat }} </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:0.5">Lampiran&emsp;:
                            {{ $suratkeluar->lampiran }} </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">Perihal&emsp;&emsp;:
                            <b><u>{{ $suratkeluar->perihal }}
                                </u></b>
                        </p>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">Kepada Yth.,
                            <br>
                            <b>{{ $suratkeluar->penerima }}</b><br>
                            di<br>
                            <b><u>TEMPAT</u></b>
                        </p>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">
                            <font size="3" face="Times">{!! $suratkeluar->isi !!}</font>
                        </p>

                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1.2">Hormat kami,
                            <br>
                            <b>{{ $suratkeluar->tertanda }}</b><br>
                            <br>
                            <br><br>
                            <br>
                            <b><u>{{ $suratkeluar->tertanda2 }}</u></b><br>
                            {{ $suratkeluar->jabatan }}
                        </p>
                        <br>
                        <p style="font-size:12pt; font-family:'Times New Roman'; line-height:1">Tembusan kepada Yth.:
                            <font size="3" face="Times">{!! $suratkeluar->tembusan !!}</font>
                        </p>
                </td>
            </tr>
        </tbody>
    </table>

    {{-- <img src="{{ asset('storage/' . $suratmasuk->dokumen) }}" height="30%" width="10%" alt=""> --}}

</body>


<script type="text/javascript">
    window.print();
</script>
