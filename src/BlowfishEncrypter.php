<?php
/**
 * BlowfishEncrypter.php
 *
 * @copyright PowerLinks
 * @author Manuel Kanah <manuel@powerlinks.com>
 * Date: 28/10/15 - 15:56
 */
namespace PowerLinks\Encrypter;

class BlowfishEncrypter
{
    /**
     * @var string
     */
    protected $cipher = MCRYPT_BLOWFISH;

    /**
     * @var string
     */
    protected $mode = MCRYPT_MODE_ECB;

    /**
     * @var string
     */
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $string
     * @return string
     */
    public function encryptToString($string)
    {
        return base64_encode($this->encrypt($string));
    }

    /**
     * @param string $string
     * @return string
     */
    public function decryptFromString($string)
    {
        return rtrim($this->decrypt(base64_decode($string)), "\0");
    }

    /**
     * @param string $string
     * @return string
     */
    protected function encrypt($string)
    {
        return mcrypt_encrypt($this->cipher, $this->key, $string , $this->mode);
    }

    /**
     * @param string $string
     * @return string
     */
    protected function decrypt($string)
    {
        return mcrypt_decrypt($this->cipher, $this->key, $string , $this->mode);
    }
}