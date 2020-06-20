<?php
namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @return Response
 * @Route("/admin", name="app.back")
 */
class AdminController extends AbstractController
{
    /**
     * @return Response
     * @Route(name="app.back.index")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig');
    }
}