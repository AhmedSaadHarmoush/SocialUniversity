<html>
<head>
        <title> Usci - <?php echo $_SESSION['user_data']['username'];?></title>
        <link rel="shortcut icon" href="<?= base_url()?>img/logo.png">
        <script src="<?php echo base_url();?>js/jquery.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
        <script src="<?php echo base_url();?>js/script.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
        
    </head>
<body>
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/logo.png" style="width:52px;"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="loginform">
        <div>
            
        </div>
        
    </div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

    <div class="container">
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->



</body>
</html>