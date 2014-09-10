<?php 
class Util_Format_Schedule
{
	static public function toDateTimePt($datetime)
	{
		$schedule = explode(' ', $datetime);
		$date = explode('-', $schedule[0]);
		$hour = explode(':', $schedule[1]);		
		
		$date = implode('/',array_reverse($date));
		$hour = $hour[0] . ':' . $hour[1];
		
		$schedule = $date . ' ' . $hour;
		
		return $schedule;
	}
}