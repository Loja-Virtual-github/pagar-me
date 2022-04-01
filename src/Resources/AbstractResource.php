<?php

namespace LojaVirtual\PagarMe\Resources;

use GuzzleHttp\Client as HttpClient;
use LojaVirtual\PagarMe\PagarMe;
use LojaVirtual\PagarMe\ResponseHandler;
use LojaVirtual\PagarMe\Settings;

class AbstractResource
{
    /**
     * @var string
     */
    const GET = "GET";

    /**
     * @var string
     */
    const POST = "POST";

    /**
     * @var string
     */
    const PUT = "PUT";

    /**
     * @var string
     */
    const DELETE = "DELETE";

    /**
     * @var HttpClient
     */
    private $http_client;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->http_client = new HttpClient(
            [
                "base_uri" => PagarMe::BASE_URI,
                "headers" => array(
                    "Authorization" => sprintf("Basic %s", Settings::getBasicAuthCode()),
                    "Content-type" => "application/json"
                )
            ]
        );
    }

    /**
     * Call a request
     *
     * @param $method
     * @param $endpoint
     * @param array $options
     * @return ResponseHandler
     * @throws \Exception
     */
    public function request($method, $endpoint, array $options)
    {
        try {
            $response = $this
                ->http_client
                ->request(
                    $method,
                    $endpoint,
                    $options
                );

            return new ResponseHandler($response);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}