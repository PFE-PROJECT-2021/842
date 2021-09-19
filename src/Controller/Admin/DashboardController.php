<?php

namespace App\Controller\Admin;

use App\Entity\Cahierdecharge;
use App\Entity\Ficheclient;
use App\Entity\Ficheprospect;
use App\Entity\Ficherendezvous;
use App\Entity\User;
use App\Repository\FicheclientRepository;
use App\Repository\FicheprospectRepository;
use App\Repository\FicherendezvousRepository;
use Doctrine\ORM\Mapping\Entity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class  DashboardController extends AbstractDashboardController
{
    protected $ficheclientRepository;
    protected $ficherendezvousRepository;
    protected $ficheprospectRepository;
    protected $chartBuilder;

    public function __construct(
        FicheclientRepository $ficheclientRepository,
        FicherendezvousRepository $ficherendezvousRepository,
        FicheprospectRepository $ficheprospectRepository,
        ChartBuilderInterface $chartBuilder
    )
    {
        $this->ficheclientRepository = $ficheclientRepository;
        $this->ficherendezvousRepository = $ficherendezvousRepository;
        $this->ficheprospectRepository = $ficheprospectRepository;
        $this->ChartBuilderInterface = $chartBuilder;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $chart = $this->ChartBuilderInterface->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => 100]],
                ],
            ],
        ]);

        return $this->render('admin/dashboard.html.twig', [
            'chart' => $chart,
            'countAllClient' => $this->ficheclientRepository->countAllClient(),
            'countAllRdv' => $this->ficherendezvousRepository->countAllRdv(),
            'countAllFicheProspect' => $this->ficheprospectRepository->countAllFicheprospect(),
        ]);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            //Titre
            //->setTitle('842 CRM')
            ->setTitle('<img src="images/Logo842.png" width="50"> CRM')

            //Favicon
            ->setFaviconPath('images/Logo842.png')
        ;
    }

    public function configureMenuItems(): iterable
    {
        return[

            MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home')->setCssClass('btn btn-outline-light'),

            MenuItem::section('Gestion Client'),
            MenuItem::linkToCrud('Entreprise', 'fas fa-list', Ficheclient::class),
            MenuItem::linkToCrud('Cahier de charge', 'fa fa-file-invoice', Cahierdecharge::class),

            MenuItem::section('Gestion Fiche'),
            MenuItem::linkToCrud('Fichier prospect', 'fas fa-scroll', Ficheprospect::class),
            MenuItem::linkToCrud('Fiche de rendez-vous', 'fas fa-copy', Ficherendezvous::class),

            MenuItem::section('Gestion utilisateur'),
            MenuItem::linkToCrud('Utilisateur', 'fa fa-users', User::class),

        ];

        //yield MenuItem::linktoDashboard('Tableau de bord', 'fa fa-home');
        //yield MenuItem::linkToCrud('Fiche client', 'fas fa-list', Ficheclient::class);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            ->setGravatarEmail($user->getUsername())
            ->displayUserAvatar(true)
            ;
    }
}
