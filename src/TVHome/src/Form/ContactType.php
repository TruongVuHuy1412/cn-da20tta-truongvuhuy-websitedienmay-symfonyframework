<?php

namespace App\Form;

use App\ValueObject\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\NotBlank;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập tên',
                    ]),
                ],
                'label' => 'Họ và tên',
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập email',
                    ]),
                ],
                'label' => 'Email',
            ])
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Hãy nhập tiêu đề',
                    ]),
                ],
                'label' => 'Tiêu đề',
            ])
            ->add('content', TextareaType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Nội dung không được bỏ trống',
                    ]),
                ],
                'label' => 'Nội dung',
            ])
            
            ->add('submit', SubmitType::class, [
                'row_attr' => [
                    'class' => 'align-right',
                ],
                'label' => 'Gửi',
                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
            'allow_extra_fields' => true,
        ]);
    }
}
