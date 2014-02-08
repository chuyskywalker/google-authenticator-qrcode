<!DOCTYPE html>
<html>
<head>
<title>Cross-Browser QRCode generator for Javascript</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" ></script>
<script type="text/javascript" src="jquery.qrcode-0.7.0.js"></script>
</head>
<body>

<?php

require_once '../lib/PHPGangsta/GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = isset($_POST['secret']) ? $_POST['secret'] : $ga->createSecret();

$issuer = 'JRM Test';
$account = 'demo@jrm.cc';
$otpauth = 'otpauth://totp/'.rawurlencode("$issuer:$account").'?secret='.rawurlencode($secret).'&issuer='.rawurlencode($issuer);
?>

<form action="/" method="post">
    <label>Secret: <input id="secret" name="secret" type="text" value="<?= $secret ?>" style="width:80%" /></label><br />
    <label>QR Content: <input id="text" type="text" value="<?= $otpauth ?>" style="width:80%" /></label><br />
    <input type="submit"/>
</form>
<br/>
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