<?php

function time_emails_rules_event_info() {

  $events['time_emails_job_to_all'] = array(
    'label' => 'Email job to all sw',
    'group' => 'Time custom events',
    'help' => 'The current job will be emailed to all active support workers.',
    'variables' => array(),
    );

  $events['time_emails_job_to_all']['variables']['job'] = array(
    'label' => 'Job',
    'type' => 'node',
    'skip save' => TRUE,
    );
 
  $events['time_emails_job_assignees'] = array(
    'label' => 'Email assignees of current job',
    'group' => 'Time custom events',
    'help' => 'Assignees og the current job will be sent an email.',
    'variables' => array(),
    );

  $events['time_emails_job_assignees']['variables']['body_text'] = array(
    'label' => 'Body text',
    'type' => 'text',
    'skip save' => TRUE,
    );
 
  $events['time_emails_job_assignees']['variables']['job'] = array(
    'label' => 'Job',
    'type' => 'node',
    'skip save' => TRUE,
    );
 
  return $events;
}
