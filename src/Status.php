<?php

namespace Programster\Jira;


class Status
{
    private string $m_self; // url for the priority
    private string $m_description; // e.g. "Medium"
    private string $m_iconUrl;
    private string $m_name;
    private int $m_id; // e.g. 3
    private array $m_statusCategory;


    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : Status
    {
        $status = new Status();
        $status->m_self = $arrayForm['self'];
        $status->m_iconUrl = $arrayForm['iconUrl'];
        $status->m_name = $arrayForm['name'];
        $status->m_id = $arrayForm['id'];
        $status->m_description = $arrayForm['description'];

        return $status;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getIconUrl() : string { return $this->m_iconUrl; }
    public function getName() : string { return $this->m_description; }
    public function getId() : string { return $this->m_id; }
    public function getDescription() : string { return $this->m_description; }
    public function getStatusCategory() : StatusCategory { return $this->m_statusCategory; }
}