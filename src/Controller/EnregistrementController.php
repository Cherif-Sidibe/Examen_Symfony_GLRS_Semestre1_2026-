<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Form\RdvType;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EnregistrementController extends AbstractController
{
    #[Route('/enregistrement', name: 'app_enregistrement')]
    public function index(Request $request, EntityManagerInterface $em, PatientRepository $patients): Response
    {
        $rdv = new Rdv();
        $form = $this->createForm(RdvType::class, $rdv);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $login = $form->get('login')->getData();
            $pwd = $form->get('pwd')->getData();
            $patient = $patients->findOneBy(['login' => $login, 'pwd' => $pwd]);

            if (!$patient) {
                $this->addFlash('danger', 'Login ou mot de passe invalide.');
            } else {
                $rdv->setPatient($patient);
                $em->persist($rdv);
                $em->flush();

                $this->addFlash('success', 'Rendez-vous enregistré.');

                return $this->redirectToRoute('app_enregistrement');
            }
        }

        return $this->render('enregistrement/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
