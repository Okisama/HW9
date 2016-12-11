<?php

namespace Rokka\DBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="Rokka\DBundle\Repository\TagRepository")
 */
class Tag
{
    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Goods", mappedBy="Tag")
     */
    private $goods;

    public function __construct() {
        $this->goods = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add good
     *
     * @param \Rokka\DBundle\Entity\Goods $good
     *
     * @return Tag
     */
    public function addGood(\Rokka\DBundle\Entity\Goods $good)
    {
        $this->goods[] = $good;

        return $this;
    }

    /**
     * Remove good
     *
     * @param \Rokka\DBundle\Entity\Goods $good
     */
    public function removeGood(\Rokka\DBundle\Entity\Goods $good)
    {
        $this->goods->removeElement($good);
    }

    /**
     * Get goods
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGoods()
    {
        return $this->goods;
    }

    /**
     * @return goods
     *
     * @param mixed $goods
     */
    public function setGoods($goods)
    {
        $this->goods = $goods;

        return $this;
    }
}
