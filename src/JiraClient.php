<?php

/*
 *
 */

namespace Programster\Jira;


class JiraClient
{
    private \Psr\Http\Client\ClientInterface $m_messagingClient;
    private \Psr\Http\Message\RequestFactoryInterface $m_requestFactory;
    private BasicAuthentication $m_auth;
    private string $m_domain;


    public function __construct(
        \Psr\Http\Client\ClientInterface $messagingClient,
        \Psr\Http\Message\RequestFactoryInterface $requestFactory,
        string $jiraDomain,
        BasicAuthentication $auth
    )
    {
        $this->m_messagingClient = $messagingClient;
        $this->m_requestFactory = $requestFactory;
        $this->m_domain = $jiraDomain;
        $this->m_auth = $auth;
    }


    public function getIssues(?string $project=null) : \Psr\Http\Message\ResponseInterface
    {
        $method = "GET";

        if ($project !== null)
        {
            $jqlString = "jql=project={$project}";
            //$jqlString .= "&order+by+duedate";
        }
        else
        {
            $jqlString = "";
        }

        $url = "https://{$this->m_domain}.atlassian.net/rest/api/2/search";

        if ($jqlString !== "")
        {
            $url .= "?{$jqlString}";
        }

        $request = $this->createRequest($method, $url);
        return $this->m_messagingClient->sendRequest($request);
    }


    public function getProjects() : \Psr\Http\Message\ResponseInterface
    {
        $method = "GET";
        $url = "https://{$this->m_domain}.atlassian.net/rest/api/2/project";
        $request = $this->createRequest($method, $url);
        return $this->m_messagingClient->sendRequest($request);
    }


    private function createRequest(string $method, string $uri, array $headers = [])
    {
        $httpBasicAuthValue = "Basic " . base64_encode("{$this->m_auth->getEmail()}:{$this->m_auth->getAuthToken()}");

        $request = $this->m_requestFactory->createRequest(
            $method,
            $uri
        );

        $request = $request->withHeader("content-Type", "application/json");
        $request = $request->withHeader("Authorization", $httpBasicAuthValue);

        return $request;
    }
}

