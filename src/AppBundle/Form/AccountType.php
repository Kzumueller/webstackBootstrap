<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-13
 * Time: 11:36 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;

class AccountType extends AbstractType {

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('company', TextType::class)
            ->add('vatNumber', TextType::class)
            //->add('salutation', RadioType::class, ['data' => 'm', 'value' => true])
            ->add('givenName', TextType::class)
            ->add('familyName', TextType::class)
            ->add('address', TextType::class)
            ->add('zipCode', TextType::class)
            ->add('city', TextType::class)
            ->add('country', CountryType::class)
            ->add('phone', TelType::class)
            ->add('fax', TelType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('submit', SubmitType::class);
    }
}