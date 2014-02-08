<!DOCTYPE html>
<html>
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<style>
    label {
        width: 70px;
        text-align: right;
        display: inline-block;
    }
    input[type="text"] {
        width: 300px;
    }
    input[type="submit"] {
        margin-left: 74px;
    }
</style>
</head>
<body>

<?php

if (isset($_POST['secret']) && isset($_POST['otp'])) {
    $secret = $_POST['secret'];
    $otp = $_POST['otp'];
}
else {
    $secret = '';
    $otp = '';
}

?>

<form action="/validate.php" method="post">
    <label for="secret">Secret:</label> <input id="secret" name="secret" type="text" value="<?= $secret ?>" /><br />
    <label for="otp">OTP:</label> <input id="otp" name="otp" type="text" value="<?= $otp ?>" /><br />
    <input type="submit"/>
</form>


<?php

if ($secret && $otp) {

    require_once '../lib/PHPGangsta/GoogleAuthenticator.php';

    $ga = new PHPGangsta_GoogleAuthenticator();

    $checkResult = $ga->verifyCode($_POST['secret'], $_POST['otp'], 2); // 2 = 2*30sec clock tolerance (aka, the current and previous code will both work)
    if ($checkResult) {
        echo 'CODE OK';
    } else {
        echo 'CODE FAILED';
    }

}

?>

</body>