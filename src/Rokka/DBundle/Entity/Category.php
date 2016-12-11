<?php

namespace Rokka\DBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Rokka\DBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Goods", mappedBy="category")
     */

    private $goods;

    public function __construct()
    {
        $this->goods = new ArrayCollection();
    }

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
     * @return Category
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
     * @return Category
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
     * Set price
     *
     * @param float $price
     *
     * @return Category
     */

}
