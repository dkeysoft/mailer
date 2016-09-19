<?php

namespace dkeysoft\mailer\services\spark;

use dkeysoft\mailer\services\AbstractService;
use GuzzleHttp\Client;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use SparkPost\SparkPost;
use SparkPost\SparkPostPromise;

class Service extends AbstractService
{
    /**
     * @var SparkPost service which has post method
     */
    protected $service;

    /**
     * @var SparkPostPromise or SparkPostResponse depending on sync or async request
     */
    protected $promise;

    public function __construct()
    {
        $config = include 'config.php';

        $httpAdapter = new GuzzleAdapter(new Client());
        $this->service = new SparkPost($httpAdapter, ['key' => $config['api_key']]);
    }

    public function build()
    {
        $decorator = new RecipientDecorator();
        $decorator
            ->setRecipients($this->recipients)
            ->decorate();

        $this->post = [
            'content' => [
                'from' => [
                    'name' => $this->from_name,
                    'email' => $this->from_email,
                ],
                'subject' => $this->subject,
                'html' => $this->template_html,
                'text' => $this->template_text
            ],
            'substitution_data' => $this->substitution_data,
            'recipients' => $decorator->getResult()
        ];

    }

    public function post()
    {
        $this->promise = $this->service->transmissions->post($this->post);
        try {
            $response = $this->promise->wait();
            echo $response->getStatusCode()."\n";
        } catch (\Exception $e) {
            echo $e->getCode()."\n";
            echo $e->getMessage()."\n";
        }

        //print_r($this->post);
    }
}