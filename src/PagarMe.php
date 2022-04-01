<?php

namespace LojaVirtual\PagarMe;

use LojaVirtual\PagarMe\Resources\ResourceInterface;

class PagarMe
{
    /**
     * @var
     */
    const BASE_URI = 'https://api.pagar.me/core/v5';

    /**
     * The constructor
     *
     * @param string $publicKey
     * @param string $secretKey
     */
    public function __construct($publicKey, $secretKey)
    {
        Settings::setPublicKey($publicKey);
        Settings::setSecretKey($secretKey);
    }

    /**
     * Build the resource className
     *
     * @param string $className
     * @return string
     */
    public static function buildResourceClassName($className)
    {
        $className = mb_strtolower($className);
        $className = explode('_', $className);
        $className = array_map('ucwords', $className);
        $className = implode('', $className);

        return sprintf(
            "%s\\Resources\\%s",
            __NAMESPACE__,
            $className
        );
    }

    /**
     * Call a ResourceInterface
     *
     * @param string $resourceName
     * @param array $arguments
     * @throws \DomainException
     * @return ResourceInterface
     */
    public function __call($resourceName, array $arguments)
    {
        $resourceClassName = self::buildResourceClassName($resourceName);

        if (!class_exists($resourceClassName)) {
            throw new \DomainException("Resource '$resourceName' does not exists.");
        }

        return new $resourceClassName($arguments);
    }
}