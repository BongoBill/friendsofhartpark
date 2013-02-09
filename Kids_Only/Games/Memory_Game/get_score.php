<?php
  // Add spaces to string
  function formatString($var, $length) {
      $ret = $var;
      if(strlen($ret) > $length) {
          $ret = substr($ret, 0, $length);
      }
      $n = strlen($ret);
      for($i = 0; $i < strlen($ret); $i++) {
          if(ord(substr($ret, $i, 1)) > 192) {
              $n--; // UNICODE, count only 1x
              $i++;
          }
      }
      $n = $length - $n;
      if($n > 0) {
          $ret = $var.str_repeat("%20", $n);
      }
      return $ret;
  }
  
  // Sort function used by usort
  function sortfunc($val1, $val2) {
      return ($val1["p"] < $val2["p"]);
  }

  // Count of highscore entries
  $count = 10;
  if(isset($HTTP_GET_VARS['count'])) {
      $count = $HTTP_GET_VARS['count'];
  }
  
  // Header
  $s1 = formatString("Points", 7);
  $s2 = formatString("Name", 22);
  $s3 = formatString("Time", 5);
  $s4 = formatString("Att.", 5);
  $s5 = formatString("Lev.", 5);
  $s6 = formatString("Date", 16);
  $score = $s1.$s2.$s3.$s4.$s5.$s6.chr(10);

  // Read entries from file into an array
  $i = 0;
  $fp = fopen("memory_highscores.dat", "r");
  while($strLine = fgets($fp, 100)) {
      $arr = split(chr(9), $strLine);
      $arrarr{$i} = array("p" => $arr[0], "n" => $arr[1], "d" => $arr[2], "l" => $arr[3], "t" => $arr[4], "a" => $arr[5]);
      $i++;
  }
  fclose($fp);

  // Sort the array
  usort($arrarr, sortfunc);

  // Print the array
  $i = 1;
  while(list($id, $val) = each($arrarr)) {
      if($i > $count) {
          break;
      }
      $s1 = formatString($arrarr{$id}{"p"}, 7);
      $s2 = formatString($arrarr{$id}{"n"}, 22);
      $s3 = formatString($arrarr{$id}{"t"}, 5);
      $s4 = formatString($arrarr{$id}{"a"}, 5);
      $s5 = formatString($arrarr{$id}{"l"}, 5);
      $s6 = formatString($arrarr{$id}{"d"}, 16);
      $score = $score.$s1.$s2.$s3.$s4.$s5.$s6.chr(10);
      $i++;
  }
  echo "&txtScore="."$score"; // Flash variable, attached to the highscore textfield
?>

