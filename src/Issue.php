<?php

/*
 * An object to represent an issue in Jira
 */

class Issue
{
    private string $m_expand;
    private string $m_id;
    private string $m_self;
    private string $m_key;
    private string $m_statusCategoryChangeDate;
    private $m_issueType;
    private ?int $m_timeSpent;
    private string $m_project;
    private string $m_fixVersions;
    private ?int $m_aggregatetimespent;
    private ?string $m_resolution;
    private ?string $m_resolutionDate;
    private int $m_workRatio;
    private ?int $m_lastViewed;
    private $m_watches;
    private $m_created;
    private $m_priority;
    private array $m_labels;
    private $m_timeEstimate;
    private $m_aggregateTimeOriginalEstimate;
    private array $m_versions;
    private array $m_issueLinks;
    private ?string $m_assignee;
    private $m_updated;
    private $m_status;
    private array $m_components;
    private ?string $m_timeOriginalEstimate;
    private ?string $m_description;
    private ?string $m_security;
    private ?string $m_aggregatetimeestimate;
    private string $m_summary;
    private $m_creator;
    private array $m_subtasks;
    private $m_reporter;
    private $m_aggregateprogress;
    private $m_environment;
    private ?string $m_dueDate;
    private $m_progress;
    private $m_votes;



    private function __construct() {}


    public static function createFromResponseArray(array $arrayForm)
    {
        $issue = new Issue();

        $issue->m_expand = $arrayForm['expand'];
        $issue->m_id = $arrayForm['id'];
        $issue->m_self = $arrayForm['self'];
        $issue->m_key = $arrayForm['key'];
        $issue->m_statusCategoryChangeDate = $arrayForm['statuscategorychangedate'];
        $issue->m_issueType = $arrayForm['issueType'];
        $issue->m_timeSpent = $arrayForm['timeSpent'];
        $issue->m_project = $arrayForm['project'];
        $issue->m_fixVersions = $arrayForm['fixVersions'];
        $issue->m_aggregateTimeSpent = $arrayForm['aggregatetimespent'];
        $issue->m_resolution = $arrayForm['resolution'];
        $issue->m_resolutionDate = $arrayForm['resolutiondate'];
        $issue->m_workRatio = $arrayForm['workratio'];
        $issue->m_lastViewed = $arrayForm['lastViewed'];
        $issue->m_watches = $arrayForm['watches'];
        $issue->m_created = $arrayForm['created'];
        $issue->m_priority = $arrayForm['priority'];
        $issue->m_labels = $arrayForm['labels'];
        $issue->m_timeEstimate = $arrayForm['timeEstimate'];
        $issue->m_aggregateTimeOriginalEstimate = $arrayForm['aggregateTimeOriginalEstimate'];
        $issue->m_versions = $arrayForm['versions'];
        $issue->m_issueLinks = $arrayForm['issueLinks'];
        $issue->m_assignee = $arrayForm['assignee'];
        $issue->m_updated = $arrayForm['updated'];
        $issue->m_status = $arrayForm['status'];
        $issue->m_components = $arrayForm['components'];
        $issue->m_timeOriginalEstimate = $arrayForm['timeOriginalEstimate'];
        $issue->m_description = $arrayForm['description'];
        $issue->m_security = $arrayForm['security'];
        $issue->m_aggregateTimeEstimate = $arrayForm['aggregatetimeestimate'];
        $issue->m_summary = $arrayForm['summary'];
        $issue->m_creator = $arrayForm['creator'];
        $issue->m_subtasks = $arrayForm['subtasks'];
        $issue->m_reporter = $arrayForm['reporter'];
        $issue->m_aggregateProgress = $arrayForm['aggregateprogress'];
        $issue->m_environment = $arrayForm['environment'];
        $issue->m_dueDate = $arrayForm['dueDate'];
        $issue->m_progress = $arrayForm['progress'];
        $issue->m_votes = $arrayForm['votes'];

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
    public function getWorkRatio() { return $this->m_workRatio; }
    public function getLastViewed() { return $this->m_lastViewed; }
    public function getWatches() { return $this->m_watches; }
    public function getCreated() { return $this->m_created; }
    public function getPriority() { return $this->m_priority; }
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
