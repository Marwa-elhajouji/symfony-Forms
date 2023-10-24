<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
// use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
    private $entityManager; // Créez une propriété pour stocker le gestionnaire d'entité

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Injectez le gestionnaire d'entité via le constructeur
    }

    #[Route('/registration', name: 'app_registration')]
    public function register(Request $request,UserPasswordHasherInterface $passwordHasher, ManagerRegistry $doctrine):Response
    // public function register(Request $request, ManagerRegistry $doctrine):Response

    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            // $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            // $user=setRoles(['ROLE_USER']);
            $password=$passwordHasher->hashPassword($user,  $user->getPassword());
            $user->setPassword($password);

            
            $entityManager=$doctrine->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Inscription réussie. Vous pouvez maintenant vous connecter.');
            // return $this->redirectToRoute('login');
            return $this->redirectToRoute('app_login');
        } else {
            $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
