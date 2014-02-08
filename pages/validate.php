<!DOCTYPE html>
<html>
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.qrcode-0.7.0.js"></script>
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
    <label>Secret: <input id="secret" name="secret" type="text" value="<?= $secret ?>" style="width:80%" /></label><br />
    <label>OTP: <input id="otp" name="otp" type="text" value="<?= $otp ?>" style="width:80%" /></label><br />
    <input type="submit"/>
</form>


<?php

if ($secret && $otp) {

    require_once '../lib/PHPGangsta/GoogleAuthenticator.php';

    $ga = new PHPGangsta_GoogleAuthenticator();

    $checkResult = $ga->verifyCode($_POST['secret'], $_POST['otp'], 2);    // 2 = 2*30sec clock tolerance
    if ($checkResult) {
        echo 'CODE OK';
    } else {
        echo 'CODE FAILED';
    }

}

?>

</body>