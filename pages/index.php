<?php

require '../phpqrcode/phpqrcode.php';


// text output
$codeContents = 'otpauth://totp/infoATphpgangsta.de?secret=OQB6ZZGYHCPSX4AKotpauth://totp/infoATphpgangsta.de?secret=OQB6ZZGYHCPSX4AKotpauth://totp/infoATphpgangsta.de?secret=OQB6ZZGYHCPSX4AK';

// generating
$text = QRcode::text($codeContents, false, QR_ECLEVEL_L);

echo '<table class="qr">';
foreach ($text as $row) {
    echo '<tr>';
    foreach (str_split($row) as $character) {
        echo "<td class='". ($character == 1 ? 'b' : 'w') ."'></td>";
    }
    echo '</tr>';
}
echo '</table><br/>';


// generating
$text = QRcode::text($codeContents, false, QR_ECLEVEL_M);

echo '<table class="qr">';
foreach ($text as $row) {
    echo '<tr>';
    foreach (str_split($row) as $character) {
        echo "<td class='". ($character == 1 ? 'b' : 'w') ."'></td>";
    }
    echo '</tr>';
}
echo '</table><br/>';

// generating
$text = QRcode::text($codeContents, false, QR_ECLEVEL_H);

echo '<table class="qr">';
foreach ($text as $row) {
    echo '<tr>';
    foreach (str_split($row) as $character) {
        echo "<td class='". ($character == 1 ? 'b' : 'w') ."'></td>";
    }
    echo '</tr>';
}
echo '</table><br/>';

// generating
$text = QRcode::text($codeContents, false, QR_ECLEVEL_Q);

echo '<table class="qr">';
foreach ($text as $row) {
    echo '<tr>';
    foreach (str_split($row) as $character) {
        echo "<td class='". ($character == 1 ? 'b' : 'w') ."'></td>";
    }
    echo '</tr>';
}
echo '</table><br/>';

?>

<style>

    table{
        border-collapse: collapse;
    }
    table.qr td {
        width: 4px;
        height: 6px;
    }
    table.qr td.w {
        background: #fff;
    }
    table.qr td.b {
        background: #000;
    }
</style>