<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="span9 well">
    <div class="row-fluid" >
        <div class="form-horizontal">
            <fieldset>
                <div id="legend">
                    <legend class="">Company Payment</legend>
                </div>
                <script>

                </script>
                <!-- Source account -->
                <div class="control-group" >
                    <label class="control-label"  for="username">Select Company</label>
                    <div class="controls">
                        <select class="span3" name="company_id" id="company_id" onchange="showCompanyServices();return;">
                            <option value="null">Select</option>
                            <?
                            foreach($companyData as $value)
                                {
                                    echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Balance -->
                <div id="service_hidden" class="control-group">
                    <label class="control-label"  for="username">Select Services </label>
                    <div class="controls">
                        <select class="span3" name="service_id" id="service_id" onchange="$('#number_hidden').show();">
                        </select>
                    </div>
                </div>
                <!-- Name -->
                <div class="control-group" id="number_hidden">
                    <label class="control-label"  for="username">Phone Number</label>
                    <div class="controls">
                        <input type="text" id="number" name="number" placeholder="" class="input-xlarge">
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#phone_submit").click(function(){
                            $('#phone_result').show();
                            $('#phone_debt').html('134 TL');
                        });
                    });
                </script>
                <!-- Result -->
                <div class="control-group" id="phone_result">
                    <label class="control-label"  for="username">Total : </label>
                    <div class="controls">
                        <p id="phone_debt"></p>
                    </div>
                </div>

                <!-- Submit -->

                <div class="control-group">
                    <div class="controls">
                        <button id="phone_submit" class="btn btn-success">Query</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

