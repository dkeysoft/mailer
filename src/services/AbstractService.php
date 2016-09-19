<?php

namespace dkeysoft\mailer\services;

use dkeysoft\mailer\Recipient;

abstract class AbstractService
{
    /**
     * @var array Data which will be sent by API
     */
    protected $post;
    /**
     * @var string From this name letters will be sent
     */
    protected $from_name;
    /**
     * @var string From this email letters will be sent
     */
    protected $from_email;
    /**
     * @var string The subject of letters
     */
    protected $subject;
    /**
     * @var Recipient[] Recipient objects
     */
    protected $recipients;
    /**
     * @var string with HTML template
     */
    protected $template_html;
    /**
     * @var string with TEXT template
     */
    protected $template_text;
    /**
     * @var array with substitution data,
     * example, ['name' => 'Joan Black'], and in template you can use {{name}}
     */
    protected $substitution_data;


    /**
     * @param string $from_name From this name letters will be sent
     * @return self
     */
    public function setFromName($from_name)
    {
        $this->from_name = $from_name;
        return $this;
    }

    /**
     * @param string $from_email From this email letters will be sent
     * @return self
     */
    public function setFromEmail($from_email)
    {
        // TODO check email or throw Exception
        $this->from_email = $from_email;
        return $this;
    }

    /**
     * @param string $subject The subject of letters
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param Recipient[] $recipients Recipient objects
     * @return self
     */
    public function setRecipients(array $recipients)
    {
        $this->recipients = $recipients;
        return $this;
    }

    /**
     * @param string $template HTML template
     * @return self
     */
    public function setTemplateHtml($template)
    {
        $this->template_html = $template;
        return $this;
    }

    /**
     * @param string $template TEXT template
     * @return self
     */
    public function setTemplateText($template)
    {
        $this->template_text = $template;
        return $this;
    }

    /**
     * @param array $data
     * @return self
     */
    public function setSubstitutionData(array $data)
    {
        $this->substitution_data = $data;
        return $this;
    }

    /**
     * This method builds service before sending
     */
    abstract public function build();

    /**
     * This method makes "send"
     */
    abstract public function post();

    public function send()
    {
        $this->beforeSend();
        $this->post();
        $this->afterSend();
    }

    public function beforeSend()
    {
        // TODO write logs
    }

    public function afterSend()
    {
        // TODO write logs
    }
}