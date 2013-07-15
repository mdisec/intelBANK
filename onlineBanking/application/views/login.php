<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IntelRAD Banking Application</title>
    <link href="<?= base_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>css/bootstrap-responsive.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/gen_validatorv4.js"></script>


    <style type="text/css">

        body {
            padding-top: 100px;
            padding-bottom: 40px;
        }

            /* Custom container */
        .container-narrow {
            margin: 0 auto;
            max-width: 700px;
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

            /* Main marketing message and sign up button */
        .jumbotron {
            margin: 60px 0;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 72px;
            line-height: 1;
        }
        .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
        }

            /* Supporting marketing content */
        .marketing {
            margin: 60px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }

    </style>
</head>
<body>

<div class="container-narrow" style="max-width: 700px;">

    <div class="masthead">
        <ul class="nav nav-pills pull-right">
            <li class="inactive" class=""><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">IntelRAD Banking Application</h3>
    </div>
    <hr>
    <div class="row">
        <div class="span4">
            <div class="well">
                <legend>Sign in</legend>
                <form  id="login" method="POST" action="<?= base_url()?>index.php/login/attempt" accept-charset="UTF-8">
                    <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
                    <?php if(@$loginError){?>
                    <div class="alert alert-error">
                         <a class="close" data-dismiss="alert" href="#">x</a>Incorrect Customer Number or Password!
                    </div>
                    <?php } ?>
                    <input class="span3" placeholder="Customer Number" type="text" name="customerNumber">
                    <input class="span3" placeholder="Password" type="password" name="password">

                    <button class="btn-info btn" type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="span3">
            <div class="well">
                BANKACILIK BİZİM İŞİMİZ
                <br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>
    <hr>
    <div class="footer">
        <div class="row">
            <div class="span4">
                <small>IntelRAD Banking &copy; Company 2013</small>
            </div>
            <div class="span3" style="text-align: right;">
                <small>Page rendered in <strong>0.0133</strong> seconds</small>
            </div>
        </div>
    </div> <!-- /container -->
    <script type="text/javascript">
        var frmvalidator = new Validator("login");
        frmvalidator.addValidation("password","req");
        frmvalidator.addValidation("password","maxlen=10");
        frmvalidator.addValidation("password","numeric");
        frmvalidator.addValidation("customerNumber","req");
        frmvalidator.addValidation("customerNumber","maxlen=10");
        frmvalidator.addValidation("customerNumber","numeric");
    </script>
</body>
</html>