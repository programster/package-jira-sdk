<?php

namespace Programster\Jira\Exceptions;

class ExceptionRequestFailed extends \Exception
{
    private \Psr\Http\Message\ResponseInterface $m_response;


    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $this->m_response = $response;
        parent::__construct("Request failed");
    }


    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->m_response;
    }
}
