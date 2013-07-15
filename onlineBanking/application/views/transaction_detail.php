<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span9 well">
    <?
    if(!@$notFound)
    {
    ?>
    <p class="text-success">Transaction ID = <?= $transactionData[0]->id?></p>
    <p class="text-success">Source account number = <?= $transactionData[0]->source_number?></p>
    <p class="text-success">Destination account number = <?= $transactionData[0]->destination_number?></p>
    <p class="text-success">Transfered amount = <?= $transactionData[0]->amount?> TL</p>
    <p class="text-success">Transfer Date = <?= date("d-m-Y", strtotime( $transactionData[0]->transfer_date));?></p>
    <?
    } else {
        echo '<div class="alert alert-error">
                         <a class="close" data-dismiss="alert" href="#">x</a>Data not found!
                    </div>';
    }
    ?>
</div>

