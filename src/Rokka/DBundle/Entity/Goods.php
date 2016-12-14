<?php

namespace Rokka\DBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Goods
 *
 * @ORM\Table(name="goods")
 * @ORM\Entity(repositoryClass="Rokka\DBundle\Repository\GoodsRepository")
 */
class Goods
{
    /**
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="Goods")
     */
    private $tag;

    public function __construct() {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="Goods")
     * Юзать полное имя таргет ентити /bundle/entity/goods
     * Названия в единственном числе
     *
     */
    private $category;

    /**
     * @Gedmo\Slug(fields={"category", "name", "id"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(type="float",)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=500)
     */
    private $writeup;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var \DateTime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

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
     * @return Goods
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
     * Set writeup
     *
     * @param string $writeup
     *
     * @return Goods
     */
    public function setWriteup($writeup)
    {
        $this->writeup = $writeup;

        return $this;
    }

    /**
     * Get writeup
     *
     * @return string
     */
    public function getWriteup()
    {
        return $this->writeup;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return Goods
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set category
     *
     * @param \Rokka\DBundle\Entity\Category $category
     *
     * @return Goods
     */
    public function setCategory(\Rokka\DBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Rokka\DBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set price
     * @param float $price
     *
     * @return price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add tag
     *
     * @param \Rokka\DBundle\Entity\Tag $tag
     *
     * @return Goods
     */
    public function addTag(\Rokka\DBundle\Entity\Tag $tag)
    {
        $tag->addGood($this);

        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Rokka\DBundle\Entity\Tag $tag
     */
    public function removeTag(\Rokka\DBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Return slug
     *
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }
}
