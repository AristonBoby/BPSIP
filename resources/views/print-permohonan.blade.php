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
                <td colspan=2 height="40" style="text-align: center;">
                    <b style="padding:10px;"> NOMOR : </b>
                </td>
            </tr>
            <tr>
                <td style="margin-top:30px">Kepada Yth.<br>
                    Kepala Balai BPSIP Kaltim
                </td>
            </tr>
            <tr>
                <td style="margin-top=40px;" colspan="3">Dengan hormat,<br>
                    Untuk memperoleh Laporan Hasil Pengujian (Test Report) maka bersama ini kami mengajukan permohonan pengujian sampel / contoh, sebagai berikut :
                </td>
            </tr>
            <tr>
                <td width=30%>Nomor SPK</td>
                <td width=1%>:</td>
                <td >:</td>
            </tr>
            <tr>
                <td>Contoh</td>
                <td>:</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Nama Pemohon</td>
                <td>:</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Alamat Pemohon</td>
                <td>:</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Identitas Contoh</td>
                <td>:</td>
                <td>
                    <table width="100%" style="margin-top:40px;">
                        <thead>
                            <tr>
                                <td width="25%">Jumlah Contoh</td>
                                <td width="1%">:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Jenis Contoh</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Berat Contoh</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Kondisi Contoh</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Bentuk Contoh</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Konsidi Kemasan</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td>Jenis Kemasan</td>
                                <td>:</td>
                                <td>:</td>
                            </tr>
                        </thead>

                    </table>
                </td>
            </tr>
            <tr>
                <td>Tanggal Pengujian</td>
                <td>:</td>
                <td></td>
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

</body>
</html>
<script type="text/javascript">window.print();</script>
