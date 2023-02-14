<?php
  
  $email = $_REQUEST["tEmail"];
  
  echo $email;
  
  $to = $email;
  $subject="Subscripcion a Turbo Compas Inc";
  $txt = "El mensaje se envia con exito";
  $headers = "From: miguel.gro.padilla@gmail.com" . "\r\n";
  $res=mail($to,$subject,$txt,$headers);
  if ($res){
    echo "Correo enviado correctamente"; 
  };
  echo $res;

  header("Location: ./../index.php")
?>