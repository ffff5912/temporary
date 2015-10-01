<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class MediaController extends FOSRestController implements ClassResourceInterface
{
    /**
     * TODO: validation, response
     * @param  string $location_id
     * @return
     */
    public function getLocationAction(Request $request)
    {
        $location = $this->get('app.service.location');
        $location->fetch($location_id);
    }
}
