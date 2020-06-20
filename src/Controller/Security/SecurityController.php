<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="app.registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder, EntityManagerInterface$manager): Response
    {
        $user = new user();

        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setRoles(array('ROLE_ADMIN'));

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('app.home');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
