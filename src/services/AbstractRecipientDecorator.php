<?php

namespace dkeysoft\mailer\services;

use dkeysoft\mailer\Recipient;

abstract class AbstractRecipientDecorator
{
    /**
     * @var Recipient[]
    */
    protected $recipients;
    /**
     * @var array
     */
    protected $result;

    abstract public function decorate();

    public function setRecipients(array $recipients)
    {
        $this->recipients = $recipients;
        return $this;
    }

    public function getResult()
    {
        return $this->result;
    }
}