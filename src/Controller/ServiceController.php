<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service', methods: ['GET', 'POST'])]
    public function index(
        ServicesRepository $services
    ): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
            'services' => $services->findAll()
        ]);
    }
}
