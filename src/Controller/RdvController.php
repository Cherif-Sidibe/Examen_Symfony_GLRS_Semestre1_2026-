<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Repository\RdvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RdvController extends AbstractController
{
     public function __construct(private readonly RdvRepository $rdvRepository)
    {
    }
    #[Route('/validation', name: 'app_validation')]
    public function index(): Response
    {
        $rdvs = $this->rdvRepository->findAll();
        return $this->render('rdv/index.html.twig', [
            'controller_name' => 'RdvController',
            'rdvs' => $rdvs,
        ]);
    }
}
