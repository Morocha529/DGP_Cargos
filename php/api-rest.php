<?php
/*1.  Retorna más de un registro: 38344242
  2.  Retorna 1 registro donde el alumnos es regular: 11709858
  3. Retorna 1 registro donde el alumno no es regular: 35821678
  4. Devuelve Error 404 (Alumno no existe): 11709856*/

  $nrodoc= isset($_POST['dni'])? $_POST['dni']:'';
  $username='ue_merendero';
  $password='MpV20*2cdc';

  $ch=curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://guarani3.unsa.edu.ar/guarani/gestion/rest/v2/merendero-unsa?numero_documento='.$nrodoc);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
  $data = curl_exec($ch);
  
  if(curl_errno($ch)) echo curl_error($ch);
  else 
    header('Content-Type: application/json');
    /*echo $data;
    echo "<br>";
    echo json_encode($data); 
    echo "<br>";*/
    echo json_encode($data); 
    curl_close($ch)
?>