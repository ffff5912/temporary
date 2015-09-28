<?php

namespace AppBundle\Providers;

use Guzzle\Http\Client;

class InstagramProvider implements ProviderInterface
{
    private $client;
    private $access_token;
    private $client_id;
    private $client_secret;

    public function __construct(Client $client, array $config = [])
    {
        $this->client = $client;
        $this->access_token = $config['access_token'];
        $this->client_id = $config['client_id'];
        $this->client_secret = $config['client_secret'];
    }

    public function get($end_point, array $query)
    {
        $client->get($query);
    }

    public function post($end_point, array $query)
    {
        $client->post($query);
    }
}