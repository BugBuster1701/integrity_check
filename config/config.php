<?php

/**
 * Contao Open Source CMS, Copyright (C) 2005-2014 Leo Feyer
 *
 * Contao Module "Integrity Check"
 *
 * @copyright  Glen Langer 2012..2016 <http://contao.ninja>
 * @author     Glen Langer (BugBuster)
 * @package    Integrity_Check 
 * @license    LGPL 
 * @filesource
 * @see	       https://github.com/BugBuster1701/integrity_check
 */

$GLOBALS['BE_MOD']['system']['integrity_check'] = array
(
        'tables'     => array('tl_integrity_check'),
        'icon'       => 'system/modules/integrity_check/assets/integrity_check.png',
        'stylesheet' => 'system/modules/integrity_check/assets/mod_integrity_check_be.css',
);

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('IntegrityCheck\IntegrityCheckHelper', 'checkExtensions');

/**
 * -------------------------------------------------------------------------
 * CRON JOBS
 * -------------------------------------------------------------------------
 *
 * Register methods to be executed at certain intervals.
 */
$GLOBALS['TL_CRON']['monthly'][] = array('IntegrityCheck\IntegrityCheck', 'checkFilesMonthly');
$GLOBALS['TL_CRON']['weekly'][]  = array('IntegrityCheck\IntegrityCheck', 'checkFilesWeekly');
$GLOBALS['TL_CRON']['daily'][]   = array('IntegrityCheck\IntegrityCheck', 'checkFilesDaily');
//from contao 2.11, hourly is possible.
$GLOBALS['TL_CRON']['hourly'][]  = array('IntegrityCheck\IntegrityCheck', 'checkFilesHourly');
//from contao 3.0, minutely is possible.
//You want it? Then activate it.
//$GLOBALS['TL_CRON']['minutely'][]  = array('IntegrityCheck\IntegrityCheck', 'checkFilesMinutely');
