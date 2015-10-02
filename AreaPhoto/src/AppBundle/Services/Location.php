<?php

namespace AppBundle\Services;

use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Providers\ProviderInterface;

class Location implements WebServiceInterface
{
    private $instagram_provider;
    private $end_points;

    public function __construct(ProviderInterface $instagram_provider, array $end_points)
    {
        $this->instagram_provider = $instagram_provider;
        $this->end_points = $end_points;
    }

    public function execute($lat, $lng, $distance = 200)
    {
        $location_id = $this->search($lat, $lng, $distance);

        $response = $this->fetch($location_id, $query);

        return $response;
    }

    public function fetch($location_id, array $query = [])
    {
        $end_point = sprintf($this->end_points['recent'], $location_id);
        $request = $this->instagram_provider->get($end_point, $query);
        $response = $request->send();

        return $response->json();
    }

    public function search($lat, $lng, $distance)
    {
        $query['query'] = ['lat' => $lat, 'lng' => $lng, 'distance' => $distance];
        return $this->instagram_provider->get($this->end_points['search'], $query);
    }
}
