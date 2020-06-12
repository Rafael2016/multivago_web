<?php

defined('BASEPATH') or exit('No direct script access allowed');

## HOST
$HTTP_HOST = base_url();

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Multívago</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= $HTTP_HOST ?>public/midia/faIcone.png">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://bootswatch.com/4/litera/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$HTTP_HOST?>public/library/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$HTTP_HOST?>/public/css/<?=$css?>">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">

    <script type="text/javascript">
    	const HTTP_HOST = "<?= $HTTP_HOST?>"
    </script>
</head>
