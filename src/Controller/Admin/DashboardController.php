<?php

namespace App\Controller\Admin;

use App\Entity\Climats;
use App\Entity\Lieux;
use App\Entity\Peche;
use App\Entity\Pecheurs;
use App\Entity\Poissons;
use App\Entity\SessionPeche;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ClimatsCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Appli Peche');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Climats', 'fas fa-map-marker-alt', Climats::class);
        yield MenuItem::linkToCrud('Lieux', 'fas fa-map-marker-alt', Lieux::class);
        yield MenuItem::linkToCrud('Poissons', 'fas fa-map-marker-alt', Poissons::class);
        yield MenuItem::linkToCrud('Pêcheurs', 'fas fa-map-marker-alt', Pecheurs::class);
        yield MenuItem::linkToCrud('Sesssions de pêche', 'fas fa-map-marker-alt', SessionPeche::class);
        yield MenuItem::linkToCrud('Pêche', 'fas fa-map-marker-alt', Peche::class);
    }
}
