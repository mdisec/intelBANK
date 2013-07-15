<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span9 well">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Select</th>
            <th>Account Number</th>
            <th>Balance</th>
            <th>Description</th>
            <th>Create Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($accountData as $value) {?>
            <tr>
                <td class="span2"><a href="<?= base_url()?>index.php/main/account_detail/<?= $value->id?>"><i class="icon-arrow-right"></i></a> </td>
                <td class="span3"><?= $value->account_number ?></td>
                <td class="span3"><?= $value->balance?> TL</td>
                <td class="span3"><?= $value->description?></td>
                <td class="span3"><?= date("d-m-Y", strtotime($value->create_date));?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

