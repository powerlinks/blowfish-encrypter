# Blowfish Encrypter

This class is used to encrypt and decrypt strings using the blowfish standard.

## Composer

```
composer require powerlinks/blowfish-encrypter
```

```
{
    "require": {
        "powerlinks/blowfish-encrypter": "dev-master"
    }
}
```

## Usage

```php
use PowerLinks\Encrypter\BlowfishEncrypter;

$encrypter = new BlowfishEncrypter('passphrase');
$sentence = 'my sentence';

$encrypted = $encrypter->encryptToString($sentence);

$sentenceAgain = $encrypter->decryptFromString($encrypted);
```
