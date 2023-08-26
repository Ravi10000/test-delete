<?php
$method = 'aes-256-cbc';
$key = substr(hash('sha256', "rLQjfDc4RCuNvTpsyq3IXbJVRseBZA0u", true), 0, 32);
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0)
    . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) .
    chr(0x0) . chr(0x0);
$data = json_encode(
    array(
        "mobile" => "9560863067",
        "email" => "ravisince2k@gmail.com",
        "amount" => 300,
        "template_id" => 9384,
        "product_name" => "Gift Voucher",
        "request_id" => "e2f2b3e3-5ccd-4ead-96cf-61ff0b1afd3d",
        "due_date" => "28/08/2023",
        "return_url" => "http://api.somriddhi.store/api/transaction/yespay/return.php",
    )
);
$request = base64_encode(
    openssl_encrypt(
        $data,
        $method,
        $key,
        // OPENSSL_RAW_DATA,
        $iv
    )
);
?>

<html>

<head></head>

<body>
    <form id="sendFormReq" action="https://invoicexpressnewuat.yesbank.in/pay/web/pushapi/index" method="post">
        <input type="text" name="request" value="<?php echo $request; ?>" />
        <input type="text" name="merchant_code" value="<?php echo "somr_7013_y3VO6"; ?>" />
    </form>
</body>

</html>
<script type="text/javascript">
    // setTimeout(submitForm, 5000);
    submitForm();
    function submitForm() {
        document.getElementById('sendFormReq').submit();
    }
</script>