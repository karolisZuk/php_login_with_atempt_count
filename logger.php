<?php
$GLOBALS['buttonIsVisible']=true;

function Init(){
  $buttonIsVisible=true;
  $counter = 0;
  $ip = grabIp();
  $result = checkDb($ip);
  checkIfVisited($result, $ip);
}

function getButtonStatus (){
  return $GLOBALS['buttonIsVisible'];
    }

function grabIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}
    else{$ip=$_SERVER['REMOTE_ADDR'];}
    $ip = ip2long($ip); //convert ip to long number
    return $ip;}

function checkDb($ip){
  $connect = mysqli_connect("localhost:8889", "root", "root", "vdu_test");
  $query = "SELECT * FROM log WHERE ip = '$ip'";
  $result = mysqli_query($connect, $query);
  return $result;
}

function checkIfVisited($result, $ip){
  require 'connect.php';
    //if user havent visited, write his ip to db.
    if(mysqli_num_rows($result)==0){
      $ip = mysqli_real_escape_string($connect, $ip);
      $counter = 1;
      $query = "INSERT INTO log(atempt, ip) VALUES ('$counter', '$ip')";
      if(mysqli_query($connect, $query)){
      }
    }else {
      //user has visited before. increase attempt number for his ip
      if(mysqli_num_rows($result) > 0)
      {
        $row = mysqli_fetch_array($result);
        $counter = $row["atempt"];
        $counter++;
        //write increased counter to db;
        $query = "UPDATE log SET atempt='$counter' WHERE ip = '$ip'";
        if(!mysqli_query($connect, $query)){echo 'Connection failed';}
        if($counter >=5) {
          $GLOBALS['buttonIsVisible'] = false;
        }
    }
  }
}// end of check if visited

 ?>
