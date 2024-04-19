<?php

namespace App\Controller;

use App\Form\PostType;
use App\Entity\Post;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;


# http://localhost/crud/public/index.php/

class MainController extends AbstractController
{
    private $em;
    
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $posts = $this->em->getRepository(Post::class)->findAll();

        // Formatear fechas y horas
        foreach ($posts as $post) {
            $post->fechaFormatted = $post->getFecha()->format('Y-m-d');
            $post->horaFormatted = $post->getHora()->format('H:i:s');
        }
        
        return $this->render('main/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/create-post', name: 'create-post')]
    public function createPost(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($post);
            $this->em->flush();
            $this->addFlash('message','Inserted Succesfully!!!');
            return $this->redirectToRoute('app_main');
        }

        return $this->render('main/post.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit-post/{id}', name:'edit-post')]
    public function editPost(Request $request, $id) #editpost
    {
        $post = $this->em->getRepository(Post::class)->find($id);
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($post);
            $this->em->flush();
            $this->addFlash('message','Inserted Succesfully!!!');
            return $this->redirectToRoute('app_main');
        }
        return $this->render('main/post.html.twig',[
            'form' => $form->createView()
        ]);
    }

    #[Route('/delete-post/{id}', name:'delete-post')]
    public function deletePost($id){
        // $post = $this->em->getRepository(Post::class)->find($id);
        $post = $this->em->getRepository(Post::class)->find($id);
        $this->em->remove($post);
        $this->em->flush();
        $this->addFlash('message','Deleted Succesfully!!!');
        return $this->redirectToRoute('app_main');
    }
}
