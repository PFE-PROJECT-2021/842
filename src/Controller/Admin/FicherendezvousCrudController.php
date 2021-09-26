<?php

namespace App\Controller\Admin;

use App\Entity\Ficherendezvous;
use App\Repository\FicherendezvousRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use phpDocumentor\Reflection\Types\False_;
use Psr\Container\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf as Dompdf;
use Dompdf\Options;
use Symfony\Component\DependencyInjection\Exception;


class FicherendezvousCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Ficherendezvous::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [

            IdField::new('id')
                ->hideOnIndex()->hideOnForm()->hideOnDetail(),
            DateField::new('datepriserdv')
                ->setLabel('Date prise Rdv')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-6 col-md-4 col-lg-4'),
            DateField::new('daterdv')
                ->setLabel('Date Rendez-vous')->setFormat('dd-MM-Y')->renderAsNativeWidget()->setColumns('col-6 col-md-4 col-lg-4'),
            IntegerField::new('prix')
                ->setLabel('Prix')->hideOnIndex()->setColumns('col-sm-4 col-lg-2'),
            IntegerField::new('notequalif')
                ->setLabel('Note Appel (/5)')->setColumns('col-sm-4 col-lg-2'),
            TextField::new('engagement')
                ->setLabel('Engagement')->hideOnIndex()->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('rappel')
                ->setLabel('Rappel')->setColumns('col-6 col-md-4 col-lg-4'),
            TextField::new('sms')
                ->setLabel('SMS')->hideOnIndex()->setColumns('col-6 col-md-4 col-lg-4'),
            AssociationField::new('entreprise')
                ->setLabel('Nom de l\'entreprise')->setColumns('col-5')->autoComplete(),
            TextEditorField::new('commentaire')
                ->setLabel('Commentaire d\'appel')->setColumns('col-12'),
            AssociationField::new('user')
                ->setLabel('Agent')->setColumns('col-5')->hideOnForm(),
        ];

        return $fields;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['datepriserdv' => 'DESC'])
            ->setPageTitle('index', 'Liste fiche rendez-vous')
            ->setPageTitle('new', 'Ajouter nouveau rendez-vous')
            ->setPageTitle('detail', 'Détails fiche rendez-vous');
//            ->setPageTitle('edit', fn (Ficheclient $client) => sprintf('Editing <b>%s</b>', $client->getName()));
    }

    public function configureActions(Actions $actions): Actions
    {
        $downloadbtn = Action::new('download', 'Exporter pdf', 'fa fa-download')
            ->linkToRoute("ficherdv_download")
            ->setHtmlAttributes([
                'target' => '_blank'
            ])
            ->displayAsLink()
            ->addCssClass('btn btn-success')
        ;

        return $actions ->add(Crud::PAGE_INDEX, $downloadbtn)
                        ->add(Crud::PAGE_INDEX, 'detail');

        /*->setPermission(Action::NEW, 'ROLE_ADMIN');
        ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN');*/

    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            // ->add(EntityFilter::new('marque'))
            //->add(DateCalendarFilter::new('datepriserdv'))
            ->add('daterdv')
            ->add('notequalif')
            ->add('user')
            ;
    }

    /**
     * @Route("/ficherendezvous/download", name="ficherdv_download", methods={"GET"})
     */
    public function ficherdvDownload(Ficherendezvous $ficherendezvous): Response
    {
        //Définition options pdf
        $pdfOptions = new Options();

        //Police par défaut
        $pdfOptions->set('defaultFont','Arial');
        $pdfOptions->setIsRemoteEnabled(true);

        //Instanciation Dompdf
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);

        $dompdf->setHttpContext($context);

        //Génération du html

        //$ficherendezvous = $ficherendezvousRepository->findAll();

        $html = $this->renderView('/admin/download.html.twig', compact('ficherendezvous'));

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        //Génération nom du fichier
        $fichier = 'fiche-rendez-vous'.$this->getUser()->getUsername().'.pdf';

        //Envoie du pdf vers le navigateur
        $dompdf->stream($fichier, [
            'Attachment' => true
        ]);

    }
}
