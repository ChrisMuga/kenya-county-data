<?php
include_once('RequestCounties.php');
$counties=array(
      1 => 'MOMBASA',
      2 => 'KWALE',
      3 => 'KILIFI',
      4 => 'TANA RIVER',
      5 => 'LAMU',
      6 => 'TAITA TAVETA',
      7 => 'GARISSA',
      8 => 'WAJIR',
      9 => 'MANDERA',
      10 => 'MARSABIT',
      11 => 'ISIOLO',
      12 => 'MERU',
      13 => 'THARAKA-NITHI',
      14 => 'EMBU',
      15 => 'KITUI',
      16 => 'MACHAKOS',
      17 => 'MAKUENI',
      18 => 'NYANDARUA',
      19 => 'NYERI',
      20 => 'KIRINYAGA',
      21 => "MURANG'A",
      22 => 'KIAMBU',
      23 => 'TURKANA',
      24 => 'WEST POKOT',
      25 => 'SAMBURU',
      26 => 'TRANS NZOIA',
      27 => 'UASIN GISHU',
      28 => 'ELGEYO/MARAKWET',
      29 => 'NANDI',
      30 => 'BARINGO',
      31 => 'LAIKIPIA',
      32 => 'NAKURU',
      33 => 'NAROK',
      34 => 'KAJIADO',
      35 => 'KERICHO',
      36 => 'BOMET',
      37 => 'KAKAMEGA',
      38 => 'VIHIGA',
      39 => 'BUNGOMA',
      40 => 'BUSIA',
      41 => 'SIAYA',
      42 => 'KISUMU',
      43 => 'HOMA BAY',
      44 => 'MIGORI',
      45 => 'KISII',
      46 => 'NYAMIRA',
      47 => 'NAIROBI' );
$url='https://forms.iebc.or.ke';
$requestdata=new RequestData();
// for($i=1;$i<=count($counties);$i++){
      $response=$requestdata->RequestConstituencies(1,$url);
      // print_r (($response));
// }
?>