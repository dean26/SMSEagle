# SMSEagle
PHP code to implement SMSEagle’s API.

```php

//example with HttpApi method

require __DIR__ . '/vendor/autoload.php';

use SMSEagle\SMSEagle;
use SMSEagle\Auth\Token;
use SMSEagle\Method\HttpApi;
use SMSEagle\Message\SMS;

//auth with token
$sms_eagle = new SMSEagle(new Token('your_token'));
//or you can use login and password
//$sms_eagle = new SMSEagle(new LoginPassword('login', 'password'));
$sms_eagle->setHost('modem_host');
$sms_eagle->setMethod(new HttpApi());

$message = new SMS('phone_number', 'message'); 

if($sms_eagle->send($message)){
    echo "Message to has been sent successfully!";
} else {
    echo "Send message failed!";
}

```
