<!doctype html public "-//w3c//dtd html 4.0 transitional//en">

<html>
  <head>
  	<title>Cattle Brands Memory Game High Scores</title>
  </head>
  <body bgcolor="#FFFF99">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="40" align="left">
          <a href="http://www.dlbassoc.com" target="_blank"><img src="images/WSH_Brand.jpg" border="0" align="left" alt="Home" width="30" height="30"></a>
        </td>
        <td align="left">
          <div style="font-family: Arial, Helvetica, sans-serif; font-size: 26px; font-weight: bold;">
            <nobr>Cattle Brands Memory Game High Scores</nobr>
          </div>
        </td>
        <td align="right">
          <a href="javascript:window.close()"><img src="images/close.gif" width="100" height="30" border="0" alt=""></a>
        </td>
      </tr>
    </table>

    <br>
    <?php
      // Sort function used by usort
      function sortfunc($val1, $val2) {
        return ($val1["p"] < $val2["p"]);
      }

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

      // Output as table
      echo '    <table width="100%" cellspacing="0" cellpadding="4" border="1">';
      echo '      <tr>';
      echo '        <th align="left">Rank</th>';
      echo '        <th align="left">Points</th>';
      echo '        <th align="left">Name</th>';
      echo '        <th align="left">Date</th>';
      echo '        <th align="left">Level</th>';
      echo '        <th align="left">Attempts</th>';
      echo '        <th align="left">Versuche</th>';
      echo '      </tr>';
      
      $i = 1;
      while(list($id, $val) = each($arrarr)) {
        $p = $arrarr{$id}{"p"};
        $n = $arrarr{$id}{"n"};
        $d = $arrarr{$id}{"d"};
        $l = $arrarr{$id}{"l"};
        $t = $arrarr{$id}{"t"};
        $a = $arrarr{$id}{"a"};
        echo '      <tr>';
        echo '        <td>' . "$i" . '</td>';
        echo '        <td>' . "$p" . '</td>';
        echo '        <td>' . "$n" . '</td>';
        echo '        <td>' . "$d" . '</td>';
        echo '        <td>' . "$l" . '</td>';
        echo '        <td>' . "$t" . '</td>';
        echo '        <td>' . "$a" . '</td>';
        echo '      </tr>';
        $i++;
      }
      echo '    </table>';             
    ?>
  </body>
</html>
