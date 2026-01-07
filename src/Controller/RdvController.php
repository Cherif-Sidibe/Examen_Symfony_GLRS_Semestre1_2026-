<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\EtatEnum;
use App\Repository\RdvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;

final class RdvController extends AbstractController
{
    public function __construct(
        private readonly RdvRepository $rdvRepository,
        private readonly EntityManagerInterface $em,
    ) {}

    #[Route('/validation', name: 'app_validation')]
    public function index(): Response
    {
        $rdvs = $this->rdvRepository->findAll();
        return $this->render('rdv/index.html.twig', [
            'rdvs' => $rdvs,
        ]);
    }

    #[Route('/validation/{id}/valider', name: 'app_validation_valider')]
    public function valider(int $id): RedirectResponse
    {
        $rdv = $this->rdvRepository->find($id);
        if (!$rdv) {
            $this->addFlash('danger', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_validation');
        }

        $rdv->setEtat(EtatEnum::VALIDE);
        $this->em->flush();

        return $this->redirectToRoute('app_validation');
    }

    #[Route('/validation/{id}/annuler', name: 'app_validation_annuler')]
    public function annuler(int $id): RedirectResponse
    {
        $rdv = $this->rdvRepository->find($id);
        if (!$rdv) {
            $this->addFlash('danger', 'Rendez-vous introuvable.');
            return $this->redirectToRoute('app_validation');
        }

        $rdv->setEtat(EtatEnum::ANNULE);
        $this->em->flush();

        return $this->redirectToRoute('app_validation');
    }
}
