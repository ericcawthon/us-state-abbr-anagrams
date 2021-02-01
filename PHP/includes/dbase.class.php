<?php
class DBase
{

	var $link;

	function __construct()
	{
		$this->link = mysqli_connect(
			DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME
		);
	}	


	function sanitize_text($text)
	{
		return mysqli_real_escape_string($this->link, $text);
	}

	// run given insert query and return success flag
	function run_insert($query)	
	{
		$result = mysqli_query($this->link, $query);

		return $result;
    }
    
    // grab the last ID insert
    function report_insert_id()	
	{
		return mysqli_insert_id($this->link);
	}

	// run given update query and return success flag
	function run_update($query)	
	{
		$result = mysqli_query($this->link, $query);

		return $result;
    }
  
	// run given delete query and return success flag
    function run_delete($query)	
	{
		$result = mysqli_query($this->link, $query);

		return $result;
	}

	// run given query and return a single array of values
	function get_row($query)	
	{
		$result = mysqli_query($this->link, $query);

		return $result->fetch_assoc();
	}


	// run given query and return an array of rows
	function get_rows($query)	
	{
		$result = mysqli_query($this->link, $query);

		$results = array();
		while($r=$result->fetch_assoc()) {
			 $results[] = $r;
		}
		return $results;
	}

	// run given query and return a single array of the return field specified
	function get_result_array($query, $field)	
	{
		$result = mysqli_query($this->link, $query);

		$results = array();
		while($r=$result->fetch_assoc()) {
			 $results[$r[$field]] = $r[$field];
		}
		return $results;
    }
    
    	// run given query and return a single array of the return field specified
	function get_result_flat($query, $field)	
	{
		$result = mysqli_query($this->link, $query);

		$results = array();
		while($r=$result->fetch_assoc()) {
			 $results[] = $r[$field];
		}
		return $results;
	}

}
