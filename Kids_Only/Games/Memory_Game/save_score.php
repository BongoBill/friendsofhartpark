<?php
  // Append the score to file
  $fp = fopen("memory_highscores.dat", "a");
  foreach($HTTP_GET_VARS as $var) { 
    fputs($fp, "$var" . chr(9)); 
  }
  fputs($fp, chr(10)); 
  fclose($fp);
?>
