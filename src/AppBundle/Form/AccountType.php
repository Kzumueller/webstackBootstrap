<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018-03-13
 * Time: 11:36 PM
 */

namespace AppBundle\Form;


use AppBundle\Entity\Account;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Translation\TranslatorInterface;

class AccountType extends AbstractType {

    /**
     * @var TranslatorInterface
     */
    private $translator = null;

    /**
     * AccountType constructor.
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator) {
        $this->translator = $translator;
    }


    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('company', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => $this->translator->trans('company', [], 'account'),
                    'data-constitutes-requirement' => 'account_vatNumber'
                ]
            ])

            ->add('vatNumber', VatNumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => $this->translator->trans('vatNumber', [], 'account')
                ]
            ])

            ->add('salutation', ChoiceType::class, [
                'choices' => [
                    $this->translator->trans('salutation.m', [], 'account') => 'm',
                    $this->translator->trans('salutation.f', [], 'account') => 'f'
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => false,
                'data' => 'm'
            ])

            ->add('givenName', TextType::class, $this->getDefaultOptions('givenName'))
            ->add('familyName', TextType::class, $this->getDefaultOptions('familyName'))
            ->add('address', TextType::class, $this->getDefaultOptions('address'))
            ->add('zipCode', TextType::class, $this->getDefaultOptions('zipCode'))
            ->add('city', TextType::class, $this->getDefaultOptions('city'))
            ->add('country', CountryType::class, ['label' => false, 'data' => 'DE'])
            ->add('phone', TelType::class, $this->getDefaultOptions('phone'))
            ->add('fax', TelType::class, $this->getDefaultOptions('fax'))
            ->add('email', EmailType::class, $this->getDefaultOptions('email'))

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => $this->translator->trans('form.passwordsMustMatch', [], 'form'),
                'first_options'  => $this->getDefaultOptions('password'),
                'second_options' => $this->getDefaultOptions('passwordRetype')
            ]);

        $this->addEventListeners($builder, $options);
    }

    /**
     * adds event listeners to modify form values
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    private function addEventListeners(FormBuilderInterface $builder, array $options = []) {
        /** hashes the password */
        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            /* @var $account Account */
            $account = $event->getData();
            $account->setPassword(password_hash($account->getPassword(), PASSWORD_BCRYPT, ['cost' => 10])); //default cost but just to keep in mind this exists, 20 will wreck my machine btw ;)
        });
    }

    /**
     * returns an array with default values:
     * no label
     * placeholder = $fieldName translated in 'account' domain
     *
     * @uses getDefaultPlaceholder
     * @param string $fieldName
     * @return array
     */
    private function getDefaultOptions(string $fieldName): array {
        return [
            'label' => false,
            'attr' => [
                'placeholder' => sprintf('%s *', $this->translator->trans($fieldName, [], 'account'))
            ]
        ];
    }
}