<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
    <center>
        <hr>
        <div class="row">

            <div class="">
                <h4>Customer's Transactions History</h4>
                <form  id="login" method="POST" action="<?= base_url()?>index.php/main/query" accept-charset="UTF-8">
                    <input class="span3" placeholder="Customer Number" type="text" name="customerNumber">
                    <br>
                    <button class="btn-info btn" type="submit">Search</button>
                </form>
            </div>

        </div>
    </center>
<?php
if(@$dataEnable)
{
    ?>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>

                <th>Src Account Number</th>
                <th>Dest Account Number</th>
                <th>Amount</th>
                <th>Transfer Date</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($transactionData as $value)
            {
                ?>
                <td class="span3"><?= $value->source_number ?></td>
                <td class="span3"><?= $value->destination_number ?></td>
                <td class="span3"><?= $value->amount ?></td>
                <td class="span3"><?= $value->transfer_date ?></td>
                <td class="span3"><?= $value->description ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
}
?>