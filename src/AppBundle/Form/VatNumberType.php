<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-17
 * Time: 10:18 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class VatNumberType extends TextType {

    /**
     * calls parent method after setting the 'required' option to true if the 'company' field is set
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['required'] = !empty($form->getParent()->get('company')->getData());
        parent::buildView($view, $form, $options);
    }
}