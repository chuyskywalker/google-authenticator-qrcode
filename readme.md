# Google Authenticator Test

The rough of this is:

1. Visit `generate.php` and either a) supply a known code or b) use the generated code
2. Change the issuer/account details as pleases you
3. Submit the form
5. Scan the QR code into Google Authenticator
6. Save the Secret
7. Go to `validate.php`
8. Enter the Secret
9. Enter the current (or most recent) OTP code
10. Submit validation form and cross fingers for "CODE OK"

In a real world application you would save the secret code into your database,
preferably encrypted somehow, and extract it whenever you needed to validate
a user at login.

Projects this builds upon:

 * https://github.com/PHPGangsta/GoogleAuthenticator
 * https://github.com/lrsjng/jQuery.qrcode

The site configuration here is my own quirky nginx setup, but you should be
able to toss the `pages/` and `lib/` directory in just about any webserver
which has PHP support and it should work fine.
