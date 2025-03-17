<?php
  class sqlConnection {
	  
	  private $host;
	  private $user;
	  private $pass;
	  private $database;
	  private $conn;
	  private $connString;
	  private $query;
	  private $result;
	  // Initiate Sqlconnection
	  public function __construct(){
	  $this->host = "localhost";

		  $this->user = "root";

		  $this->pass = '+9Yj.naqj9!h';
		  $this->database = "aftech_db";
		  
		 $conn=$this->conn = mysqli_connect( $this->host,$this->user,$this->pass,$this->database) or die( "<center><span style='color:red; !!!</span></center>" );
		  
		  /*if( $this->conn ) {
			//mysql_query ("set character_set_results='utf8'");  
			$this->connString = mysql_select_db( $this->database ) or die( "<center><span style='color:red; font-weight:bold'>Database Error !!!</span></center>" );  
		  } */		  
		  	   
	  }
	  // Run query
	  public function fireQuery( $qry ) {
		  //echo $qry;
		  if( !empty( $qry ) ) {
			  $this->query = mysqli_query($this->conn, $qry );
			  return $this->query;
		  }	
		  else {
			  die( "<center><span style='color:red; font-weight:bold'>Database Table Error !!!</span></center>" );  
		  }
	  }
	    public function realString( $qry ) {
		  //echo $qry;
		  if( !empty( $qry ) ) {
			  $this->query = mysqli_real_escape_string($this->conn, $qry );
			  return $this->query;
		  }	
		  else {
			  die( "<center><span style='color:red; font-weight:bold'>Database Table Error !!!</span></center>" );  
		  }
	  }
	  	  public function lastId( $qry ) {  //echo $qry;
		 
			  $this->query = mysqli_insert_id($this->conn);
			  return $this->query;
		 
	  }
	  // Count Row
	  public function rowCount( $param ){
		  if(!empty( $param ) ){
			  return( mysqli_num_rows($param) );
		  }
	  }
	  // fetchAssoc
	  public function fetchAssoc( $param ){
			  if(!empty( $param ) ){
				  if( mysqli_num_rows( $param ) > 0 ) {
					  while( $rs = mysqli_fetch_assoc( $param ) ) {
					  $arr[] = $rs;	  			  
					  }
				  return $arr;	  
			  } else {
				 return NULL;
			  }
		  }
	  }
	  public function fetchAssocobject( $param ){
			  if(!empty( $param ) ){
				  if( mysqli_num_rows( $param ) > 0 ) {
					  while( $rs = mysqli_fetch_object( $param ) ) {
					  $arr[] = $rs;	  			  
					  }
				  return $arr;	  
			  } else {
				 return NULL;
			  }
		  }
	  }	  
	  // get All records from a query
  }
?>
