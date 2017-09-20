<?php

namespace ContactApi\Controller;

use ContactApi\Form\Form;
use ContactApi\FormElement\ContactElement;
use ContactApi\FormElement\MessageElement;
use ContactApi\Sender\EmailSender;
use ContactApi\Validator\ContactValidator;
use ContactApi\Validator\MessageValidator;

class FrontController
{
    private $parameters;

    /**
     * @param $parameters
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    public function handle()
    {
        $form = new Form();
        $contactFormValidator = new ContactValidator();
        $contactFormElement = new ContactElement($contactFormValidator);
        $messageFormValidator = new MessageValidator();
        $messageFormElement = new MessageElement($messageFormValidator);

        $form->addElement('contact', $contactFormElement);
        $form->addElement('message', $messageFormElement);

        $submittedData = json_decode(file_get_contents('php://input'), true);
        $form->submit($submittedData);

        if ($form->areValid()) {
            $message = sprintf(
                '%s -  %s',
                $form->getElement('contact')->getValue(),
                $form->getElement('message')->getValue()
            );

            $emailSender = new EmailSender($this->parameters);
            $result = $emailSender->send($message);

            if ($result) {
                header('Content-Type: application/json');
                header("HTTP/1.1 200 OK");
                echo json_encode(['status' => 'Success']);
            } else {
                header('Content-Type: application/json');
                header('HTTP/1.1 500 Internal Server Error');
                echo json_encode(['status' => 'Internal Server Error']);
            }
        } else {
            header('Content-Type: application/json');
            header('HTTP/1.1 400 BAD REQUEST');
            echo json_encode(['status' => 'Incorrect data']);
        }
    }
}