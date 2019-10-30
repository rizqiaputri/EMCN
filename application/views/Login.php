<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>EMCN</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/') ?>/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('assets/') ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo base_url()."index.php/LoginController" ?>" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Submit</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
            <?php 
              $valid = validation_errors();
              if(!empty($valid))
              {
              ?>
              <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-red">
                <div class="panel-heading">
                  Pesan Error
                </div>
                <div class="panel-body">
                  <p><?php echo $valid; ?></p>
                </div>
                </div>
              <?php
              }
              ?>
              <?php 
              $info = $this->session->flashdata('info');
              if(!empty($info))
              {
              ?>
                <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-red">
                <div class="panel-heading">
                  Pesan Error
                </div>
                <div class="panel-body">
                  <p><?php echo $this->session->flashdata('info'); ?></p>
                </div>
                </div>
              <?php
              }
              ?>
        </div>

        <!-- jQuery -->
        <script src="<?php echo base_url('assets/') ?>/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url('assets/') ?>/js/startmin.js"></script>

    </body>
</html>
