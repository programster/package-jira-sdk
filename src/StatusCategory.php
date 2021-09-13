<?php

namespace Programster\Jira;


class StatusCategory
{
    private string $m_self; // url for the priority
    private int $m_id; // e.g. 3
    private string $m_key;
    private string $m_colorName;
    private string $m_name;


    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : StatusCategory
    {
        $statusCategory = new StatusCategory();
        $statusCategory->m_self = $arrayForm['self'];
        $statusCategory->m_id = $arrayForm['id'];
        $statusCategory->m_key = $arrayForm['key'];
        $statusCategory->m_colorName = $arrayForm['colorName'];
        $statusCategory->m_name = $arrayForm['name'];
        return $statusCategory;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getId() : string { return $this->m_id; }
    public function getKey() : string { return $this->m_key; }
    public function getColorName() : string { return $this->m_colorName; }
    public function getName() : string { return $this->m_name; }
}