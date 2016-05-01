<?php

namespace Formaland\CatalogueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity
 */


    
   
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    
    
    private $id;
    

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="Prix", type="float")
     */
    private $prix;

    /**
     * @var float
     *
     * @ORM\Column(name="quantite", type="float")
     */
    private $quantite;
    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;
    /**
     * @ORM\ManyToOne(targetEntity="Formaland\CatalogueBundle\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    
    private $categories;
    /**
     * @ORM\OneToOne(targetEntity="Formaland\CatalogueBundle\Entity\Image", cascade={"persist","remove"})
     */    
    private $image;

    /**
     * Get id
     *
     * @return integer 
     */
    
    
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Article
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Article
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param float $quantite
     * @return Article
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return float 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Article
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    

    /**
     * Set categories
     *
     * @param \Formaland\CatalogueBundle\Entity\Categorie $categories
     * @return Article
     */
    public function setCategories(\Formaland\CatalogueBundle\Entity\Categorie $categories)
    {
        $this->categories = $categories;
    
        return $this;
    }

    /**
     * Get categories
     *
     * @return \Formaland\CatalogueBundle\Entity\Categorie 
     */
    public function getCategories()
    {
        return $this->categories;
    }
     public function __construct() {
        $this->token= base_convert(sha1(uniqid(mt_rand(1,999),true)),16,36);
       
    }

    /**
     * Set image
     *
     * @param \Formaland\CatalogueBundle\Entity\Image $image
     * @return Article
     */
    public function setImage(\Formaland\CatalogueBundle\Entity\Image $image = null)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return \Formaland\CatalogueBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
}