<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
require_once('Smarty_setup.php');
require_once('user_privileges/default_module_view.php');

global $mod_strings, $app_strings, $currentModule, $current_user, $theme, $log, $singlepane_view;

$smarty = new vtigerCRM_Smarty();
$singlepane_view = 'true';
require_once 'modules/Vtiger/DetailView.php';
if ($focus->column_fields['date_end']=='') {
	$date = $focus->column_fields['date_start'];
	$time = $focus->column_fields['time_start'];
	list($year, $month, $day) = split('-', $date);
	list($hour, $minute) = split(':', $time);
	$starttime = mktime($hour, $minute, 0, $month, $day, $year);
	$counter = time()-$starttime;
	$smarty->assign('SHOW_WATCH', 'started');
	$smarty->assign('WATCH_COUNTER', $counter);
}
else {
	$smarty->assign('SHOW_WATCH', 'halted');
	$smarty->assign('WATCH_DISPLAY', $focus->column_fields['totaltime']);
}

$smarty->display('DetailView.tpl');
?>