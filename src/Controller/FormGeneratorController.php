<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Form;
use App\Entity\ServicesList;
use App\Entity\ServicesCategory;
use App\Entity\ServicesSousCategory;
use App\Entity\FormElement;
use App\Form\ServicesListType;
use App\Form\ServicesCategoryType;
use App\Form\ServicesSousCategoryType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormGeneratorController extends AbstractController
{
    /**
     * @Route("/form/generator", name="form_generator")
     */
    public function index()
    {

    	$build = new ServicesCategory();

        $form = $this->createForm(ServicesSousCategoryType::class, $build);

        return $this->render('form_generator/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
