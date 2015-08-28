<?php
    $prof = $this->auth->profil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="oenlez, ooh enak lezat">
    <meta name="author" content="Taufik Ute Alfan">
    <meta name="keywords" content="snack,enak,lezat,oh">
    <title>.:: <?=$prof->nama?> ::.</title>
    <link href="<?=base_url('asset/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/price-range.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/main.css" rel="stylesheet">
    <link href="<?=base_url()?>asset/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?=base_url()?>asset/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>asset/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>asset/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url()?>asset/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->