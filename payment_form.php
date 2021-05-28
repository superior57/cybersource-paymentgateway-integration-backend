<?php
if(!isset($_REQUEST['uuid']) || trim($_REQUEST['uuid']) == '') {
    $transaction_uuid = uniqid();
} else {
    $transaction_uuid = $_REQUEST['uuid'];
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

?>

<html>
<head>
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
</head>
<body>
<form id="payment_form" action="payment_confirmation.php" method="post">
    <input type="text" name="access_key" value="db4b4b4ef86f3a36b6409761bbc2215e">
    <input type="text" name="profile_id" value="96BA0C0B-2F36-42E0-BF31-C01C848AD21E">
    <input type="text" name="transaction_uuid" value="<?php echo $transaction_uuid ?>">
    <input type="text" name="customer_ip_address" value="<?php echo $ip ?>">
    <input type="text" name="merchant_defined_data1" value="WC">
    <input type="text" name="signed_field_names" value="access_key,profile_id,transaction_uuid,customer_ip_address,merchant_defined_data1,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
    <input type="text" name="unsigned_field_names">
    <input type="text" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="text" name="locale" value="en">
    <fieldset style="display: block;">
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" name="transaction_type" size="25"><br/>
            <span>reference_number:</span><input type="text" name="reference_number" size="25"><br/>
            <span>amount:</span><input type="text" name="amount" size="25" value="<?=$_REQUEST['amount'];?>"><br/>
            <span>currency:</span><input type="text" name="currency" size="25"><br/>
        </div>
    </fieldset>
    <input type="submit" id="btnsubmit" value="Pay now"/>
    <script type="text/javascript" src="payment_form.js"></script>
</form>
</body>
</html>
