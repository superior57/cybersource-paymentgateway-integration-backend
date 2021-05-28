$(function () {
    payment_form = $('form').attr('id');
    //addLinkToSetDefaults();
    setDefaultsForAll();
});


function setDefaultsForAll() {
    if (payment_form === "payment_confirmation"){
      setDefaultsForUnsignedDetailsSection();
   }
   else {
      setDefaultsForPaymentDetailsSection();
   } 
}

function addLinkToSetDefaults() {
    $(".section").prev().each(function (i) {
        legendText = $(this).text();
        $(this).text("");

        var setDefaultMethod = "setDefaultsFor" + capitalize($(this).next().attr("id")) + "()";

        newlink = $(document.createElement("a"));
        newlink.attr({
            id:'link-' + i, name:'link' + i, href:'#'
        });
        newlink.append(document.createTextNode(legendText));
        newlink.bind('click', function () {
            eval(setDefaultMethod);
        });

        $(this).append(newlink);
    });

    newbutton = $(document.createElement("input"));
    newbutton.attr({
        id:'defaultAll', value:'Default All', type:'button', onClick:'setDefaultsForAll()'
    });
    newbutton.bind('click', function() {
        setDefaultsForAll;
    });
    $("#"+payment_form).append(newbutton);
}

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function setDefaultsForPaymentDetailsSection() {
    $("input[name='transaction_type']").val("sale");
    $("input[name='reference_number']").val(new Date().getTime());
    //$("input[name='amount']").val("100.00");
    $("input[name='currency']").val("QAR");
}

function setDefaultsForUnsignedDetailsSection(){
    $("input[name='card_type']").val("001");
    $("input[name='card_number']").val("4242424242424242");
    $("input[name='card_expiry_date']").val("11-2021");
}


