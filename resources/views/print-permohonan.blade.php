<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Halaman Print A4</title>
</head>
<style type="text/css">

    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }



    @page {
        size: A4;
        margin 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }

</style>
<body>
    <table border=1>
        <thead>
            <tr>
                <td  style=" border-collapse:collapse;" width=25%><img style="  display: block;
                    margin-left: auto;
                    margin-right: auto;
                    margin:5px auto;" src="{{asset('images\R.png')}}" width=100px;></td>
                <td width=750%><h1 style="text-align: center;">PERMOHONAN ANALISIS</h1></td>
            </tr>
        </thead>
    </table>

    <table border=0>
        <tbody>
            <tr>
                <td colspan=6 height="40" style="text-align: center;">
                    <b style="padding:10px;"> NOMOR : {{ $data->no_spk }}</b>
                </td>
            </tr>
            <tr>
                <td colspan=6 style="margin-top:30px">Kepada Yth.<br>
                    Kepala Balai BPSIP Kaltim
                </td>
            </tr>
            <tr>
                <td colspan=6 style="margin-top=40px;" colspan="3">Dengan hormat,<br>
                    Untuk memperoleh Laporan Hasil Pengujian (Test Report) maka bersama ini kami mengajukan permohonan pengujian sampel / contoh, sebagai berikut :
                </td>
            </tr>
            <tr>
                <td width=30%>Nomor SPK</td>
                <td width=1>:</td>
                <td colspan=6>{{ $data->no_spk }}</td>
            </tr>
            <tr>
                <td>Contoh</td>
                <td>:</td>
                <td colspan=6></td>
            </tr>
            <tr>
                <td>Nama Pemohon</td>
                <td>:</td>
                <td colspan=6>{{ $data->dataUser->name }}</td>
            </tr>
            <tr>
                <td>Alamat Pemohon</td>
                <td>:</td>
                <td colspan=6>{{  $data->dataUser->userPemohons->alamat}},
                        Kel/Desa {{ $data->dataUser->userPemohons->kelurahan->namaKelurahan }},
                        Kec. {{ $data->dataUser->userPemohons->kelurahan->kecamatan->namaKecamatan }}
                        Kab/Kota. {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->namaKota }}
                        Provinsi. {{ $data->dataUser->userPemohons->kelurahan->kecamatan->kota->provinsi->namaProvinsi }}

                </td>
            </tr>
            <tr>
                <td style="padding-top:-200px;">Identitas Contoh</td>
                <td >:</td>
                <td width="110">Jumlah Contoh</td>
                <td width=5% style="text-align:center">:</td>
                <td>{{ $data->jumContoh }}</td>
            </tr>

            <tr>
                <td style="padding-top:-200px;"></td>
                <td></td>
                <td width="110">Jenis Contoh</td>
                <td>:</td>
                <td>{{ $data->jenisContoh }}</td>
            </tr>

            <tr>
                <td style="padding-top:-200px;"></td>
                <td></td>
                <td width="110">Berat Contoh</td>
                <td>:</td>
                <td>{{ $data->beratContoh }}</td>
            </tr>

            <tr>
                <td style="padding-top:-200px;"></td>
                <td></td>
                <td width="110">Kondisi Contoh</td>
                <td>:</td>
                <td>{{ $data->kondisiContoh }}</td>
            </tr>

            <tr>
                <td style="padding-top:-200px;"></td>
                <td></td>
                <td width="110">Bentuk Contoh</td>
                <td>:</td>
                <td>{{ $data->bentukContoh }}</td>
            </tr>

            <tr>
                <td style="padding-top:-200px;"></td>
                <td></td>
                <td width="110">Jenis Kemasan</td>
                <td>:</td>
                <td>{{ $data->jenisKemasan }}</td>
            </tr>
            <tr>
                <td>Tanggal Pengujian</td>
                <td>:</td>
                <td colspan="3">{{Carbon\Carbon::parse($data->tanggal)->isoFormat('D MMMM Y')}}</td>
            </tr>
        </tbody>
    </table>
    <table border=1 width="100%" style="border:1px solid black; margin-top:30px;">
        <thead style="border:1px solid black; margin-top:30px;">
            <tr>
                <th>No.</th>
                <th>Kode Contoh/Sampel<br>(Customer)</th>
                <th>Kode Lab</th>
                <th>Parameter Uji</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>01</td>
                <td>01</td>
                <td>01</td>
                <td>01</td>
            </tr>
        </tbody>
    </table>

    <table width=100% style="margin-top:30px;">
        <tr>
            <td colspan=2>Demikian surat permohonan ini kami buat, atas perhatian dan kerjasamanya diucapkan terima kasih.</td>
        </tr>
        <tr>
            <td width=50% style="text-align: center"> Penanggung Jawab Administrasi</td>
            <td colspan=2 height=100px style="margin-top:100px; text-align:center;">Samarinda, {{Carbon\Carbon::parse($data->tanggal)->isoFormat('D MMMM Y')}}<br>
            Pemohon
            </td>
        </tr>
        <tr>
            <td height=50></td>
        </tr>
        <tr style="margin-top:100px; text-align:center;" >
            <td width=50%>(Nur Rizqi Bariroh, S.Pt., M.Sc., Ph.D)<br>NIP.197104041998032001</td>
            <td>( {{ $data->dataUser->name  }} )</td>
        </tr>
    </table>

</body>
</html>
<script type="text/javascript">window.print();</script>
