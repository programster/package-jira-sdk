<?php

/*
 *
 */

namespace Programster\Jira;

class BasicAuthentication
{
    private string $m_authToken;
    private string $m_email;


    public function __construct(string $email, string $authToken)
    {
        $this->m_email = $email;
        $this->m_authToken = $authToken;
    }

    public function getAuthToken() : string
    {
        return $this->m_authToken;
    }


    public function getEmail() : string
    {
        return $this->m_email;
    }
}

