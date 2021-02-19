<?php
	/**
	 * 
	 */
	class Primehill
	{
		private $app_name;
		private $app_version;
		public function __construct()
		{
			$this->app_name = "Primehill";
			$this->app_version = "v1.3";
		}
		public function app_name()
		{
			return $this->app_name;
		}
		public function version()
		{
			return $this->version;
		}
		public function viewJson()
		{
			header("Content-Type: Application/json");
		}
		public function setSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function updateSession($name = '', $value = '')
		{
			$_SESSION[$name] = $value;
		}
		public function getSession($name = '')
		{
			return (!isset($_SESSION[$name])) ? NULL : $_SESSION[$name] ;
		}
		public function killSession($name = '')
		{
			unset($_SESSION[$name]);
			session_destroy();
			session_unset();
			return 200;
		}
		public function time_elapsed_string($datetime, $full = false)
	    {
			$now = new DateTime;
			$ago = new DateTime($datetime);
			$diff = $now->diff($ago);

			$diff->w = floor($diff->d / 7);
			$diff->d -= $diff->w * 7;

			$string = array(
				'y' => 'year',
				'm' => 'month',
				'w' => 'week',
				'd' => 'day',
				'h' => 'hour',
				'i' => 'min',
				's' => 'sec',
			);
			foreach ($string as $k => &$v) {
				if ($diff->$k) {
					$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
				} else {
					unset($string[$k]);
				}
			}

			if (!$full) $string = array_slice($string, 0, 1);
			return $string ? implode(', ', $string) . ' ago' : 'Just now';
	    }
	    public function secondsToTime($seconds) 
	    {
	        $dtF = new \DateTime('@0');
	        $dtT = new \DateTime("@$seconds");
	        $daterray = array(
	          'days' => $dtF->diff($dtT)->format('%a'),
	          'hours' => $dtF->diff($dtT)->format('%h'),
	          'minutes' => $dtF->diff($dtT)->format('%i'),
	          'seconds' => $dtF->diff($dtT)->format('%s'),
	          'full' => $dtF->diff($dtT)->format('%a days %h hours %i minutes %s seconds') 
	        );
	        return $daterray;
	    }
	    public function diffDateToSeconds($ts1, $ts2)
	    {
	        $ts1 = strtotime($ts1);
	        $ts2 = strtotime($ts2);
	        $seconds_diff = $ts2 - $ts1;
	        return $seconds_diff;
	    }
	    public function readableDate($input)
	    {
	      $convert = date("jS F, Y", strtotime($input));
	      return $convert;
	    }
	    public function addDate($setDate, $addedDays)
	    {
	      $date = new DateTime($setDate);
	      $date->add(new DateInterval('P'. $addedDays .'D'));
	      return $date->format('Y-m-d');
		}
		public function mountLimit($iterable, $limit) {
		    foreach ($iterable as $key => $value) {
		        if (!$limit--) break;
		        yield $key => $value;
		    }
		}
		public function cleaner($param = '')
		{
			return explode(".", $param)[0];
		}
	}