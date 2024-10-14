<?php

namespace App\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\User\UserInterface;

class Sender
{
    protected MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewUserNotificationToAdmin(UserInterface $user): void
    {
       // pour tester
        //file_put_contents('debug.txt', $user->getUserIdentifier());

        $message = new Email();
        $message->from('account@series.com')
            ->to('admin@eries.com')
            ->subject('new account cretaed on series.com')
            ->html('<h1> New account!</h1>email: ' . $user->getUserIdentifier());

        $this->mailer->send($message);

    }

}