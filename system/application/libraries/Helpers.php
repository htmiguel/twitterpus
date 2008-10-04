<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Helpers
{

	function fix_date($date)
	{
		list($year, $month, $day) = split("-",$date);
		$date = date('F j, Y', mktime(0, 0, 0, $month, $day, $year));
		return $date;
	}

	function press_date($date)
	{
		list($year, $month, $day) = split("-",$date);
		$date = date('Y', mktime(0, 0, 0, $month, $day, $year));
		return $date;
	}

	function release_date_browse($date)
	{
		list($year, $month, $day) = split("-",$date);
		$date = date('Y', mktime(0, 0, 0, $month, $day, $year));
		return $date;
	}

	function artist_live_date($date)
	{
		list($year, $month, $day) = split("-",$date);
		$date = date('m.d.Y', mktime(0, 0, 0, $month, $day, $year));
		return $date;
	}

	function news_date($date)
	{
		list($year, $month, $day) = split("-",$date);
		list($day) = split(" ",$day);
		$date = date('F j, Y', mktime(0, 0, 0, $month, $day, $year));
		return $date;	
	}

	function rss_date($date)
	{
		list($year, $month, $day) = split("-",$date);
		list($day) = split(" ",$day);
		$date = date('r', mktime(0, 0, 0, $month, $day, $year));
		return $date;	
	}
	
	function get_date_segment($segment,$date)
	{
		list($year, $month, $day) = split("-",$date);
		switch($segment)
		{
			case "year":
			return $year;
			break;
			case "month":
			return $month;
			break;
		}
	}

} 

?>
