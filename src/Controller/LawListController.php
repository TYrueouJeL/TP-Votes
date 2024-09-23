<?php

namespace App\Controller;

use App\Entity\Law;
use App\Repository\LawRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LawListController extends AbstractController
{
    #[Route('/law', name: 'app_law_list')]
    public function index(EntityManagerInterface $entityManager, LawRepository $lawRepository): Response
    {

        return $this->render('law_list/index.html.twig', [
            'lawList' => $lawRepository->findAll(),
        ]);
    }
}
