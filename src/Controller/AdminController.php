<?php

namespace App\Controller;

use App\Repository\DiagnosticRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function index(DiagnosticRepository $diagnosticRepository): Response
    {
        $diagnostics =  $diagnosticRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'diagnostics' => $diagnostics,
        ]);
    }
}
