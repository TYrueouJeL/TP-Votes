<?php

namespace App\Controller;

use App\Entity\Law;
use App\Form\LawCreateFormType;
use App\Repository\LawRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LawCreateController extends AbstractController
{
    #[Route('/law/create', name: 'app_law_create')]
    public function index(LawRepository $lawRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $law = new Law();

        //Création du formulaire
            $form = $this->createForm(LawCreateFormType::class, $law);

        //Traitement du formulaire
        //Récupération des données
        $form->handleRequest($request);

        //$form->isSubmitted() : le formulaire à été soumis
        //$from->isvalid() : le formulaire est valide

        if ($form->issubmitted() && $form->isValid()) {

            //Set les données dans l'objet $law à partir des données saisies dans le formulaire

            //Persister l'objet $law dans le context de l'EntityManager
            $entityManager->persist($law);

            //Exécuter les requêtes SQL
            $entityManager->flush();
        }

        return $this->render('law_create/index.html.twig', [
            'form' => $form,
        ]);
    }
}
