<?php

namespace App\Controller;

use App\Entity\CategoryDelivery;
use App\Entity\Delivery;
use App\Form\Delivery1Type;
use App\Repository\CategoryDeliveryRepository;
use App\Repository\DeliveryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/delivery")
 */
class DeliveryController extends AbstractController
{
    /**
     * @Route("/", name="delivery_index", methods={"GET"})
     * @param DeliveryRepository $deliveryRepository
     * @param CategoryDeliveryRepository $categoryDeliveryRepository
     * @return Response
     */
    public function index(DeliveryRepository $deliveryRepository, CategoryDeliveryRepository $categoryDeliveryRepository): Response
    {
        $categoryDelivery = new CategoryDelivery();
        return $this->render('delivery/index.html.twig', [
            'deliveries' => $deliveryRepository->findAll(),
            'category_deliveries' => $categoryDeliveryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="delivery_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $delivery = new Delivery();
        $form = $this->createForm(Delivery1Type::class, $delivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($delivery);
            $entityManager->flush();

            return $this->redirectToRoute('delivery_index');
        }

        return $this->render('delivery/new.html.twig', [
            'delivery' => $delivery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delivery_show", methods={"GET"})
     */
    public function show(Delivery $delivery): Response
    {
        return $this->render('delivery/show.html.twig', [
            'delivery' => $delivery,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="delivery_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Delivery $delivery): Response
    {
        $form = $this->createForm(Delivery1Type::class, $delivery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('delivery_index');
        }

        return $this->render('delivery/edit.html.twig', [
            'delivery' => $delivery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delivery_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Delivery $delivery): Response
    {
        if ($this->isCsrfTokenValid('delete'.$delivery->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($delivery);
            $entityManager->flush();
        }

        return $this->redirectToRoute('delivery_index');
    }
}
