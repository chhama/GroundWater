<?php

class BackupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//return "Hello";
		return View::make('backup.index');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$host = Config::get('database.connections.mysql.host');		//'localhost';
		$user = Config::get('database.connections.mysql.username');	//'root';
		$pass = Config::get('database.connections.mysql.password');	//'';
		$name = Config::get('database.connections.mysql.database');	//'groundwater_db';
		$tables = '*';
		
		$link = mysql_connect($host,$user,$pass);
		mysql_select_db($name,$link);
		
		//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		
		$return = "DROP DATABASE IF EXISTS `".$name."`;\n";
		$return .= "CREATE DATABASE IF NOT EXISTS `".$name."` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;\n USE `".$name."`;";
		//cycle through
		foreach($tables as $table)
		{
			$result .=  $resulttable = mysql_query('SELECT * FROM ' . $table);
			$num_fields = mysql_num_fields($resulttable);
			
			//$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysql_fetch_row($resulttable))
				{
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = str_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";
		}
		
		//save file
		date_default_timezone_set('Asia/Calcutta');
		$handle = fopen('backup/db-backup-'.date("Y-m-d-h-i-s-a").'.sql','w+');
		fwrite($handle,$return);
		fclose($handle);

		return Redirect::to('backups');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		ini_set('memory_limit', '5120M');
		set_time_limit ( 0 );
		
		$dzImportBox = $_POST['dzImportBox'];
		
		$dbms_schema = "backup/$dzImportBox";

		
		$sql_query = @fread(@fopen($dbms_schema, 'r'), @filesize($dbms_schema)) or die('problem ');
	//$sql_query = remove_remarks($sql_query);
			$lines = explode("\n", $sql_query);
		
		   // try to keep mem. use down
		   $sql_query = "";
		
		   $linecount = count($lines);
		   $output = "";
		
		   for ($i = 0; $i < $linecount; $i++)
		   {
			  if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0))
			  {
				 if (isset($lines[$i][0]) && $lines[$i][0] != "#")
				 {
					$output .= $lines[$i] . "\n";
				 }
				 else
				 {
					$output .= "\n";
				 }
				 // Trading a bit of speed for lower mem. use here.
				 $lines[$i] = "";
			  }
		   }
		$sql_query = $output;
		
	//$sql_query = split_sql_file($sql_query, ';\n');
			   // Split up our string into "possible" SQL statements.
		   $tokens = explode(";\n", $sql_query);
		
		   // try to save mem.
		   $sql_query = "";
		   $output = array();
		
		   // we don't actually care about the matches preg gives us.
		   $matches = array();
		
		   // this is faster than calling count($oktens) every time thru the loop.
		   $token_count = count($tokens);
		   for ($i = 0; $i < $token_count; $i++)
		   {
			  // Don't wanna add an empty string as the last thing in the array.
			  if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0)))
			  {
				 // This is the total number of single quotes in the token.
				 $total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
				 // Counts single quotes that are preceded by an odd number of backslashes,
				 // which means they're escaped quotes.
				 $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
		
				 $unescaped_quotes = $total_quotes - $escaped_quotes;
		
				 // If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
				 if (($unescaped_quotes % 2) == 0)
				 {
					// It's a complete sql statement.
					$output[] = $tokens[$i];
					// save memory.
					$tokens[$i] = "";
				 }
				 else
				 {
					// incomplete sql statement. keep adding tokens until we have a complete one.
					// $temp will hold what we have so far.
					$temp = $tokens[$i] . ";\n";
					// save memory..
					$tokens[$i] = "";
		
					// Do we have a complete statement yet?
					$complete_stmt = false;
		
					for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++)
					{
					   // This is the total number of single quotes in the token.
					   $total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
					   // Counts single quotes that are preceded by an odd number of backslashes,
					   // which means they're escaped quotes.
					   $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);
		
					   $unescaped_quotes = $total_quotes - $escaped_quotes;
		
					   if (($unescaped_quotes % 2) == 1)
					   {
						  // odd number of unescaped quotes. In combination with the previous incomplete
						  // statement(s), we now have a complete statement. (2 odds always make an even)
						  $output[] = $temp . $tokens[$j];
		
						  // save memory.
						  $tokens[$j] = "";
						  $temp = "";
		
						  // exit the loop.
						  $complete_stmt = true;
						  // make sure the outer loop continues at the right point.
						  $i = $j;
					   }
					   else
					   {
						  // even number of unescaped quotes. We still don't have a complete statement.
						  // (1 odd and 1 even always make an odd)
						  $temp .= $tokens[$j] . ";\n";
						  // save memory.
						  $tokens[$j] = "";
					   }
		
					} // for..
				 } // else
			  }
		   }
		
		$sql_query = $output;
		
		$host = Config::get('database.connections.mysql.host');		//'localhost';
		$user = Config::get('database.connections.mysql.username');	//'root';
		$pass = Config::get('database.connections.mysql.password');	//'';
		mysql_connect($host,$user,$pass) or die('error connection');

		$i=1;
		foreach($sql_query as $sql){
			mysql_query($sql) or die(mysql_error()."<br>".$sql.'error in query');
		}

		return Redirect::to('backups');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
