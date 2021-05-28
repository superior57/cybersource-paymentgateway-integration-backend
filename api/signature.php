<?php
    header("Access-Control-Allow-Origin: *");

    define ('HMAC_SHA256', 'sha256');
    define ('SECRET_KEY', '2c54ba64ebbf4b3f9306d1b3dfffb1d2096d573348ba4ed2912db0a9fdf87001e637361dc29147a08c67e1818fbdf3f0058e73a896474af4bd4bdda7f23d35d8e78ff6a56cb14480b430da5532b55bfe7511e736273b4d5989c7f2d36e119858a891d206db774aa18ce874155a5bbecdd1776563403d45ac997e209ee7ccdd9e');

    foreach($_GET as $name => $value) {
        if ($name != 'signature')
            $params[$name] = $value;
    }

    $signature = sign($params);
    echo json_encode(array(
        "signature" => $signature
    ));

    function sign ($params) {
        return signData(buildDataToSign($params), SECRET_KEY);
    }

    function signData($data, $secretKey) {
        return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    }

    function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
            $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
    }

    function commaSeparate ($dataToSign) {
        return implode(",",$dataToSign);
    }
