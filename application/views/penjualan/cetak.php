<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>.:: <?php echo ucwords(strtolower(TITLE_APP));?> ::.</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='cetak'>
    <style type="text/css">
        body{
            font-size: 12px;
            font-family: Times New Roman;
            margin: auto;
            width: 300px;
        }
        html{
            margin: auto;
            padding: 10px
        }
    </style>
    <script type="text/javascript">
        window.print();
    </script>
</head>
<body style="border:1px dotted gray;padding:2px">
<?php
    $pj = $penjualan->row();
?>
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="3" align="center">
                <b style="font-size:16px;"><?=strtoupper($profil->nama)?></b>
                <br />
                <i><?=$profil->alamat?></i>
                <br />
                <i><?=$profil->telp .' / '.$profil->website?></i>
                <hr />
            </td>
        </tr>
        <tr>
            <td width="100">No Transaksi</td>
            <td> : <?=$pj->no_trx?></td>
            <td align="right"><?=dateToIndo($pj->tanggal)?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td colspan="2" align="right"><b>Rp<?=numIndoNull($pj->total,0)?></b></td>
        </tr>
    </table>
    <hr />
    <table width="100%" rules="all" border="1" cellpadding="2" cellspacing="2">
        <tr>
            <th>Item</th>
            <th>Sub Total</th>
        </tr>
        <?php foreach($penjualan_detail->result_array() as $r){ ?>
        <tr>
            <td>
                <?=$r['kode_barang'];?> / <?=$r['nama_barang'];?> @<?=numIndoNull($r['harga'],0)?> / 
                <?=$r['qty']?>pc
            </td>
            <td style="text-align:right">
                <?php
                    $sub_total = $r['harga']*$r['qty'];
                ?>
                Rp<?=numIndoNull($sub_total,0)?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td><b>Total</b></td>
            <td style="text-align:right;font-weight:bold">Rp<?=numIndoNull($pj->total,0)?></td>
        </tr>
        <tr>
            <td><b>Bayar</b></td>
            <td style="text-align:right;font-weight:bold">Rp<?=numIndoNull($pj->bayar,0)?></td>
        </tr>
        <tr>
            <td><b>Kembali</b></td>
            <td style="text-align:right;font-weight:bold">Rp<?=numIndoNull($pj->kembali,0)?></td>
        </tr>
    </table>
    <br />
    <label>
        <center>Terimakasih . . .</center>
        &nbsp;&nbsp;&nbsp;Barang yang sudah di beli tidak dapat dikembalikan lagi
    </label>
</body>
</html>