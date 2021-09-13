<?php

namespace Programster\Jira;


class Project
{
    private string $m_self; // url for the priority
    private int $m_id; // e.g. 3
    private string $m_key;
    private string $m_name;
    private string $m_projectTypekey; // e.g. "software"
    private ?string $m_simplified;
    private array $m_avatarUrls;
    private ?string $m_style;
    private ?bool $m_isPrivate;
    private ?array $m_properties;


    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : Project
    {
        $project = new Project();
        $project->m_self = $arrayForm['self'];
        $project->m_id = $arrayForm['id'];
        $project->m_key = $arrayForm['key'];
        $project->m_name = $arrayForm['name'];
        $project->m_projectTypekey = $arrayForm['projectTypeKey'];
        $project->m_simplified = $arrayForm['simplified'];
        $project->m_avatarUrls = $arrayForm['avatarUrls'];

        // These fields are only provided when specifically fetching project data rather than a project object provided
        // with an issue.
        $project->m_style = (isset($arrayForm['style'])) ? $arrayForm['style'] : null;
        $project->m_isPrivate = (isset($arrayForm['isPrivate'])) ? $arrayForm['isPrivate'] : null;
        $project->m_properties = (isset($arrayForm['properties'])) ? $arrayForm['properties'] : null;

        return $project;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getId() : string { return $this->m_id; }
    public function getKey() : string { return $this->m_key; }
    public function getName() : string { return $this->m_name; }
    public function getProjectTypeKey() : string { return $this->m_projectTypekey; }
    public function getSimplified() : ?string { return $this->m_simplified; }
    public function getAvatarUrls() : array { return $this->m_avatarUrls; }
    public function getStyle() : ?string { return $this->m_style; }
    public function getIsPrivate() : ?bool { return $this->m_isPrivate; }
    public function getProperties() : ?array { return $this->m_properties; }
}