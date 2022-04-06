<?php

namespace LojaVirtual\PagarMe\Resources;

use LojaVirtual\PagarMe\ResponseHandler;

class Order extends AbstractResource implements ResourceInterface
{
    /**
     * @var string
     */
    const ENDPOINT = 'orders';

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
                    array(
                        "json" => $payload
                    )
                );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Fetch order by id
     *
     * @param $id
     * @return ResponseHandler
     * @throws \Exception
     */
    public function fetchByID($id)
    {
        try {
            return $this
                ->request(
                    self::GET,
                    sprintf(
                        "%s/%s",
                        self::ENDPOINT,
                        $id
                    )
                );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * List orders
     *
     * @param array $query
     * @return ResponseHandler
     * @throws \Exception
     */
    public function listOrders(array $query = [])
    {
        try {
            return $this
                ->request(
                    self::GET,
                    self::ENDPOINT,
                    array(
                        'query' => $query
                    )
                );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}