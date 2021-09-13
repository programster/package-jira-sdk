<?php

namespace Programster\Jira;


class User
{
    private string $m_self; // url for the priority
    private string $m_accountId; // this is a UUID, not an integer.
    private array $m_avatarUrls;
    private string $m_displayName;
    private bool $m_active;
    private string $m_timeZone;
    private string $m_accountType; // e.g. "atlassian"



    private function __construct()
    {

    }


    /**
     * Create a new priority object from an array form from the Jira API.
     * @param array $arrayForm
     * @return Priority
     */
    public static function createFromResponseArray(array $arrayForm) : User
    {
        $user = new User();
        $user->m_self = $arrayForm['self'];
        $user->m_accountId = $arrayForm['accountId'];
        $user->m_avatarUrls = $arrayForm['avatarUrls'];
        $user->m_displayName = $arrayForm['displayName'];
        $user->m_active = $arrayForm['active'];
        $user->m_timeZone = $arrayForm['timeZone'];
        $user->m_accountType = $arrayForm['accountType'];
        return $user;
    }


    # Accessors
    public function getSelf() : string { return $this->m_self; }
    public function getId() : int { return $this->m_accountId; }
    public function geTAvatarUrls() : array { return $this->m_avatarUrls; }
    public function getDisplayName() : string { return $this->m_displayName; }
    public function getActive() : bool { return $this->m_active; }
    public function getTimeZone() : string { return $this->m_timeZone; }
    public function getAccountType() : string { return $this->m_accountType; } // e.g. "atlassian"
}