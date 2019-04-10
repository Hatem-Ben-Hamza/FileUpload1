<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Test;
use AppBundle\Form\TestType;
use AppBundle\Service\UploaderService;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request,UploaderService $uploader)
    {
        $uploadFile = new Test();
        $form = $this->createForm(TestType::class,$uploadFile);

        $form->handleRequest($request);
        
        $em = $this->getDoctrine()->getEntityManager();

        if($form->isSubmitted() && $form->isValid()){
            
            /*$file1 = $uploadFile->getFile1();
            $fileName1 = md5(uniqid()).'.'.$file1->guessExtension();
            $file1->move(
                $this->getParameter('uploads_directory1'),
                $fileName1
            );

            $file2 = $uploadFile->getFile2();
            $fileName2 = md5(uniqid()).'.'.$file2->guessExtension();
            $file2->move(
                $this->getParameter('uploads_directory2'),
                $fileName2
            );
            */

            $fileName1 = $uploader->upload($uploadFile->getFile1(),$this->getParameter('uploads_directory1'));
            $fileName2 = $uploader->upload($uploadFile->getFile2(),$this->getParameter('uploads_directory2'));

            $uploadFile->setFile1($fileName1);
            $uploadFile->setFile1($fileName2);
            $em->persist($uploadFile);
            $em->flush();

        }

        return $this->render('default/index.html.twig',array(
            'form' => $form->createView()
        ));

         //return $this->render('default/index.html.twig');
    }
}
