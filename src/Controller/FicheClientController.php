<?php

namespace App\Controller;

use App\Entity\FicheClient;
use App\Form\FicheClientType;
use App\Repository\FicheClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fiche/client")
 */
class FicheClientController extends AbstractController
{
    /**
     * @Route("/fiche_client", name="fiche_client_index", methods={"GET"})
     */
    public function index(FicheClientRepository $ficheClientRepository): Response
    {
        return $this->render('fiche_client/index.html.twig', [
            'fiche_clients' => $ficheClientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fiche_client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ficheClient = new FicheClient();
        $form = $this->createForm(FicheClientType::class, $ficheClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ficheClient);
            $entityManager->flush();

            return $this->redirectToRoute('fiche_client_index');
        }

        return $this->render('fiche_client/new.html.twig', [
            'fiche_client' => $ficheClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_client_show", methods={"GET"})
     */
    public function show(FicheClient $ficheClient): Response
    {
        return $this->render('fiche_client/show.html.twig', [
            'fiche_client' => $ficheClient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fiche_client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FicheClient $ficheClient): Response
    {
        $form = $this->createForm(FicheClientType::class, $ficheClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_client_index');
        }

        return $this->render('fiche_client/edit.html.twig', [
            'fiche_client' => $ficheClient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fiche_client_delete", methods={"POST"})
     */
    public function delete(Request $request, FicheClient $ficheClient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheClient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ficheClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fiche_client_index');
    }
}
