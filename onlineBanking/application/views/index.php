<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('header'); ?>
<body>
<div class="container-fluid" style="">
    <div class="masthead">
        <script type="text/javascript">
        var customerId = '<?=$this->session->userdata("customerID")?>';
        var customerNumber = '<?=$this->session->userdata("customerNumber")?>';
        function openOnlineSupport()
        {
            window.open("<?= base_url()?>index.php/support/live/"+customerId+"/"+customerNumber,"mywindow","menubar=1,resizable=1,width=550,height=450");
        }
        </script>
        <ul class="nav nav-pills pull-right">
            <li><a href="#" class="text-warning" onclick="openOnlineSupport();">Online Support</a></li>
        </ul>
        <h3 class="muted">IntelRAD Banking Application</h3>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3 well" style="">
                <ul class="nav nav-list">
                    <li class="nav-header">my Area</li>
                    <ul>
                        <li><a href="<?= base_url()?>index.php/main/account"> My Accounts</a></li>
                        
                    </ul>
                    <li class="divider"></li>
                    <li class="nav-header">money transfers</li>
                    <ul>
                        <li><a href="<?= base_url()?>index.php/money"> Money Transfer</a></li>
                    </ul>
                    <li class="divider"></li>
                    <li class="nav-header">payment area</li>
                    <ul>
                        <li><a href="<?= base_url()?>index.php/company">Company</a></li>
                    </ul>
                    <li class="divider"></li>
                    <li class="nav-header">log out</li>
                    <ul>
                        <li><a href="<?= base_url()?>index.php/main/logout">Secure Logout</a> </li>
                    </ul>
                </ul>
            </div>
            <!--Body content-->
            <?php $this->load->view($center);?>
        </div>
    </div>
    <hr>
    <?php $this->load->view('footer');?>
    <!-- /container -->
</body>
</html>