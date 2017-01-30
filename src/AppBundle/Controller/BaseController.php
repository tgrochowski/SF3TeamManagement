<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BaseController extends Controller
{
    /**
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm($formType,$data = null,$create = false)
    {
        $form = $this->createForm($formType, $data, array(
            'method' => 'POST',
            'entity_manager' => $this->get('doctrine.orm.entity_manager')
        ));

        $label =  ($create)? "Create":"Update";
        $form->add('submit', SubmitType::class, array('label' => $label));
        return $form;
    }
}
