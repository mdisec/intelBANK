<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="span9 well">
    <?
    if(@accountData)
    {
    ?>
    <div class="row-fluid" >
        <?
        echo validation_errors('<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">x</a>','</div>');
        if(isset($is_account_number_valid))
            echo '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">x</a>Destination account number is not valid!</div>';
        if(isset($is_balance_enough))
            echo '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">x</a>Your balance is not enough!</div>';
        ?>
        <form class="form-horizontal" action="<?=base_url()?>index.php/money/send" method="post">
            <fieldset>
                <div id="legend">
                    <legend class="">Payment</legend>
                </div>
                <script>

                </script>
                <!-- Source account -->
                <div class="control-group" >
                    <label class="control-label"  for="username">Source account</label>
                    <div class="controls">
                        <select class="span3" name="source_account" id="source_account" onchange="showBalance();return;">
                            <option value="null">Select</option>
                            <?
                            foreach($accountData as $value)
                                {
                                    echo '<option value="'.$value->id.'">'.$value->account_number.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Balance -->
                <div id="balance" class="control-group">
                    <label class="control-label"  for="username">Current Balance </label>
                    <div class="controls">
                        <p id="account_balance"></p>
                    </div>
                </div>
                <!-- Name -->
                <div class="control-group">
                    <label class="control-label"  for="username">Receiving Account Holder</label>
                    <div class="controls">
                        <input type="text" id="customer_name" name="customer_name" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <!-- Card Number -->
                <div class="control-group">
                    <label class="control-label" for="email">Destination Account Number</label>
                    <div class="controls">
                        <input type="text" id="destination_account_number" name="destination_account_number" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <!-- CVV -->
                <div class="control-group">
                    <label class="control-label"  for="password_confirm">Amount</label>
                    <div class="controls">
                        <input type="text" id="amount" name="amount" placeholder="" class="span2">
                    </div>
                </div>

                <!-- Description -->
                <div class="control-group">
                    <label class="control-label"  for="password_confirm">Description</label>
                    <div class="controls">
                        <input type="text" id="description" name="description" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <!-- Submit -->
                <div class="control-group">
                    <div class="controls">
                        <button class="btn btn-success">Send Now</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div> <?
    }else {
        echo '<div class="alert alert-warning">
                         <a class="close" data-dismiss="alert" href="#">x</a>You have no account!
                    </div>';
    }
    ?>
</div>

