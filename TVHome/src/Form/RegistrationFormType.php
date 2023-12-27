<?php

namespace App\Form;

use App\Entity\User;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Mime\Message;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use function PHPSTORM_META\type;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Họ ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập họ !',
                    ]),
                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Tên ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập tên !',
                    ]),
                ],
            ])
            ->add('username', TextType::class, [
                'label' => 'Tên đăng nhập ',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập tên đăng nhập !',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Tôi đã đọc và đồng ý với các điều khoản. ',
                'mapped' => false,
                // 'constraints' => [
                //     new IsTrue([
                //         'message' => 'Chấp nhận các Điều khoản.',
                //     ]),
                // ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'invalid_message' => 'Xác nhận mật khẩu không trùng khớp với mật khẩu !',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mật khẩu'],
                'second_options' => ['label' => 'Xác nhận mật khẩu'],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vui lòng nhập mật khẩu !',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Mật khẩu phải có ít nhất {{ limit }} kí tự',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'allow_extra_fields' => true,
        ]);
    }
}
