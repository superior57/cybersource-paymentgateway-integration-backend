<?php include 'security.php' ?>

<html>
<head>
    <title>Secure Acceptance - Payment Form Example</title>
    <link rel="stylesheet" type="text/css" href="payment.css"/>
</head>
<body>
<form id="payment_confirmation" name="payment_confirmation" action="https://testsecureacceptance.cybersource.com/pay" method="post">
<?php
    foreach($_REQUEST as $name => $value) {
        $params[$name] = $value;
    }
?>
<fieldset id="confirmation" style="display: block;">
    <legend>Review Payment Details</legend>
    <div>
        <?php
            foreach($params as $name => $value) {
                echo "<div>";
                echo "<span class=\"fieldName\">" . $name . "</span><span class=\"fieldValue\">" . $value . "</span>";
                echo "</div>\n";
            }
        ?>
    </div>
</fieldset>
    <?php
        foreach($params as $name => $value) {
            echo "<input type=\"text\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
        }
        echo "<input type=\"text\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
    ?>
</form>
<script>
    //document.getElementById('payment_confirmation').submit();
    // document.forms['payment_confirmation'].submit();
</script>
</body>
</html>
