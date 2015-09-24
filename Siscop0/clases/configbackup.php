<?php
date_default_timezone_set('America/Caracas');
class backup_restore{


		
    // Constructor
 	function __construct($dbhost,$database,$dbUser,$dbPass,$tables="*") {
 	   //let me collact all data before we start	
		$this->host = $dbhost;
 		$this->database = $database;
 		$this->user = $dbUser;
		$this->pass = $dbPass;
		$fecha = date("d-m-y h.i.s");
 		$this->file = "backup\backupsiscop".$fecha.".sql";
		$this->tables =$tables;
	    $this->msg='';
	 	}
			
	// Connnect
	private function Connect() {
 		 mysql_connect($this->host, $this->user, $this->pass) or die(mysql_error());
		 mysql_select_db($this->database) or die(mysql_error());
 	}
	
	//Backup
	public function backup(){

		$this->Connect();
    
		//get list of the tables
			if($this->tables == '*')  {
			$this->tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
			$this->tables[] = $row[0];
			}
		}
		else  {
			$this->tables = is_array($this->tables) ? $this->tables : explode(',',$this->tables);
		}

        //processs each
			$return="";
		foreach($this->tables as $table)  {
		$result = @mysql_query('SELECT * FROM '.$table);
		$num_fields = @mysql_num_fields($result);    
		$return .= 'DROP TABLE '.$table.';buffernowdotcom';
		$row2 = @mysql_fetch_row(@mysql_query('SHOW CREATE TABLE '.$table));		
	    $return .= "\n\n".$row2[1].";buffernowdotcom\n\n";
	   
    
		while($row = @mysql_fetch_row($result))	{
        $return .= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
     
	    }
        $return .= ");buffernowdotcom\n";
	}
 
    $return.="\n\n\n";

  }
	
	
	//Lets Write A file
			if (file_exists($this->file)) unlink($this->file);
			$handle = fopen($this->file,'w+');
			fwrite($handle,$return);
			fclose($handle);
		

  
  //Ohh Wait ,When we create backup. lets save this time in log file
	if (file_exists('backup_log.log')) unlink('backup_log.log');
	$hnd =fopen('backup_log.log','w+');
	fwrite($hnd,date("Y-m-d H:i:s"));
	fclose($hnd);
  
  
  //yeah its all done
//	return "Se ha creado el backup correctamente!!";
echo "<script languaje='javascript'>alert('Se ha creado el backup correctamente')
document.location=('paneln.php')</script>";
}
}




?>