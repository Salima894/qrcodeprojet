<!DOCTYPE html>
<html dir="ltr" lang="fr">

<head>

    <?php 
  include "meRaviQr/qrlib.php";
  include "config.php";
  if(isset($_POST['create']))
  {

    $qrname = $_POST['form_name'];
    $qrprenom = $_POST['form_prenom'];
    $qrsex= $_POST['sex'];
    $qrdate= $_POST['form_date'];
    $qradresse= $_POST['form_adresse'];
    $qrtel= $_POST['form_tel'];
    $qremail =  $_POST['form_email'];
    $qrmdp =  $_POST['form_mdp'];
    $qrcmdp =  $_POST['form_cmdp'];
	
	$qrmalde = $_POST['form_name'];
    $qrtest = $_POST['form_prenom'];
    $qrtraitement= $_POST['sex'];
    $qrmedecin= $_POST['form_date'];
    $qrinf= $_POST['form_adresse'];
    
    $qrImgName = $qrUname.$qlname.rand(10 , 30);
    if($qrname=="" && $qrprenom=="" && $qrsex==false && $qrdate=="" && $qradresse=="" && $qrtel=="" && $qremail=="" && $qrmdp=="" && $qrcmdp==""
	&& $qrmalde==""  && $qrtest=="" && $qrtraitement=="" && $qrmedecin=="" && $qrinf=="")
    
	{
      echo "<script>alert('Please Enter Your informations For QR Code');</script>";
    }
    elseif($qrname=="")
    {
      echo "<script>alert('Please Enter Your firstName');</script>";
    }
    elseif($qrprenom=="")
    {
      echo "<script>alert('Please Enter Your LastName ');</script>";
    }
    elseif($qrsex==false)
    {
      echo "<script>alert('Please Enter Your sex');</script>";
    }
    elseif($qrdate=="")
    {
      echo "<script>alert('Please Enter Your date');</script>";
    }
	  elseif($qradresse=="")
    {
      echo "<script>alert('Please Enter Your adresse');</script>";
    }
	  elseif($qrtel=="")
    {
      echo "<script>alert('Please Enter Your phone');</script>";
    }
	   elseif($qremail=="")
    {
      echo "<script>alert('Please Enter Your email');</script>";
    }
    elseif($qrmdp != $_POST['form_cmdp'])
    {
      echo "<script>alert('Les 2 mots de passe sont différents');</script>";
    }
	 elseif($$qrmalde=="" )
    {
      echo "<script>alert('Please Enter Your maladies');</script>";
    }
	 elseif($qrtest=="")
    {
      echo "<script>alert('Please Enter Your test');</script>";
    }
	 elseif($qrtraitement=="")
    {
      echo "<script>alert('Please Enter Your traitement');</script>";
    }
	 elseif($qrmedecin=="")
    {
      echo "<script>alert('Entrer le nom du medecin');</script>";
    }
	 elseif($qrinf=="")
    {
      echo "<script>alert('Entrer le nom de l infirmiere');</script>";
    }
	
    else
    { //$qrname=="" && $qrprenom=="" && $qrsex==false && $qrdate=="" && $qradresse=="" && $qrtel=="" && $qremail=="" && $qrmdp=="" && $qrcmdp==""
	  //&& $qrmalde==""  && $qrtest=="" && $qrtraitement=="" && $qrmedecin=="" && $qrinf=="")
    $dev =  "© Dev by Me" . $_SERVER['HTTP_HOST'];
    $final = "Mon Prénom est : " . $qrprenom ."\n".
             "Mon Nom est : " . $qrname ."\n".
             "Ma date de naissance est :". $qrdate ."\n".
		     "Mon adresse est :". $qradresse ."\n".
			 "Mon numéro de télephone est :". $qrtel ."\n".
			 "Mon email est :". $qremail ."\n".
             "Ma maladies est : ". $qrmalde ."\n".
			 "Mon dernier test est : ". $qrtest ."\n".
			 "Mon traitement est". $qrtraitement ."\n".
			 "Mon medecin est : ". $qrmedecin ."\n".
			 "Mon infirmiére est : ". $qrinf ."\n".
             $dev;
    $qrs = QRcode::png($final,"userQr/$qrImgName.png","H","3","3");
    $qrimage = $qrImgName.".png";
    $workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/qrcode".$qrImgName.".png";
    $insQr = $meravi->insertQr($qrUname,$final,$qrimage,$qrlink);
    $insuser = $meravi->insertuser($fuid, $funom, $fuprenom, $fusexe, $fudatenaiss, $fuadresse, $futel, $fuemail);
	$insmalade = $meravi->insertmalade($luid, $lumaladies, $luanalyse, $lutraitement, $lumedecin, $luinfirmiere);
    if($insQr==true && $insuser==true && $insmalade==true)

    {
          echo "<script>alert('Thank You $qrname. Success Create Your QR Code'); window.location='CODEQR\index.php?success=$qrimage';</script>";
    }
    else
    {

      die(mysqli_error($meravi->conn));
    }
  }
 }
  ?>
  <?php 
  if(isset($_GET['success']))
  {
  ?>
  <div id="qrSucc">
  <div class="modal-content animate container">
    <?php 
    ?>
 
    <img src="userQr/<?php echo $_GET['success']; ?>" alt="">
    <?php 
$workDir = $_SERVER['HTTP_HOST'];
    $qrlink = $workDir."/CODEQR\userQr".$_GET['success'];
    ?>
     
    <input type="text" value="<?php echo $qrlink; ?>" readonly>
    <br><br>
<a href="download.php?download=<?php echo $_GET['success']; ?>">Download Now</a>
<br>
 <br><br>
    <a href="index.php">Go Back To Generate Again</a>
    
     </div></div>
  <?php
}
else
{
  ?>
<div id="id01" class="modal">

  <!--Formulaire-->

    <section class="divider layer-overlay overlay-deep" data-bg-img="images/bg/bg1.jpg">
      <div class="container">
        <div class="row pt-30">
          <div class="col-md-7">
            <h3 class="line-bottom mt-0 mb-30">FORMULAIRE DE MALADES </h3>
            <form id="contact_form" name="contact_form" class="form-transparent" action="mail.php" method="POST">
			  <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Nom  <small>*</small></label>
                    <input id="form_name" name="form_name"  value="<?php if(isset($_POST['create'])){ echo $_POST['form_name']; } ?>"class="form-control" type="text" placeholder="Entrer le Nom  " required=""  >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_prenom">Prénom <small>*</small></label>
                    <input id="form_prenom" name="form_prenom"  value="<?php if(isset($_POST['create'])){ echo $_POST['form_prenom']; } ?>" class="form-control required email" type="text" placeholder="Entrer le prénom">
                  </div>
                </div>
              </div>
			  <!--- form_name  form_prenom  sex    form_date form_adresse----->
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label style="display: block" for="form_name">Sexe <small>*</small></label>
                   <div style="display: inline-block;margin-right:6px"> 
				   <input id="homme" name="sex"  value="<?php if(isset($_POST['create'])){ echo $_POST['sex']; } ?>" type="radio" style="border:0;width:30%;height:2em;margin-right:5px">Homme
					<input id="femme" name="sex"   value="<?php if(isset($_POST['create'])){ echo $_POST['sex']; } ?>" type="radio" style="border:0;width:30%;height:2em;margin-right:5px">Femme</div>
                  </div>
                </div>
              </div>
			  
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_date">Date de naissance  <small>*</small></label>
                    <input id="form_date" name="form_date" class="form-control required" type="date" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_adresse">Adresse   <small>*</small></label>
                    <input id="form_adresse" name="form_adresse" class="form-control" type="text" placeholder="Entrer le mot de passe">
                  </div>
                </div>
              </div>
			  	  
               <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_tel">Numéro de telephone <small>*</small></label>
                    <input id="form_tel" name="form_tel" pattern="[0-9]{10}" class="form-control required" type="phone" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_email">Email   <small>*</small></label>
                    <input id="form_email" name="form_email" class="form-control" type="email" placeholder="Entrer l''email">
                  </div>
                </div>
              </div>			
                 <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_malade">Maladies  <small>*</small></label>
                    <input id="form_malade" name="form_malade"  value="<?php if(isset($_POST['create'])){ echo $_POST['form_malade']; } ?>" class="form-control" type="text" placeholder="Entrer le Nom de la maladie " required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_test">Analyse et test <small>*</small></label>
                    <input id="form_test" name="form_test" value="<?php if(isset($_POST['create'])){ echo $_POST['form_test']; } ?>" class="form-control required email" type="text" placeholder="Entrer le nom des analyses">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_traitement">Traitement <small>*</small></label>
                    <input id="form_traitement" name="form_traitement" value="<?php if(isset($_POST['create'])){ echo $_POST['form_traitement']; } ?>" class="form-control required" type="text" placeholder="Entrer le traitement">
                  </div>
                </div>
				
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_medecin">Medecin  <small>*</small></label>
                    <input id="form_medecin" name="form_medecin" value="<?php if(isset($_POST['create'])){ echo $_POST['form_medecin']; } ?>" class="form-control" type="text" placeholder="Entrer le nom du medecin">
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="form_inf">Infirmiers <small>*</small></label>
                    <input id="form_inf" name="form_inf"  value="<?php if(isset($_POST['create'])){ echo $_POST['form_inf']; } ?>"class="form-control required" type="text" placeholder="Entrer le nom de l''infirmiere">
                  </div>
                </div>
              </div>
		    <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_mdp">Mot de passe <small>*</small></label>
                    <input id="form_mdp" name="form_mdp" value="<?php if(isset($_POST['create'])){ echo $_POST['form_mdp']; } ?>"class="form-control required" type="text" placeholder="Entrer le mot de passe ">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_cmdp">Confirmation du Mot de passe   <small>*</small></label>
                    <input id="form_cmdp" name="form_cmdp" value="<?php if(isset($_POST['create'])){ echo $_POST['form_cmdp']; } ?>" class="form-control" type="text" placeholder="Entrer le mot de passe">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5"  name="create">Generate Your Own QR Code</button>
              </div>
             </form>
			 </div>
     </section>
         
  
    <?php 
}
   ?>
 
</body>

</html>