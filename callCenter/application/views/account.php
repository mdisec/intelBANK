<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
    <center>
        <hr>
        <div class="row">

            <div class="">
                <h4>Account Number</h4>
                <form  id="login" method="POST" action="<?= base_url()?>index.php/main/account_detail" accept-charset="UTF-8">
                    <input class="span3" placeholder="Account Number" type="text" name="accountNumber">
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
                <th>Account Number</th>
                <th>Balance</th>
                <th>Create Date</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($accountData as $value)
            {
                ?>
                <td id="TableAccountNumber" class="span3"><?= $value->accountNumber ?></td>
                <td id="TableBalance" class="span3"><?= $value->balance ?></td>
                <td id="TableCreateDate" class="span3"><?= $value->create_date ?></td>
                <td id="TableDescription" class="span3"><?= $value->description ?></td>
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