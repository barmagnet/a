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
 
  return $events;
}
