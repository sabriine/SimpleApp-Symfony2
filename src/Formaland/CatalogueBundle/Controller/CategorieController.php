<?php

namespace Formaland\CatalogueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Formaland\CatalogueBundle\Entity\Categorie;
use Formaland\CatalogueBundle\Form\CategorieType;
use Symfony\Component\HttpFoundation\Request;
class CategorieController extends Controller
{
    public function indexAction()
    {    //l'entité manager qui récupère le service doctrine qui gère la BD
        $en=$this->getDoctrine()->getManager();
        $categorie=new categorie();
        //je récupère tous les champs de l'entité categorie
        $categorie=$en->getRepository('FormalandCatalogueBundle:categorie')->findAll();
    
        
        
        return $this->render('FormalandCatalogueBundle:Categorie:index.html.twig',array('cat'=>$categorie));
    }
    // la fonction de modification d'un catalogue dans ma BD
    public function editAction(Request $request, $token)
    {
       $en=$this->getDoctrine()->getManager();
        $categorie=new Categorie();
        //je récupère tous les champs de l'entité categorie
        $categorie=$en->getRepository('FormalandCatalogueBundle:Categorie')->findOneByToken($token);
        $form_modifier=  $this->createForm(new CategorieType(),$categorie);
        $request=  $this->getRequest();
        if($request->getMethod()=='POST')
        {
            $form_modifier->bind($request);
            if($form_modifier->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info','categorie modifiée');
                 //redirirection vers l'accueil
        return $this->redirect($this->generateUrl('index_catalogue')); 
    }}
          //si la requete est en get on affiche la page de confirmation avant la modification
        return $this->render('FormalandCatalogueBundle:Categorie:edit.html.twig', array('form'=>$form_modifier->createView()));
    }

    // la fonction d'ajout d'un catalogue à ma BD
    public function addAction(Request $request)
    {   $categorie=new Categorie();
        $form_ajout=$this->createForm(new CategorieType(), $categorie);
        if($request->isMethod('POST'))
        {
            $form_ajout->handleRequest($request);
            if($form_ajout->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                //redirirection vers l'accueil
                        return $this->redirect($this->generateUrl('index_catalogue'));
            }
        }

        return $this->render('FormalandCatalogueBundle:Categorie:add.html.twig',
                array('form'=>$form_ajout->createView()));
    }

    // la fonction de suppression d'un catalogue de ma BD
    public function deleteAction(Categorie $categorie)
    {   
        //on récupère l'EntityManager
        $em=$this->getDoctrine()->getManager();
        $form= $this->createFormBuilder()->getForm();
        $categorie=$em->getRepository('FormalandCatalogueBundle:Categorie')->find($categorie->getId());
        //si la categorie n'existe pas on affiche une erreur 404
        if($categorie==null)
        {
            throw $this->createNotFoundException('Categorie[id='.$id.'] inexistant');
        }
        if($this->get('request')->getMethod()=='POST')
        {
            //si la requete est en post on supprime le catalogue
            $em->remove($categorie);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info','catégorie bien supprimé');
            //puis on redirige vers l'accueil
        return $this->redirect($this->generateUrl('index_catalogue'));
        }
        //si la requete est en get on affiche la page de confirmation avant la suppression
        return $this->render('FormalandCatalogueBundle:Categorie:delete.html.twig',array('categorie'=>$categorie,'form'=>$form->createView()));
    }
}
