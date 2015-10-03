<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Util\Codes;
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
        $media = $location->execute($request->query->get('lat'), $request->query->get('lng'));
        if (0 === count($media)) {
            throw new NotFoundHttpException(sprintf('The resource lat:\'%s\' lng:\'%s\' was not found.', $request->query->get('lat'), $request->query->get('lng')));
        }
        $view = $this->view($media['data'], 200);

        return $this->handleView($view);
    }
}
