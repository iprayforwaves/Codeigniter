<?php
/**
* Date dropdown helper 
* builds form dropdown for day, month and year on a rolling basis
*/
 
function make_days($prefix='', $time=null)
{
	if(!$time)
	{
	$time = time();
	}
	 	 
	$days = array();
	for($day = 1; $day <=31; $day++ ) {
	$days[$day] = $day;
	}
	 
	$date_dropdowns = form_dropdown($prefix.'day', $days, date("d", $time));
	 
	return $date_dropdowns;
}

function make_months($prefix='', $time=null)
{
	if(!$time)
	{
	$time = time();
	}
	 
	$months = array();
	$currentMonth = (int)date('m');
	for($x = $currentMonth; $x < $currentMonth+12; $x++) {
	$month = date('F', mktime(0, 0, 0, $x, 1));
	$months[$month] = $month;
	}
	 	 
	$date_dropdowns = form_dropdown($prefix.'month', $months, date("F", $time));
		 
	return $date_dropdowns;
}

function make_years($prefix='', $time=null)
{
	if(!$time)
	{
	$time = time();
	}
	 
	$years = array(
	date("Y") => date("Y")
	);
	
	for($i=1; $i<=10; $i++){
		$y = 365 * $i;
		$oneYearOn = date('Y',strtotime(date("Y-m-d", mktime()) . " + ".$y." day"));
		$years[] = $oneYearOn;
	}
	 	 
	$date_dropdowns = form_dropdown($prefix.'year', $years, date("Y", $time));
	 
	return $date_dropdowns;
}