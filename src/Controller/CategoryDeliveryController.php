<?php

namespace App\Controller;

use App\Entity\CategoryDelivery;
use App\Form\CategoryDelivery1Type;
use App\Repository\CategoryDeliveryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/category/delivery")
 */
class CategoryDeliveryController extends AbstractController
{
    /**
     * @Route("/", name="category_delivery_index", methods={"GET"})
     * @param CategoryDeliveryRepository $categoryDeliveryRepository
     * @return Response
     */
    public function index(CategoryDeliveryRepository $categoryDeliveryRepository): Response
    {
        return $this->render('category_delivery/index.html.twig', [
            'category_deliveries' => $categoryDeliveryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_delivery_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $categoryDelivery = new CategoryDelivery();
        $form = $this->createForm(CategoryDelivery1Type::class, $categoryDelivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryDelivery);
            $entityManager->flush();

            return $this->redirectToRoute('category_delivery_index');
        }

        return $this->render('category_delivery/new.html.twig', [
            'category_delivery' => $categoryDelivery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_delivery_show", methods={"GET"})
     * @param CategoryDelivery $categoryDelivery
     * @return Response
     */
    public function show(CategoryDelivery $categoryDelivery): Response
    {
        return $this->render('category_delivery/show.html.twig', [
            'category_delivery' => $categoryDelivery,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="category_delivery_edit", methods={"GET","POST"})
     * @param Request $request
     * @param CategoryDelivery $categoryDelivery
     * @return Response
     */
    public function edit(Request $request, CategoryDelivery $categoryDelivery): Response
    {
        $form = $this->createForm(CategoryDelivery1Type::class, $categoryDelivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('category_delivery_index');
        }

        return $this->render('category_delivery/edit.html.twig', [
            'category_delivery' => $categoryDelivery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="category_delivery_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CategoryDelivery $categoryDelivery): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryDelivery->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryDelivery);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_delivery_index');
    }
}
