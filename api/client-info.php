<?php
    header("Access-Control-Allow-Origin: *");

    $uuid = uniqid();
    $amount = '5.30';
    $ip = "";
    $date = gmdate("Y-m-d\TH:i:s\Z");

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    echo json_encode(array(
        "transaction_uuid" => $uuid,
        "customer_ip_address" => $ip,
        "signed_date_time" => $date,
        "amount" => $amount
    ));