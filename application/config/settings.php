<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* Enabled Modules */

$config['modules'] = array(
    "dashboard" => array(
        "name" => "Dashboard",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-home"
    ),
    "reports" => array(
        "name" => "Reports",
        "enabled" => false,
        "link" => base_url('reports'),
        "icon" => "fa fa-bar-chart-o"
    ),
    "triage" => array(
        "name" => "Triage",
        "enabled" => true,
        "link" => base_url('triage'),
        "icon" => "fa fa-crosshairs"
    ),
    "tickets" => array(
        "name" => "Tickets",
        "enabled" => true,
        "link" => base_url('tickets'),
        "icon" => "fa fa-tags"
    ),
    "support" => array(
        "name" => "Support",
        "enabled" => false,
        "link" => base_url('support'),
        "icon" => "fa fa-support"
    ),
    "qa" => array(
        "name" => "QA",
        "enabled" => false,
        "link" => base_url('qa'),
        "icon" => "fa fa-bug"
    ),
    "crm" => array(
        "name" => "CRM",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-users"
    ),
    "pm" => array(
        "name" => "Project Management",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-users"
    ),
    "inbox" => array(
        "name" => "Inbox",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-inbox"
    ),
    "tasks" => array(
        "name" => "Tasks",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-tasks"
    ),
    "calendar" => array(
        "name" => "Calendar",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-calendar"
    ),
    "chat" => array(
        "name" => "Chat",
        "enabled" => false,
        "link" => base_url('dashboard'),
        "icon" => "fa fa-comments-o"
    ));
