<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="span9">
    <!--Sorry About the Heavy CSS But its neaded for the components make it external for quicker load time :) -->
    <style>
        .pricing-table .plan {
            border-radius: 5px;
            text-align: center;
            background-color: #f3f3f3;
            -moz-box-shadow: 0 0 6px 2px #b0b2ab;
            -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
            box-shadow: 0 0 6px 2px #b0b2ab;
        }

        .plan:hover {
            background-color: #fff;
            -moz-box-shadow: 0 0 12px 3px #b0b2ab;
            -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
            box-shadow: 0 0 12px 3px #b0b2ab;
        }

        .plan {
            padding: 20px;
            color: #ff;
            background-color: #5e5f59;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }


        .plan-name-silver {
            padding: 20px;
            color: #fff;
            background-color: #C0C0C0;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }



        .pricing-table .plan .plan-name span {
            font-size: 20px;
        }

        .pricing-table .plan ul {
            list-style: none;
            margin: 0;
            -moz-border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;
        }

        .pricing-table .plan ul li.plan-feature {
            padding: 15px 10px;
            border-top: 1px solid #c5c8c0;
        }

        .pricing-three-column {
            margin: 0 auto;
            width: 80%;
        }

        .pricing-variable-height .plan {
            float: none;
            margin-left: 2%;
            vertical-align: bottom;
            display: inline-block;
            zoom:1;
            *display:inline;
        }

        .plan-mouseover .plan-name {
            background-color: #4e9a06 !important;
        }

        .btn-plan-select {
            padding: 8px 25px;
            font-size: 18px;
        }
    </style>
    <div class="row-fluid pricing-table pricing-three-column">
        <?php if($accountData){?>
        <div class="span12 plan">
            <div class="plan-name-silver">
                <h2><?= $accountData[0]->description?></h2>
                    <span class="badge badge-warning">Type : TL</span>
                    <br>
                    <span class="badge badge-warning">Creation Time : <?= $accountData[0]->create_date?></span>
            </div>
            <ul>
                <li class="plan-feature">Account Number : <?= $accountData[0]->account_number ?></li>
                <li class="plan-feature">Balance : <?= $accountData[0]->balance ?> TL</li>
                <li class="plan-feature"><a href="<?= base_url()?>index.php/operation/transaction_history/<?= $accountData[0]->id ?>" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> See Transaction History</a></li>
            </ul>
        </div>
      <?php } else { echo '<div class="alert alert-error">
                         <a class="close" data-dismiss="alert" href="#">x</a>You have no permission to do this operation!
                    </div>';}?>
    </div>
</div>

