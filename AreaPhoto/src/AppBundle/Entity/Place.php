<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert

/**
 * Place
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Place
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * 経度
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="Longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * 緯度
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="Latitude", type="string", length=255)
     */
    private $latitude;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Place
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Place
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
