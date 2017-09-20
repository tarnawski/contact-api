<?php

namespace ContactApi\Sender;

class EmailSender implements SenderInterface
{
    /** @var string */
    private $host;

    /** @var string */
    private $port;

    /** @var string */
    private $address;

    /** @var string */
    private $username;

    /** @var  string */
    private $password;

    /** @var string */
    private $subject;

    /** @var string */
    private $target;

    /**
     * ContactApi constructor.
     * @param $parameters
     */
    public function __construct($parameters) {
        $this->host = $parameters['host'];
        $this->port = $parameters['port'];
        $this->address = $parameters['address'];
        $this->username = $parameters['username'];
        $this->password = $parameters['password'];
        $this->subject = $parameters['subject'];
        $this->target = $parameters['target'];
    }

    public function send($body = null)
    {
        $transport = (new \Swift_SmtpTransport($this->host, $this->port));
        $transport->setUsername($this->username);
        $transport->setPassword($this->password);


        $mailer = new \Swift_Mailer($transport);
        $message = new \Swift_Message($this->subject);
        $message->setFrom($this->address);
        $message->setTo($this->target);
        $message->setBody($body);

        return $mailer->send($message) ? true : false;
    }
}