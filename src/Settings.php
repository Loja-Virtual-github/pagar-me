<?php

namespace LojaVirtual\PagarMe;

abstract class Settings
{
    /**
     * @var string
     */
    private static $public_key;

    /**
     * @var string
     */
    private static $secret_key;

    /**
     * Set the public key
     *
     * @param string $publicKey
     * @return void
     */
    public static function setPublicKey($publicKey)
    {
        self::$public_key = $publicKey;
    }

    /**
     * Set the secret key
     *
     * @param string $secretKey
     * @return void
     */
    public static function setSecretKey($secretKey)
    {
        self::$secret_key = $secretKey;
    }

    /**
     * Get the public key
     *
     * @return string
     */
    public static function getPublicKey()
    {
        return self::$public_key;
    }

    /**
     * Get the secret key
     *
     * @return string
     */
    public static function getSecretKey()
    {
        return self::$secret_key;
    }

    /**
     * Return the basic code
     *
     * @return string
     */
    public static function getBasicAuthCode()
    {
        $secretKey = sprintf("%s:", self::getSecretKey());
        return base64_encode($secretKey);
    }
}