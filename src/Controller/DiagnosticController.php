<?php

namespace App\Controller;

use DateTime;
use App\Form\ScoreType;
use App\Entity\Diagnostic;
use App\Form\DiagnosticType;
use App\Form\Diagnostic2Type;
use App\Repository\DiagnosticRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiagnosticController extends AbstractController

{

    /**
     * @Route("/diagnostic", name="diagnostic")
     */
    public function index()
    {

        return $this->render('diagnostic/index.html.twig');
    }

    // création d'un diagnostique
    /**
     * @Route("diagnostic/create", name="diagnostic_create")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $diagnostic = new Diagnostic;
        $form = $this->createForm(DiagnosticType::class, $diagnostic);

        // summetre mon formulaire 
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $diagnostic->setDate(new \DateTime('now'));
            $diagnostic->setEtape(1);
            $diagnostic->setScore(0);
            $diagnostic->setScore1(0);
            $diagnostic->setScore2(0);
            $diagnostic->setScore3(0);
            $diagnostic->setScore4(0);
            $em->persist($diagnostic);
            $em->flush();

            return $this->redirectToRoute('diagnostic_partie01', [
                'id' => $diagnostic->getId(),
            ]);
        }

        $formView = $form->createView();
        return $this->render('diagnostic/create.html.twig', [
            'formView' => $formView,

        ]);
    }

    /**
     * @Route("diagnostic/{id}/form", name="diagnostic_form")
     */
    public function formDiag($id, DiagnosticRepository $diagnosticRepository, Request $request)
    {
        $diagnostic =  $diagnosticRepository->find($id);

        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);

        // $form->setData($product);

        $form->handleRequest($request);

        $formView = $form->createView();

        return $this->render('shared/_formDiagnostic.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView
        ]);
    }
    /* ######################################################################################################################################### Partie 01 ############################################
 #####################################################################################################
*/
    /**
     * @Route("diagnostic/{id}/partie01", name="diagnostic_partie01")
     */
    public function partie01($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em->flush();

            return $this->redirectToRoute('diagnostic_question1A', [
                'id' => $diagnostic->getId(),
            ]);
        }

        $formView = $form->createView();

        return $this->render('diagnostic/partie01.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1A", name="diagnostic_question1A")
     */
    public function question1A($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1B', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1A.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1B", name="diagnostic_question1B")
     */
    public function question1B($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C1', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1B.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /**
     * @Route("diagnostic/{id}/question1C1", name="diagnostic_question1C1")
     */
    public function question1C1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /**
     * @Route("diagnostic/{id}/question1C2", name="diagnostic_question1C2")
     */
    public function question1C2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C3', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1C3", name="diagnostic_question1C3")
     */
    public function question1C3($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C4', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C3.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1C4", name="diagnostic_question1C4")
     */
    public function question1C4($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C5', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C4.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1C5", name="diagnostic_question1C5")
     */
    public function question1C5($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C6', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C5.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /**
     * @Route("diagnostic/{id}/question1C6", name="diagnostic_question1C6")
     */
    public function question1C6($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C7', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C6.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /**
     * @Route("diagnostic/{id}/question1C7", name="diagnostic_question1C7")
     */
    public function question1C7($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1C8', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C7.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1C8", name="diagnostic_question1C8")
     */
    public function question1C8($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1D1', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1C8.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1D1", name="diagnostic_question1D1")
     */
    public function question1D1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1D2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1D1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /**
     * @Route("diagnostic/{id}/question1D2", name="diagnostic_question1D2")
     */
    public function question1D2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1D3', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1D2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question1D3", name="diagnostic_question1D3")
     */
    public function question1D3($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question1E', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1D3.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }
    /**
     * @Route("diagnostic/{id}/question1E", name="diagnostic_question1E")
     */
    public function question1E($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore1() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore1($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_partie02', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question1E.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /* ######################################################################################################################################### Partie 02 ############################################
 #####################################################################################################
*/

    /**
     * @Route("diagnostic/{id}/partie02", name="diagnostic_partie02")
     */
    public function partie02($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $diagnostic->setEtape(2);
            $em->flush();

            return $this->redirectToRoute('diagnostic_question2A1', [
                'id' => $diagnostic->getId(),
            ]);
        }

        $formView = $form->createView();

        return $this->render('diagnostic/partie02.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2A1", name="diagnostic_question2A1")
     */
    public function question2A1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2A2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2A1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2A2", name="diagnostic_question2A2")
     */
    public function question2A2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2A3', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2A2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2A3", name="diagnostic_question2A3")
     */
    public function question2A3($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2A4', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2A3.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2A4", name="diagnostic_question2A4")
     */
    public function question2A4($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B1', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2A4.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B1", name="diagnostic_question2B1")
     */
    public function question2B1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B2", name="diagnostic_question2B2")
     */
    public function question2B2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B3', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B3", name="diagnostic_question2B3")
     */
    public function question2B3($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B4', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B3.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B4", name="diagnostic_question2B4")
     */
    public function question2B4($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B5', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B4.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B5", name="diagnostic_question2B5")
     */
    public function question2B5($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question2B6', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B5.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question2B6", name="diagnostic_question2B6")
     */
    public function question2B6($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore2() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore2($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_partie03', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question2B6.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /* ######################################################################################################################################### Partie 03 ############################################
 #####################################################################################################
*/

    /**
     * @Route("diagnostic/{id}/partie03", name="diagnostic_partie03")
     */
    public function partie03($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $diagnostic->setEtape(3);
            $em->flush();

            return $this->redirectToRoute('diagnostic_question3A1', [
                'id' => $diagnostic->getId(),
            ]);
        }

        $formView = $form->createView();

        return $this->render('diagnostic/partie03.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question3A1", name="diagnostic_question3A1")
     */
    public function question3A1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore3() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore3($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question3A2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question3A1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question3A2", name="diagnostic_question3A2")
     */
    public function question3A2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore3() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore3($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_partie04', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question3A2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }


    /* ######################################################################################################################################### Partie 04 ############################################
 #####################################################################################################
*/

    /**
     * @Route("diagnostic/{id}/partie04", name="diagnostic_partie04")
     */
    public function partie04($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $diagnostic->setEtape(4);
            $em->flush();

            return $this->redirectToRoute('diagnostic_question4A1', [
                'id' => $diagnostic->getId(),
            ]);
        }

        $formView = $form->createView();

        return $this->render('diagnostic/partie04.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A1", name="diagnostic_question4A1")
     */
    public function question4A1($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question4A2', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A1.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A2", name="diagnostic_question4A2")
     */
    public function question4A2($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question4A3', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A2.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A3", name="diagnostic_question4A3")
     */
    public function question4A3($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question4A4', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A3.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A4", name="diagnostic_question4A4")
     */
    public function question4A4($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question4A5', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A4.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A5", name="diagnostic_question4A5")
     */
    public function question4A5($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore(0);
            $em->flush();
            return $this->redirectToRoute('diagnostic_question4A6', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A5.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }

    /**
     * @Route("diagnostic/{id}/question4A6", name="diagnostic_question4A6")
     */
    public function question4A6($id, DiagnosticRepository $diagnosticRepository, Request $request, EntityManagerInterface $em)
    {
        $form2 = $this->createForm(ScoreType::class);

        $diagnostic =  $diagnosticRepository->find($id);
        $form = $this->createForm(Diagnostic2Type::class, $diagnostic);
        $form->handleRequest($request);

        $score = $diagnostic->getScore4() + $diagnostic->getScore();

        $score1 = $diagnostic->getScore1() + $diagnostic->getScore2() + $diagnostic->getScore3() + $diagnostic->getScore4() + $diagnostic->getScore();

        if ($form->isSubmitted()) {
            $diagnostic->setScore4($score);
            $diagnostic->setScore($score1);
            $em->flush();
            return $this->redirectToRoute('diagnostic_pageFinale', [
                'id' => $diagnostic->getId(),
            ]);
        }
        $formView = $form->createView();
        $formScore = $form2->createView();
        return $this->render('diagnostic/question4A6.html.twig', [
            'diagnostic' => $diagnostic,
            'formView' => $formView,
            'formScore' => $formScore
        ]);
    }
    /* ######################################################################################################################################### Fin de test ############################################
 #####################################################################################################
*/

    /**
     * @Route("diagnostic/{id}/pageFinale", name="diagnostic_pageFinale")
     */
    public function pageFinale($id, DiagnosticRepository $diagnosticRepository)
    {
        

        $diagnostic =  $diagnosticRepository->find($id); 
        return $this->render('diagnostic/pageFinale.html.twig', [
            'diagnostic' => $diagnostic
        ]);
    }
}
