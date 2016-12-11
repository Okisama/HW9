<?php

namespace Rokka\DBundle\Controller;

use Rokka\DBundle\Entity\Goods;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Rokka\DBundle\Entity\Category;
use Rokka\Dbundle\Entity\Tag;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RokkaDBundle:Default:index.html.twig');
    }

    public function addGoodAction()
    {
        $category = new Category();
        $category->setName('Computer Peripherals');

        $good = new Goods();
        $good->setName('Keyboard');
        $good->setPrice(19.99);
        $good->setWriteup('Ergonomic and stylish!');

        // relate this product to the category
        $good->setCategory($category);

        $tag1 = new Tag();
        $tag1->setName('New');

        $tag2 = new Tag();
        $tag2->setName('Sale');

        $good->addTag($tag1);
        $good->addTag($tag2);

        $tag1->addGood($good);
        $tag2->addGood($good);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($good);
        $em->persist($tag1);
        $em->persist($tag2);
        $em->flush();

        return new Response(
            'Saved new good with id: '.$good->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    public function updateGoodAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $good =$em->getRepository('RokkaDBundle:Goods')->find($id);

        $category = new Category();
        $category->setName('Computer Peripherals');

        $good->setName('Keyboard');
        $good->setPrice(19.99);
        $good->setWriteup('Ergonomic and stylish!');
        $good->setCategory($category);

        $tag1 = new Tag();
        $tag1->setName('New');

        $tag2 = new Tag();
        $tag2->setName('Sale');

        $good->addTag($tag1);
        $good->addTag($tag2);

        $tag1->addGood($good);
        $tag2->addGood($good);

        $em->persist($category);
        $em->persist($good);
        $em->persist($tag1);
        $em->persist($tag2);
        $em->flush();

        return new Response(
            'Saved new good with id: '.$good->getId()
            .' and new category with id: '.$category->getId()
        );
    }

    public function deleteGoodAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $good =$em->getRepository('RokkaDBundle:Goods')->find($id);

        $em->remove($good);
        $em->flush();

        return new Response(
            'Deleted good with id: '.$good->getId()
        );
    }

    public function addCategoryAction()
    {
        $category = new Category();
        $category->setName('Computer motherboards');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        return new Response(
            'Saved new category with id: '.$category->getId()
        );
    }

    public function updateCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category =$em->getRepository('RokkaDBundle:Category')->find($id);
        $category->setName('Computer motherboards');

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->flush();

        return new Response(
            'Saved new category with id: '.$category->getId()
        );
    }

    public function deleteCategoryAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $category =$em->getRepository('RokkaDBundle:Category')->find($id);

        $em->remove($category);
        $em->flush();

        return new Response(
            'Deleted category with id: '.$category->getId()
        );
    }

}
