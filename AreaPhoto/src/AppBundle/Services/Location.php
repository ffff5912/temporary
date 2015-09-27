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

    public function execute(array $query = [], array $parameter = [])
    {
        $location_id = $this->search($parameter['lat'], $parameter['ing'], $parameter['distance']);
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

    public function search($lat, $ing, $distance)
    {
    }
}
