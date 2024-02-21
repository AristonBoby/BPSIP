<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Halaman Print A4</title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
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
table, td, tr {
  border: 1px solid;
}

</style>
<body>
    <table >
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



                Masukan properti datanya disini
</body>
</html>
<script type="text/javascript">window.print();</script>
