<?php

$this->addCSS([
    $this->baseURL('resources/bower/bootstrap/dist/css/bootstrap.min.css'),
    $this->baseURL('resources/bower/bootstrap/dist/css/bootstrap-theme.min.css'),
    $this->baseURL('resources/css/stylesheet.css')
]);

$this->addJS([
    $this->baseURL('resources/bower/jquery/dist/jquery.min.js'),
    $this->baseURL('resources/bower/bootstrap/dist/js/bootstrap.min.js')
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
                <img src="<?=$this->baseURL('resources/img/logo.jpeg');?>" alt="ZEWA Framework" />
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
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/example/home/batman">Batman</a>
                        </li>
                        <li>
                            <a href="/batman">Batman via Route</a>
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