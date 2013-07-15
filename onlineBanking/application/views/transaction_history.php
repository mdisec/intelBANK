<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span9 well">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Select</th>
            <th>Src Account Number</th>
            <th>Dest Account Number</th>
            <th>Amount</th>
            <th>Transfer Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!@$permissionError)
        {
        foreach($transactionData as $value)
        {
            if($value->source_id == $account_id)
            {
        ?>
                <tr class="error">
                    <td class="span1 "><a href="<?= base_url()?>index.php/operation/transaction_detail/<?=$value->id?>"><i class="icon-forward"></i></a></td>

        <?    } else { ?>
                <tr class="success">
                    <td class="span1 "><a href="<?= base_url()?>index.php/operation/transaction_detail/<?=$value->id?>"><i class="icon-backward"></i></a></td>
        <?      }      ?>

                    <td class="span3"><?= $value->source_number ?></td>
                    <td class="span3"><?= $value->destination_number ?></td>
                    <td class="span3"><?= $value->amount ?></td>
                    <td class="span3"><?= date("d-m-Y", strtotime($value->transfer_date)); ?></td>
                </tr>
        <?php
        }} else {
            echo '<div class="alert alert-error">
                         <a class="close" data-dismiss="alert" href="#">x</a>You have no permission to do this operation!
                    </div>';
        }
        ?>
        </tbody>
    </table>
</div>

