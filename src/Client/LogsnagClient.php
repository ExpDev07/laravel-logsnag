<?php

namespace ExpDev07\Logsnag\Client;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * The client for logging with Logsnag.
 *
 * @see https://sh4yy.notion.site/LogSnag-API-e942b03305c94d4fa72c8a3d24a0ad49
 */
class LogsnagClient
{

    /**
     * The base URL.
     *
     * @var string
     */
    protected string $url = 'https://api.logsnag.com/v1/';

    /**
     * The API token.
     *
     * @var string
     */
    protected string $token;

    /**
     * Constructs a new Logsnag.
     *
     * @var string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Builds a request.
     *
     * @return PendingRequest
     */
    protected function buildRequest(): PendingRequest
    {
        return Http::baseUrl($this->url)->withToken($this->token)->asJson();
    }

    /**
     * Logs something.
     *
     * @param LogsnagRequest $request
     * @return Response
     */
    public function log(LogsnagRequest $request): Response
    {
        return $this->buildRequest()->post('/log', $request->toArray());
    }

}