<?php

namespace App\Controller\Admin;


use App\Entity\Adjointe;
use App\Entity\Materiau;
use App\Entity\Conjointe;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class PrestaDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration du site Dental Prothese');
    }


    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Adjointes', 'fas fa-list', Adjointe::class);
        yield MenuItem::linkToCrud('Conjointes', 'fas fa-list', Conjointe::class);
        yield MenuItem::linkToCrud('Materiaux', 'fas fa-list', Materiau::class);
    }
}
