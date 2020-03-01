<?php
  $action = $_GET['action'];

  $stringToDecimalValue = array(
    "a"=>0,
    "b"=>1,
    "c"=>2,
    "d"=>3,
    "e"=>4,
    "f"=>5,
    "g"=>6,
    "h"=>7,
    "i"=>8,
    "j"=>9,
    "k"=>10,
    "l"=>11,
    "m"=>12,
    "n"=>13,
    "o"=>14,
    "p"=>15,
    "q"=>16,
    "r"=>17,
    "s"=>18,
    "t"=>19,
    "u"=>20,
    "v"=>21,
    "w"=>22,
    "x"=>23,
    "y"=>24,
    "z"=>25
  );
  $decimalToStringValue = array(
    0 => "a",
    1 => "b",
    2 => "c",
    3 => "d",
    4 => "e",
    5 => "f",
    6 => "g",
    7 => "h",
    8 => "i",
    9 => "j",
    10 => "k",
    11 => "l",
    12 => "m",
    13 => "n",
    14 => "o",
    15 => "p",
    16 => "q",
    17 => "r",
    18 => "s",
    19 => "t",
    20 => "u",
    21 => "v",
    22 => "w",
    23 => "x",
    24 => "y",
    25 => "z"
  );

  if ($action == 'encrypt') {
    $plainText = strtolower($_POST['plainText']);
    $arrPlainText = str_split($plainText);
    $lenghtArrPlainText = count($arrPlainText);

    $keyText = strtolower($_POST['key']);
    $arrKeyText = str_split($keyText);
    $lenghtArrKeyText = count($arrKeyText);

    if($lenghtArrKeyText < $lenghtArrPlainText) {
      for($a=$lenghtArrKeyText; $a < $lenghtArrPlainText; $a++) {
        $b  = $a - $lenghtArrKeyText;
        $arrKeyText[$a] = $arrKeyText[$b];
      }
    }

    $ci = array();
    $ciText = array();
    for ($n=0; $n<$lenghtArrPlainText; $n++) {
      // Perhitungan chiper text
      $ci[$n] = ($stringToDecimalValue[$arrPlainText[$n]] + $stringToDecimalValue[$arrKeyText[$n]]) % 26;
      // Merubah nilai angka cipher text menjadi string
      $ciText[$n] = $decimalToStringValue[$ci[$n]];
    }

    echo "Chipper Text dari Plain text '".$plainText."' dan key '".$keyText."' adalah '".join("", $ciText)."'";
  } else {
    $chipperText = strtolower($_POST['chipperText']);
    $arrChipperText = str_split($chipperText);
    $lenghtArrChipperText = count($arrChipperText);

    $keyText = strtolower($_POST['key']);
    $arrKeyText = str_split($keyText);
    $lenghtArrKeyText = count($arrKeyText);

    if($lenghtArrKeyText < $lenghtArrChipperText) {
      for($a=$lenghtArrKeyText; $a < $lenghtArrChipperText; $a++) {
        $b  = $a - $lenghtArrKeyText;
        $arrKeyText[$a] = $arrKeyText[$b];
      }
    }

    $pi = array();
    $piText = array();
    for ($n=0; $n<$lenghtArrChipperText; $n++) {
      if ($stringToDecimalValue[$arrChipperText[$n]] > $stringToDecimalValue[$arrKeyText[$n]]) {
        // Perhitungan plain text
        $pi[$n] = ($stringToDecimalValue[$arrChipperText[$n]] - $stringToDecimalValue[$arrKeyText[$n]]) % 26;
        // Merubah nilai angka plain text menjadi string
        $piText[$n] = $decimalToStringValue[$pi[$n]];  
      } else {
        // Perhitungan plain text
        $pi[$n] = ($stringToDecimalValue[$arrChipperText[$n]] + 26 - $stringToDecimalValue[$arrKeyText[$n]]) % 26;
        // Merubah nilai angka plain text menjadi string
        $piText[$n] = $decimalToStringValue[$pi[$n]];  
        
      }
    }

    echo "Plain Text dari chipper text '".$chipperText."' dan key '".$keyText."' adalah '".join("", $piText)."'";
    
  }

?>