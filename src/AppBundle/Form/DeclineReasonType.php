<?php

namespace AppBundle\Form;

use AppBundle\Enum\DeclineType;
use AppBundle\Form\Model\DeclineReason;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeclineReasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('reason', ChoiceType::class, [
            'choices' => DeclineType::getAsOptions(),
            'multiple' => false,
            'expanded' => true,
        ])
            ->add('other', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Enter other reason',
                    'class' => 'reason-hide',
                ],
                'required' => true,
            ])
            ->add('save', SubmitType::class, ['label' => 'Submit']);

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                $form = $event->getForm();

                /** @var DeclineReason $reason */
                $reason = $event->getData();
                if ($reason->isOtherReason()) {
                    $form->add('other', TextareaType::class, array(
                        'class' => 'AppBundle:Position',
                        'placeholder' => 'Enter other reason',
                        'required' => true,
                    ));
                }

            }
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DeclineReason::class,
            'validation_groups' => function (FormInterface $form) {
                $groups = ['Default'];
                /** @var DeclineReason $data */
                $data = $form->getData();

                if ($data->isOtherReason()) {
                    $groups[] = 'other';
                }

                return $groups;
            },
        ]);
    }


}