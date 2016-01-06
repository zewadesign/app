<?php

$this->addCSS([
    'resources/bootstrap/dist/css/bootstrap.min.css',
    'resources/bootstrap/dist/css/bootstrap-theme.min.css'
]);

$this->addJS([
    'resources/jquery/dist/jquery.min.js',
    'resources/bootstrap/dist/js/bootstrap.min.js'
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ZEWA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=100">

    <?=$this->fetchCSS();?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- fav -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>

<body>
<div class="container">

    <div class="jumbotron">
        <h1>404</h1>
        <p>
            <?php if(isset($errorMessage)) {
                echo $errorMessage;
            } ?>
        </p>
    </div>

</div>



<?=$this->fetchJS();?>

</body>
</html>