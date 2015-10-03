<?php

namespace AppBundle\Services;

use Doctrine\Common\Collections\ArrayCollection;
use Guzzle\Http\Exception\HttpException;
use Guzzle\Common\Exception\RuntimeException;
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

    public function execute($lat, $lng, $distance = 100)
    {
        try {
            $location = $this->search($lat, $lng, $distance);
            $media = array_map(function ($location) {
                return $this->fetch($location['id']);
            }, $location['data']);

            return $media[0];
        } catch (HttpException $e) {
            throw new RuntimeException(sprintf('The HttpException. BAD REQUEST'));
        }
    }

    public function fetch($location_id, array $query = [])
    {
        $end_point = sprintf($this->end_points['recent'], $location_id);
        return $this->instagram_provider->get($end_point, $query);
    }

    public function search($lat, $lng, $distance)
    {
        $query['query'] = ['lat' => $lat, 'lng' => $lng, 'distance' => $distance];
        return $this->instagram_provider->get($this->end_points['search'], $query);
    }
}
