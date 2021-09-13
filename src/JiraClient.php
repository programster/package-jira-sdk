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


    /**
     * Fetch issues from Jira.
     * @param string|null $project - optionally specify the project to get the issues of.
     * @return array - a collecton of Issue objects.
     * @throws Exceptions\ExceptionRequestFailed
     */
    public function getIssues(?string $project=null) : array
    {
        $issues = [];
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
        $response = $this->m_messagingClient->sendRequest($request);

        if ($response->getStatusCode() === 200)
        {
            $bodyObject = json_decode($response->getBody()->getContents(), true);
            $issuesArray = $bodyObject['issues'];

            foreach ($issuesArray as $issueArray)
            {
                $issues[] = Issue::createFromResponseArray($issueArray);
            }
        }
        else
        {
            throw new Exceptions\ExceptionRequestFailed($response);
        }

        return $issues;
    }


    public function getProjects() : array
    {
        $projects = [];
        $method = "GET";
        $url = "https://{$this->m_domain}.atlassian.net/rest/api/2/project";
        $request = $this->createRequest($method, $url);
        $response = $this->m_messagingClient->sendRequest($request);

        if ($response->getStatusCode() === 200)
        {
            $projectsArray = json_decode($response->getBody()->getContents(), true);

            foreach ($projectsArray as $pojectArray)
            {
                $projects[] = Project::createFromResponseArray($pojectArray);
            }
        }
        else
        {
            throw new Exceptions\ExceptionRequestFailed($response);
        }

        return $projects;
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

