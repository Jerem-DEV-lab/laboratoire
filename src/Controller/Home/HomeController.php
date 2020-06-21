<?php
namespace App\Controller\Home;

use App\Repository\CategorieRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param CategorieRepository $categories
     * @param ProductsRepository $products
     * @return Response
     * @Route("/", name="app_home")
     */
    public function index(CategorieRepository $categories, ProductsRepository $products): Response
    {
        $categories = $categories->findAll();
        $products = $products->findAll();

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}