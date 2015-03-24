<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.:: <?php echo ucwords(strtolower(TITLE_APP));?> ::.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script type="text/javascript">
            window.print();
        </script>
        <style type="text/css">
        body{
            width: 780px;
            margin: auto;
            font-size: 13px;
        }
        .title{
            font-size: 24px;
            font-weight: bold;
        }
        .subtitle{
            font-size: 16px;
        }
        </style>
    </head>
    <body>
        <center>
            <div class="title"><?=$profil->nama?></div>
            <div><i><?=$profil->alamat?></i></div>
            <div><i><?=$profil->telp .' / '. $profil->website?></i></div>
        </center>
        <br />
        <b class="subtitle"><?=$title?></b>
        <br />
        <label style="position:relative;float:right">Tanggal Cetak : <?=$tanggal?></label>
        <?=isset($content)?$content:"";?>
    </body>
</html>