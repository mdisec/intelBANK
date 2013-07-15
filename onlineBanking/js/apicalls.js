/**
 * Created with JetBrains PhpStorm.
 * User: mince
 * Date: 7/2/13
 * Time: 1:41 PM
 * To change this template use File | Settings | File Templates.
 */
function getAccountBalance(account_id) {
    var value = jQuery.ajax({
        url: "/index.php/api/getAccountBalance/" + account_id,
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {
        }
    });
    return value.responseText;
}

function getCompanyServices(id) {
    var value = jQuery.ajax({
        url: "/index.php/api/getCompanyService/",
        type: "POST",
        dataType: "json",
        data: {company_id: id},
        async: false,
        success: function (data) {
        }
    });
    return value.responseText;
}

$(document).ready(function () {

    showBalance = function () {
        $('#balance').hide();
        var selectedAccountID = $("#source_account").val();
        var balanceFromDB = $.parseJSON(getAccountBalance(selectedAccountID));
        $('#account_balance').html(balanceFromDB.balance + " TL");
        $('#balance').show();
    }

    showCompanyServices = function () {
        $('#service_hidden').hide();
        var _id = $('#company_id').val();
        var servicesFromDB = $.parseJSON(getCompanyServices(_id));
        $.each(servicesFromDB, function (i, item) {
            $('#service_id').append($('<option>', {
                value: item.id,
                text : item.name
            }));
        });
        $('#service_hidden').show();
    }

    // default options
    $('#balance').hide();
    $('#service_hidden').hide();
    $('#number_hidden').hide();
    $('#phone_result').hide();
});


