<?php

namespace dkeysoft\mailer\services\spark;

use dkeysoft\mailer\Recipient;
use dkeysoft\mailer\services\AbstractRecipientDecorator;

class RecipientDecorator extends AbstractRecipientDecorator
{
    public function decorate()
    {
        $this->result = [];
        /** @var Recipient $recipient */
        foreach ($this->recipients as $recipient) {
            $this->result[] = [
                'address' => [
                    'name' => $recipient->getName(),
                    'email' => $recipient->getEmail()
                ],
                'substitution_data' => $recipient->getSubstitutionData(),
            ];
        }
    }
}