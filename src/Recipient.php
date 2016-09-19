<?php

namespace dkeysoft\mailer;

class Recipient
{
    private $name;
    private $email;
    private $substitution_data;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setSubstitutionData($data)
    {
        $this->substitution_data = $data;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSubstitutionData()
    {
        return $this->substitution_data;
    }
}