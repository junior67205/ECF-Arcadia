<?php

namespace App\Controller;

use App\Repository\TypeOfServicesRepository;
use Doctrine\DBAL\Types\Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main', methods: ['GET', 'POST'])]
    public function index(
        TypeOfServicesRepository $typeOfServicesRepository
    ): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'typeOfServices' => $typeOfServicesRepository->findAll(),
        ]);
    }
}
