<?php

namespace App\Form;

use App\Entity\Order;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'label' => 'Họ và tên'
            ])
            ->add('phonenumber', TelType::class, [
                'label' => 'Số điện thoại'
            ])
            ->add('address', TextType::class, [
                'label' => 'Địa chỉ'
            ])
            ->add('message', TextType::class, [
                'label' => '',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Order::class,
            'allow_extra_fields' => true,

        ]);
    }
}
