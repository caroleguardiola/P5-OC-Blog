<?php

namespace CaroleGuardiola\P5OCBlog\Controller;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Exception;

class ContactFormController
{
    public function home()
    {
        require('view/frontend/indexView.php');
    }

    public function contact($name, $email, $subject, $message)
    {
        $errors = [];

        if (!isset($name) || $name == '') {
            $errors['name'] = "Vous n'avez pas renseigné votre nom !";
        }
        if (!isset($email) || $email == '' || !filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Vous n'avez pas renseigné un e-mail valide !";
        }
        if (!isset($subject) || $subject == '') {
            $errors['subject'] = "Vous n'avez pas renseigné votre sujet !";
        }
        if (!isset($message) || $message == '') {
            $errors['message'] = "Vous n'avez pas renseigné votre message !";
        }

        session_start();

        if (isset($_POST['token']) && $_POST['token'] != $_SESSION['token']) {
           throw new Exception('Echec lors de l\'envoi !');
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('Location: index.php#contact');
        }
        else {

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
              ->setUsername('b27e28fd280c0a')
              ->setPassword('c42bb4f945f63d')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($subject))
              ->setFrom([$email => $name])
              ->setTo(['carole.guardiola@gmail.com' => 'Carole Guardiola'])
              ->setBody($message)
              ;

            // Send the message
            $mailer->send($message);

            $_SESSION['success'] = true;

            header('Location: index.php#contact');

            unset($_SESSION['token']);
        }
    }
}
