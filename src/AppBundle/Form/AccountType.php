<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-13
 * Time: 11:36 PM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AccountType extends AbstractType {

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('company', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'company']])
            ->add('vatNumber', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'vatNumber']])
            ->add('salutation', ChoiceType::class, ['choices' => ['Herr' => 'm', 'Frau' => 'f'], 'expanded' => true, 'multiple' => false, 'label' => false])
            ->add('givenName', TextType::class, $this->getDefaultOptions('givenName'))
            ->add('familyName', TextType::class, $this->getDefaultOptions('familyName'))
            ->add('address', TextType::class, $this->getDefaultOptions('address'))
            ->add('zipCode', TextType::class, $this->getDefaultOptions('zipCode'))
            ->add('city', TextType::class, $this->getDefaultOptions('city'))
            ->add('country', CountryType::class, ['label' => false, 'data' => 'DE'])
            ->add('phone', TelType::class, $this->getDefaultOptions('phone'))
            ->add('fax', TelType::class, $this->getDefaultOptions('fax'))
            ->add('email', EmailType::class, $this->getDefaultOptions('email'))
            ->add('password', PasswordType::class, $this->getDefaultOptions('password'))
            ->add('passwordRetype', PasswordType::class, array_merge($this->getDefaultOptions('retype'), ['mapped' => false]))
            ;//->add('submit', SubmitType::class);
    }

    /**
     * returns an array with default values:
     * no label
     * placeholder = $fieldName
     *
     * @param string $fieldName
     * @return array
     */
    private function getDefaultOptions(string $fieldName): array {
        return [
            'label' => false,
            'attr' => [
                'placeholder' => $fieldName
            ]
        ];
    }
}