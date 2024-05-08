<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use App\Entity\TypeOfServices;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Zoo Arcadia');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToUrl('Retour au site', 'fas fa-home', '/');

        yield MenuItem::section('Administrations');

        yield MenuItem::section('Services');
        yield MenuItem::linkToCrud('Type de services', 'fas fa-list', TypeOfServices::class);
        yield MenuItem::linkToCrud(('Services'), 'fas fa-list', Services::class);

        yield MenuItem::section('Clientéles');

        yield MenuItem::section('Animaux');

        yield MenuItem::subMenu('Base de données', 'fas fa-database')
            ->setSubItems([

            ]);

    }
}