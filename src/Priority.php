<?php

namespace Programster\Jira;


class Priority
{
    private string $m_self; // url for the priority
    private string $m_iconUrl;
    private string $m_name; // e.g. "Medium"
    private int $m_id; // e.g. 3


    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : Priority
    {
        $priority = new Priority();
        $priority->m_self = $arrayForm['self'];
        $priority->m_iconUrl = $arrayForm['iconUrl'];
        $priority->m_name = $arrayForm['name'];
        $priority->m_id = $arrayForm['id'];
        return $priority;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getIconUrl() : string { return $this->m_iconUrl; }
    public function getName() : string { return $this->m_name; }
    public function getId() : string { return $this->m_id; }
}