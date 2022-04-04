<?php

namespace LojaVirtual\PagarMe\Resources;

use LojaVirtual\PagarMe\ResponseHandler;

class Order extends AbstractResource implements ResourceInterface
{
    const ENDPOINT = 'orders/';

    /**
     * Insert a new order
     *
     * @param array $payload
     * @return ResponseHandler
     * @throws \Exception
     */
    public function insert(array $payload)
    {
        try {
            return $this
                ->request(
                    self::POST,
                    self::ENDPOINT,
                    $payload
                );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}