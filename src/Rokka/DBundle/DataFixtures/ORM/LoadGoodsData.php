<?php


namespace Rokka\DBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rokka\DBundle\Entity\Goods;

class LoadGoodsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 6; $i++)
        {
            $goods = new Goods();
            $goods->setName('goods'. $i);
            $goods->setPrice($i);
            $goods->setWriteup('Description of good number'. $i);
            $goods->setCategory($this->getReference('category'));


            $manager->persist($goods);
            $manager->flush();


        }
        $this->addReference('goods', $goods);


    }

    public function getOrder()
    {
        return 2;
    }
}
