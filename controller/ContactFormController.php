<?php

class ContactFormController
{
    public function contact($name, $email, $subject, $message)
    {
        $errors = [];

        if (!array_key_exists('name', $_POST) || $_POST['name'] == '') {
            $errors['name'] = "Vous n'avez pas renseigné votre nom !";
        }
        if (!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Vous n'avez pas renseigné un e-mail valide !";
        }
        if (!array_key_exists('subject', $_POST) || $_POST['subject'] == '') {
            $errors['subject'] = "Vous n'avez pas renseigné votre sujet !";
        }
        if (!array_key_exists('message', $_POST) || $_POST['message'] == '') {
            $errors['message'] = "Vous n'avez pas renseigné votre message !";
        }

        session_start();

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['inputs'] = $_POST;
            header('Location: index.php#contact');
        }else{

            require_once ('vendor/autoload.php');

            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
              ->setUsername('b27e28fd280c0a')
              ->setPassword('c42bb4f945f63d')
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message($_POST['subject']))
              ->setFrom([$_POST['email'] => $_POST['name']])
              ->setTo(['carole.guardiola@gmail.com' => 'Carole Guardiola'])
              ->setBody($_POST['message'])
              ;

            // Send the message
            $result = $mailer->send($message);

            $_SESSION['success'] = 1;
            header('Location: index.php#contact');
        }
    }
}
