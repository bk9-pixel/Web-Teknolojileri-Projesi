<?php
    echo"<h3>datalar geldi</h3>";
    $cins="";
  if($_POST['cinsiyet']==0){
    $cins="Erkek" ;
  } else if($_POST['cinsiyet']==1){
    $cins="Kadın"
  }

  $cins=> array(0=>"Erkek",1=>"Kadın");

    echo $cins[1];
    echo"<pre>";


    // var $a ="can"
    // $a=5;
    /*
    echo $_GET["Ad"];
    echo "<br>";
    echo $_GET["Soyad"];
      */

    echo $_POST["Ad"];
    echo "<br>";
    echo $_POST["Soyad"];

    echo

?>

<h1>Merhaba </h1>