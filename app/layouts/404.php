<?php include('includes/header.php'); ?>
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
<?php include('includes/footer.php'); ?>
