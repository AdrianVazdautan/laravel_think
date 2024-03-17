<?php
	if(!function_exists('getTimeAgo')){
		function getTimeAgo($date){
			#START : INCLUDE languagesTime.php
				require "src/languagesTime.php";
				$t_year    = $languagesTime[$selectedLanguage]['yearAgo'];
				$t_years   = $languagesTime[$selectedLanguage]['yearsAgo'];
				$t_month   = $languagesTime[$selectedLanguage]['monthAgo'];
				$t_months  = $languagesTime[$selectedLanguage]['monthsAgo'];
				$t_day     = $languagesTime[$selectedLanguage]['dayAgo'];
				$t_days    = $languagesTime[$selectedLanguage]['daysAgo'];
				$t_hour    = $languagesTime[$selectedLanguage]['1HourAgo'];
				$t_hours   = $languagesTime[$selectedLanguage]['hoursAgo'];
				$t_minute  = $languagesTime[$selectedLanguage]['minuteAgo'];
				$t_minutes = $languagesTime[$selectedLanguage]['minutesAgo'];
				$t_second  = $languagesTime[$selectedLanguage]['secondAgo'];
				$t_seconds = $languagesTime[$selectedLanguage]['secondsAgo'];
				$t_now     = $languagesTime[$selectedLanguage]['Now'];
			#END
			#START : Calculate difference
					date_default_timezone_set('Europe/Chisinau');
				#Obtain
					$MySQL_date = $date;
					$NOW_date   = date('Y-m-d H:i:s');
				#Proccesing
					#Year
						$date_year   = substr($NOW_date, 0, 4) - substr($MySQL_date, 0, 4);
					#Month
						$date_month  = substr($NOW_date, 5, 2) - substr($MySQL_date, 5, 2);
					#Day
						$date_day    = substr($NOW_date, 8, 2) - substr($MySQL_date, 8, 2);
					#Hour
						$date_hour   = substr($NOW_date, 11, 2) - substr($MySQL_date, 11, 2);
					#Minute
						$date_minute = substr($NOW_date, 14, 2) - substr($MySQL_date, 14, 2);
					#Second
						$date_second = substr($NOW_date, 17, 2) - substr($MySQL_date, 17, 2);
			#END
			#START : ECHO IN MY FORMAT
				#YEAR
					if($date_year == 1){
						return $t_year;
					}
				#YEARS
					elseif($date_year > 1){
						return $date_year." ".$t_years;
					}
				#ELSE
					elseif($date_year == 0){
						#MONTH
							if($date_month == 1){
								return $t_month;
							}
						#MONTHS
							elseif($date_month > 1){
								return $date_month." ".$t_months;
							}
						#ELSE
							elseif($date_month == 0){
								#DAY
									if($date_day == 1){
										return $t_day;
									}
								#DAYS
									elseif($date_day > 1){
										return $date_day." ".$t_days;
									}
								#ELSE
									elseif($date_day == 0){
										#HOUR
											if($date_hour == 1){
												return $t_hour;
											}
										#HOURS
											elseif($date_hour > 1){
												return $date_hour." ".$t_hours;
											}
										#ELSE
											elseif($date_hour == 0){
												#MINUTE
													if($date_minute == 1){
														return $t_minute;
													}
												#MINUTES
													elseif($date_minute > 1){
														return $date_minute." ".$t_minutes;
													}
												#ELSE
													elseif($date_minute == 0){
														#SECOND
															if($date_second == 1){
																return $t_second;
															}
														#SECONDS
															elseif($date_second > 1){
																return $date_second." ".$t_seconds;
															}
														#ELSE
															elseif($date_second == 0){
																#NOW
																	return $t_now;
															}
													}
											}
									}
							}
					}
			#END
		}
	}
?>