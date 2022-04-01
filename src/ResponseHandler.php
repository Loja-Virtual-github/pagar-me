<?php

namespace LojaVirtual\PagarMe;

use GuzzleHttp\Psr7\Response;

class ResponseHandler
{
    /**
     * @var Response
     */
    private $response;

    /**
     * The constructor
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response= $response;
    }

    /**
     * Returns the status code
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * Get content from json
     *
     * @return \stdClass
     * @throws \Exception
     */
    public function contentFromJson()
    {
        $content = json_decode($this->response->getBody()->getContents());
        if (!empty(json_last_error())) {
            throw new \Exception("Invalid response body ('$content')");
        }

        return $content;
    }

    /**
     * Get raw response
     *
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}