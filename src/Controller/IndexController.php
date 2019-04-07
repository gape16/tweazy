<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ServicesCategory;
use App\Entity\ServicesSousCategory;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
    	function shuffle_assoc($array)
	    {
			// Initialize
			$shuffled_array = array();
			// Get array's keys and shuffle them.
			$shuffled_keys = array_keys($array);
			shuffle($shuffled_keys);

			// Create same array, but in shuffled order.
			foreach ( $shuffled_keys AS $shuffled_key ) 
			{
			    $shuffled_array[  $shuffled_key  ] = $array[  $shuffled_key  ];
			} 
			// Return
			return $shuffled_array;
	    }

    	$category = $this->getDoctrine()
        ->getRepository(ServicesSousCategory::class)
        ->findAll();
        $categories = shuffle_assoc($category);

        return $this->render('index/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
