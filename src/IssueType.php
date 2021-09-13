<?php

namespace Programster\Jira;


class IssueType
{
    private string $m_self; // url for the priority
    private int $m_id; // e.g. 3
    private string $m_description;
    private string $m_iconUrl;
    private string $m_name; // e.g. "Medium"
    private ?string $m_subTask;
    private int $m_avatarId;
    private int $m_hierarchyLevel;



    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : IssueType
    {
        $priority = new IssueType();
        $priority->m_self = $arrayForm['self'];
        $priority->m_iconUrl = $arrayForm['iconUrl'];
        $priority->m_name = $arrayForm['name'];
        $priority->m_id = $arrayForm['id'];
        return $priority;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getId() : string { return $this->m_id; }
    public function getDescription() : string { return $this->m_description; }
    public function getIconUrl() : string { return $this->m_iconUrl; }
    public function getName() : string { return $this->m_name; }
    public function getSubTask() : ?string { return $this->m_subTask; }
    public function getAvatarId() : int { return $this->m_avatarId; }
    public function getHierarchyLevel() : int { return $this->m_hierarchyLevel; }
}