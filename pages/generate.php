<!DOCTYPE html>
<html>
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" ></script>
<script type="text/javascript" src="jquery.qrcode-0.7.0.js"></script>
</head>
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
<body>

<?php

require_once '../lib/PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = isset($_POST['secret']) ? $_POST['secret'] : $ga->createSecret();
$issuer = isset($_POST['issuer']) ? $_POST['issuer'] : 'Issuer Name';
$account = isset($_POST['account']) ? $_POST['account'] : 'Account Name';

$otpauth = 'otpauth://totp/'.rawurlencode("$issuer:$account").'?secret='.rawurlencode($secret).'&issuer='.rawurlencode($issuer);
?>

<form action="generate.php" method="post">
    <label for="secret">Secret:</label> <input id="secret" name="secret" type="text" value="<?= $secret ?>" /><br />
    <label for="issuer">Issuer:</label> <input id="issuer" name="issuer" type="text" value="<?= $issuer ?>" /><br />
    <label for="account">Account:</label> <input id="account" name="account" type="text" value="<?= $account ?>"  /><br />
    <input type="submit"/>
</form>
<br/>
<pre><?= $otpauth ?></pre>
<div id="qrcode"></div>

<script type="text/javascript">
    $('#qrcode').html('').qrcode({
        text: '<?= $otpauth ?>',
	    ecLevel: 'L',
	    size: 200,
	    render: 'image',
    });
</script>

</body>