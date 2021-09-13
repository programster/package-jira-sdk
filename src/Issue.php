<?php

/*
 * An object to represent an issue in Jira
 */

namespace Programster\Jira;

class Issue
{
    private string $m_expand;
    private string $m_id;
    private string $m_self;
    private string $m_key;
    private string $m_statusCategoryChangeDate;
    private $m_issueType;
    private ?int $m_timeSpent;
    private Project $m_project;
    private $m_fixVersions;
    private ?int $m_aggregatetimespent;
    private ?string $m_resolution;
    private ?string $m_resolutionDate;
    private float|int $m_workRatio;
    private ?string $m_lastViewed;
    private Watches $m_watches;
    private int $m_createdAt;
    private Priority $m_priority; // priority object
    private array $m_labels;
    private $m_timeEstimate;
    private $m_aggregateTimeOriginalEstimate;
    private array $m_versions;
    private array $m_issueLinks;
    private ?string $m_assignee;
    private int $m_updated;
    private $m_status;
    private array $m_components;
    private ?string $m_timeOriginalEstimate;
    private ?string $m_description;
    private ?string $m_security;
    private ?string $m_aggregatetimeestimate;
    private string $m_summary;
    private User $m_creator; // user object
    private array $m_subtasks;
    private $m_reporter;
    private array $m_progress; // progress object
    private array $m_aggregateprogress; // progress object
    private $m_environment;
    private ?string $m_dueDate;
    private array $m_votes;



    private function __construct() {}


    public static function createFromResponseArray(array $arrayForm)
    {
        $issue = new Issue();
        //die(print_r($arrayForm, true));

        $issue->m_expand = $arrayForm['expand'];
        $issue->m_id = $arrayForm['id'];
        $issue->m_self = $arrayForm['self'];
        $issue->m_key = $arrayForm['key'];

        $fields = $arrayForm['fields'];

        $issue->m_statusCategoryChangeDate = $fields['statuscategorychangedate'];
        $issue->m_issueType = IssueType::createFromResponseArray($fields['issuetype']);
        $issue->m_timeSpent = $fields['timespent'];
        $issue->m_project = Project::createFromResponseArray($fields['project']);
        $issue->m_fixVersions = $fields['fixVersions'];
        $issue->m_aggregateTimeSpent = $fields['aggregatetimespent'];
        $issue->m_resolution = $fields['resolution'];
        $issue->m_resolutionDate = $fields['resolutiondate'];
        $issue->m_workRatio = $fields['workratio'];
        $issue->m_lastViewed = $fields['lastViewed'];
        $issue->m_watches = Watches::createFromResponseArray($fields['watches']);
        $issue->m_createdAt = strtotime($fields['created']);
        $issue->m_priority = Priority::createFromResponseArray($fields['priority']);
        $issue->m_labels = $fields['labels'];
        $issue->m_timeEstimate = $fields['timeestimate'];
        $issue->m_aggregateTimeOriginalEstimate = $fields['aggregatetimeoriginalestimate'];
        $issue->m_versions = $fields['versions'];
        $issue->m_issueLinks = $fields['issuelinks'];
        $issue->m_assignee = $fields['assignee'];
        $issue->m_updated = strtotime($fields['updated']);
        $issue->m_status = $fields['status'];
        $issue->m_components = $fields['components'];
        $issue->m_timeOriginalEstimate = $fields['timeoriginalestimate'];
        $issue->m_description = $fields['description'];
        $issue->m_security = $fields['security'];
        $issue->m_aggregateTimeEstimate = $fields['aggregatetimeestimate'];
        $issue->m_summary = $fields['summary'];
        $issue->m_creator = User::createFromResponseArray($fields['creator']);
        $issue->m_subtasks = $fields['subtasks'];
        $issue->m_reporter = User::createFromResponseArray($fields['reporter']);
        $issue->m_aggregateProgress = $fields['aggregateprogress'];
        $issue->m_environment = $fields['environment'];
        $issue->m_dueDate = $fields['duedate'];
        $issue->m_progress = $fields['progress'];
        $issue->m_votes = $fields['votes'];


        //die(print_r($fields, true));
        return $issue;
    }


    # Accessors
    public function getExpand() { return $this->m_expand; }
    public function getId() { return $this->m_id; }
    public function getSelf() { return $this->m_self; }
    public function getKey() { return $this->m_key; }
    public function getStatusCategoryChangeDate() { return $this->m_statusCategoryChangeDate; }
    public function getIssueType() { return $this->m_issueType; }
    public function getTimeSpent() { return $this->m_timeSpent; }
    public function getProject() { return $this->m_project; }
    public function getFixVersions() { return $this->m_fixVersions; }
    public function getAggregatetimespent() { return $this->m_aggregatetimespent; }
    public function getResolution() { return $this->m_resolution; }
    public function getResolutionDate() { return $this->m_resolutionDate; }
    public function getWorkRatio() : float|int { return $this->m_workRatio; }
    public function getLastViewed() : ?string { return $this->m_lastViewed; }
    public function getWatches() { return $this->m_watches; }
    public function getCreatedAt() : int { return $this->m_createdAt; }
    public function getPriority() : Priority { return $this->m_priority; }
    public function getLabels() { return $this->m_labels; }
    public function getTimeEstimate() { return $this->m_timeEstimate; }
    public function getAggregateTimeOriginalEstimate() { return $this->m_aggregateTimeOriginalEstimate; }
    public function getVersions() { return $this->m_versions; }
    public function getIssueLinks() { return $this->m_issueLinks; }
    public function getAssignee() { return $this->m_assignee; }
    public function getUpdated() { return $this->m_updated; }
    public function getStatus() { return $this->m_status; }
    public function getComponents() { return $this->m_components; }
    public function getTimeOriginalEstimate() { return $this->m_timeOriginalEstimate; }
    public function getDescription() { return $this->m_description; }
    public function getSecurity() { return $this->m_security; }
    public function getAggregatetimeestimate() { return $this->m_aggregatetimeestimate; }
    public function getSummary() { return $this->m_summary; }
    public function getCreator() { return $this->m_creator; }
    public function getSubtasks() { return $this->m_subtasks; }
    public function getReporter() { return $this->m_reporter; }
    public function getAggregateprogress() { return $this->m_aggregateprogress; }
    public function getEnvironment() { return $this->m_environment; }
    public function getDueDate() { return $this->m_dueDate; }
    public function getProgress() { return $this->m_progress; }
    public function getVotes() { return $this->m_votes; }
}
