<?php

$this->addCSS([
    'resources/bower/bootstrap/dist/css/bootstrap.min.css',
    'resources/bower/bootstrap/dist/css/bootstrap-theme.min.css',
    'resources/bower/font-awesome/css/font-awesome.min.css',
    'resources/css/stylesheet.css'
]);

$this->addJS([
    'resources/bower/jquery/dist/jquery.min.js',
    'resources/bower/bootstrap/dist/js/bootstrap.min.js'
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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- fav -->
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-2 col-sm-2 hidden-xs nopadding">
            <div id="brand-logo">
                <img src="<?=$this->baseURL('resources/img/logo.png');?>" alt="All Digital Rewards" />
            </div>
        </div>
        <div class="col-md-10 col-sm-10 nopadding">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"> <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" href="#"><img src="<?=$this->baseURL('resources/img/logo.png');?>" alt="All Digital Rewards" /></a>

                </div>

                <div class="higher-nav hidden-xs">
                    <div>
                        <span>
                            <i class="fa fa-fw fa-phone blue-text"></i> 555-555-555
                        </span>
                        <span>
                            <i class="fa fa-fw fa-envelope blue-text"></i> support@alldigitalrewards.com
                        </span>
                    </div>
                </div>
                <br /><br />
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">My Account</a>
                        </li>
                        <li>
                            <a href="#">FAQ's</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?= $this->view; ?>
    </div>
</div>



<?=$this->fetchJS();?>

</body>
</html>