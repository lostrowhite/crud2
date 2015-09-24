<?php
class backup_restore{


		
    // Constructor
 	function __construct($dbhost,$database,$dbUser ,$dbPass ,$tables="*",$file) {
 	   //let me collact all data before we start	
		$this->host = $dbhost;
 		$this->database = $database;
 		$this->user = $dbUser;
		$this->file=$file;
 		$this->pass = $dbPass ;
 		$this->tables =$tables;
	    $this->msg='';
	 	}
			
	// Connnect
	private function Connect() {
 		 mysql_connect($this->host, $this->user, $this->pass) or die(mysql_error());
		 mysql_select_db($this->database) or die(mysql_error());
 	}

//Restore
  public function restore($file=""){
  global $common_path;
            if ($file<>""){
                $this->file=$file;
            }

            $this->Connect();

            if (file_exists($this->file))
  $lines = file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            else {
            return "File is missing ,Please make backup";
            exit;
            }

  $buffer = '';

            foreach ($lines as $line) {

  // Skipping comments
  if (substr(ltrim($line), 0, 2) == '--')
  continue;

                    if (substr($line, -16) != ";buffernowdotcom") {
  // Add to buffer
  $buffer .= $line;
  // Next line
  continue;
  }

                // Skip lines containing EOL
  if (($line = trim($line)) == '')
  continue;
                else
  if ($buffer) {
  $line = $buffer . $line;
  // reset the buffer
  $buffer = '';
  }
  // clean it
                $line = trim($line,"buffernowdotcom");
  $line = substr($line, 0, -1);

                //// here we go
                $result = @mysql_query($line);
  ////

                if (!$result ) {
                //check why ignoring ?
                //is it encounter with drop table ?
                //and table not in the database(already removed)

                if(strstr($line, "DROP TABLE")){
                //Encounter with DROP Table,but table already dropped.Don'nt worry countinue.
                 continue;
                 }

                 else{
  $this->msg = mysql_error() ;
                return $this->msg;
                    break;
                }

  }

  }

           // $this->msg ="Sucessfullly restored";


       // return $this->msg;
	   return "Sucessfullly restored";
  }


}




?>