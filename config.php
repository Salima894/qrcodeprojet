<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "";
  public $dbname = "howtoqr";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($qrUname,$final,$qrimage,$qrlink)
 	{
 			$sql = "INSERT INTO qrcodes(qrUsername,qrContent,qrImg,qrlink)
			VALUES('$qrUname','$final','$qrimage','$qrlink')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
	
  public function insertuser($qrname, $qrprenom, $qrsex, $qrdate, $qradresse, $qrtel, $qremail,$qrmdp,$qrcmdp)
  {
      $sql = "INSERT INTO utilisateur(nom, prenom, sexe, datenaiss, adresse, tel, email,mdp,cmdp) 
              VALUES( '$qrname', '$qrprenom', '$qrsex', '$qrdate', '$qradresse', '$qrtel', '$qremail' ,'$qrmdp','$qrcmdp')";
      $query = $this->conn->query($sql);
      return $query;  
  }
 
  public function insertmalade( $qrmalde, $qrtest, $qrtraitement, $qrmedecin, $qrinf)
  {
      $sql = "INSERT INTO malade(maladies, analyse, traitement, medecin, infirmiere) 
              VALUES('$qrmalde', '$qrtest', '$qrtraitement', '$qrmedecin', '$qrinf')";
      $query = $this->conn->query($sql);
      return $query;  
	  

  }   
  
  	public function insertenf($qrpere,$qrmere,$qrecole,$qrniveau)
 	{
 			$sql = "INSERT INTO `enfant`(`nompere`, `nommere`, `ecole`, `niveau`) VALUES('$qrpere','$qrmere','$qrecole','$qrniveau')";
 			$query = $this->conn->query($sql);
 			return $query;
 	}
	
    public function insertcasspeciaux($qrmal ,$qrges)
  {
      $sql = "INSERT INTO casspeciaux (maladies , situationcr) 
              VALUES('$qrmal', '$qrges')";
      $query = $this->conn->query($sql);
      return $query;  
	  

  }
  
 	public function displayImg()
 	{
 		$sql = "SELECT qrimg,qrlink from qrcodes where qrimg='$qrimage'";

 	}
}
$meravi = new RaviKoQr();