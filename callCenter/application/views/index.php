<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<?php
$this->load->view('head.php');
?>
<body>
<div class="container" style="">

    <div class="masthead">
        <ul class="nav nav-pills pull-right">
            <li class="inactive" class=""><a href="<?=base_url()?>">Home</a></li>
            <li><a href="<?=base_url()?>index.php/main/account">Accounts</a></li>
        </ul>
        <h3 class="muted">IntelBANK callCenter Application</h3>
    </div>

    <?php
    $this->load->view($center);
    ?>
    <hr>
    <?php
    $this->load->view('footer');
    ?>
    <!-- /container -->
</body>
</html>