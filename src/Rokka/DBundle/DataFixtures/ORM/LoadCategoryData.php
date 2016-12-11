<?php

namespace Rokka\DBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rokka\DBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 6; $i++)
        {
            $category = new Category();
            $category->setName('category'. $i);


            $manager->persist($category);
            $manager->flush();


        }
        $this->addReference('category', $category);

    }

    public function getOrder()
    {
        return 1;
    }
}
