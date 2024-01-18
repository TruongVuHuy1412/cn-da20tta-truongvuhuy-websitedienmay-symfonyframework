<?php

namespace App\Controller;

use App\Form\ContactType;
use App\ValueObject\ContactForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Psr\Log\LoggerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact', methods: ['POST'])]
    public function index(Request $request, MailerInterface $mailer, LoggerInterface $logger): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        $success = null;

        if($form->isSubmitted() && $form->isValid()){
            /** @var ContactForm $contactForm */
            $contactForm = $form->getData();

            $email = (new Email())
                ->to('huyt1412@gmai.com')
                ->from('TVHome@gmail.com')
                ->subject('Hi')
                ->text('hi');

        try{
            $mailer->send($email);

            $success = 'Gửi phản hồi thành công !';
        }
        catch (TransportExceptionInterface $exception){
            $form->addError(new FormError('Cannot'));
            $logger->error('co van de', [
                'error' => $exception->getMessage(),
            ]);
        }    
        }

        return $this->renderForm('widget/contact_us.twig', [
            'form' => $form,
            'success' => $success,
        ]);
    }
}
