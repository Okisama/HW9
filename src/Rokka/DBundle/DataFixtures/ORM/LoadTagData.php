<?php

namespace Rokka\DBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rokka\DBundle\Entity\Tag;

class LoadTagData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 6; $i++)
        {
            $tag = new Tag();
            $tag->setName('tag'. $i);
            $tag->setGoods($this->getReference('goods'));

            $manager->persist($tag);
            $manager->flush();


        }


    }

    public function getOrder()
    {
        return 3;
    }
}
