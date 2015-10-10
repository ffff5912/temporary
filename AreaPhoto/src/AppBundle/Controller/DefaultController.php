<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;

/**
 * @Cache(maxage="86400")
 */
class DefaultController extends Controller
{
    public function indexAction()
    {
        $this->get('app.service.location');
        return $this->render('AppBundle:Default:index.html.twig', array(
        ));
    }
}
