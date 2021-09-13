<?php

namespace Programster\Jira;


class Watches
{
    private string $m_self; // url for the priority
    private int $m_watchCount;
    private int $m_isWatching;


    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : Watches
    {
        $object = new Watches();
        $object->m_self = $arrayForm['self'];
        $object->m_watchCount = $arrayForm['watchCount'];
        $object->m_name = $arrayForm['isWatching'];
        return $object;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getWatchCount() : string { return $this->m_watchCount; }
    public function getIsWatching() : string { return $this->m_isWatching; }
}

