<?php

namespace app\commands\mailer\services\spark;

use app\commands\mailer\Recipient;
use app\commands\mailer\services\AbstractRecipientDecorator;

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