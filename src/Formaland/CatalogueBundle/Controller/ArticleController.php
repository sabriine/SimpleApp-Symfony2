<?php

namespace Formaland\CatalogueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Formaland\CatalogueBundle\Entity\Article;
use Formaland\CatalogueBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function indexArticleAction()
    {    //l'entité manager qui récupère le service doctrine qui gère la BD  
        $en=$this->getDoctrine()->getManager();
        $article=new Article();
        //je récupère tous les champs de l'entité categorie
        $article=$en->getRepository('FormalandCatalogueBundle:Article')->findAll();
    
        return $this->render('FormalandCatalogueBundle:Article:index.html.twig',array('cat'=>$article));
       
    }
     // la fonction d'ajout d'un article à ma BD
    public function addArticleAction(Request $request)
    {  $article=new \Formaland\CatalogueBundle\Entity\Article();
        $form_ajout=$this->createForm(new ArticleType(), $article);
        
        if($request->isMethod('POST'))
        {
            $form_ajout->handleRequest($request);
            if($form_ajout->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
                 //redirirection vers l'accueil
                        return $this->redirect($this->generateUrl('index_article'));
            }
        }
        
        return $this->render('FormalandCatalogueBundle:Article:add.html.twig',array('form'=>$form_ajout->createView()));
    }
    // la fonction de modification d'un article dans ma BD
    public function editArticleAction(Request $request, $token)
    {   $en=$this->getDoctrine()->getManager();
        $article=new Article();
        //je récupère tous les champs de l'entité categorie
        $article=$en->getRepository('FormalandCatalogueBundle:Article')->findOneByToken($token);
        $form_modifier=  $this->createForm(new ArticleType(),$article);
        $request=  $this->getRequest();
        if($request->getMethod()=='POST')
        {
            $form_modifier->bind($request);
            if($form_modifier->isValid())
            {
                $em=$this->getDoctrine()->getManager();
                $em->persist($article);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info','article modifié');
                  //redirirection vers l'accueil
               return $this->redirect($this->generateUrl('edit_index')); 
            }
        }
      //si la requete est en get on affiche la page de confirmation avant la modification
         return $this->render('FormalandCatalogueBundle:Article:edit.html.twig', array('form'=>$form_modifier->createView()));
       
    }
 // la fonction de suppression d'un catalogue de ma BD
    public function deleteArticleAction(Article $article)
    {   
        //on récupère l'EntityManager
        $em=$this->getDoctrine()->getManager();
        $form= $this->createFormBuilder()->getForm();
        $article=$em->getRepository('FormalandCatalogueBundle:Article')->find($article->getId());
        //si la categorie n'existe pas on affiche une erreur 404
        if($article==null)
        {
            throw $this->createNotFoundException('Article[id='.$id.'] inexistant');
        }
        if($this->get('request')->getMethod()=='POST')
        {
            //si la requete est en post on supprime le catalogue
            $em->remove($article);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info','article bien supprimé');
            //puis on redirige vers l'accueil
        return $this->redirect($this->generateUrl('index_article'));
        }
        //si la requete est en get on affiche la page de confirmation avant la suppression
        return $this->render('FormalandCatalogueBundle:Article:delete.html.twig',array('article'=>$article,'form'=>$form->createView()));
    }
  
}
