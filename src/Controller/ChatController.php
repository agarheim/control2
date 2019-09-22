<?php


namespace App\Controller;


use App\Entity\Chat;
use App\Repository\ChatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ChatType;
use Symfony\Component\HttpFoundation\Request;


class ChatController extends AbstractController
{

    /**
     * @Route("/", name="default")
     */
    public function index(ChatRepository $repository, Request $request)
    { $chatF= new Chat();
      $chatF->setDatePub(new \DateTime('now'));
        $form= $this->createForm(ChatType::class,  $chatF);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($chatF);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('default');
        }
        $chat = $repository->findBy([],['DatePub'=>'DESC']);
        return $this->render('index.html.twig', [
            'chat' => $chat,
            'form' => $form->createView(),
        ]);
    }
}