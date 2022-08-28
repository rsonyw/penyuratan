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
$nosurat = sprintf('%03d', $surat->no_suratedaran);
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
                            <h1 style="font-size:16pt; font-family:'Times New Roman'; color:black;"><b><u>Surat
                                        Edaran</u></b>
                            </h1>
                        </center>
                        <center>
                            <p style="font-size:12pt; font-family:'Times New Roman';">
                                <b><u>{{ $nosurat }}/A/SWB/{{ $bulan }}/{{ $tahun }}</u></b>
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
