<?php

function factorial($n){
    if($n <= 0) return 1;
    $fact = 1;
    for($i = 1; $i <= $n; $i++) $fact *= $i;
    return $fact;
}
function combination($p, $n){
    if($n < $p) return 0;
    return factorial($n) / (factorial($p) * factorial($n - $p));
}

function getPlaceOdds($date, $venueCode, $raceNo, $type = "PLA"){
  $endpoint = "https://info.cld.hkjc.com/graphql/base/";
  $qryParams = [];
  $qryParams["operationName"] = "racing";
  $qryParams["variables"] = [
      "date" => $date,
      "venueCode" => $venueCode,
      "raceNo" => $raceNo,
      "oddsTypes" => [$type]
  ];
  $qryParams["query"] = 'query racing($date: String, $venueCode: String, $oddsTypes: [OddsType], $raceNo: Int) {
    raceMeetings(date: $date, venueCode: $venueCode) {
      pmPools(oddsTypes: $oddsTypes, raceNo: $raceNo) {
        id
        status
        sellStatus
        oddsType
        lastUpdateTime
        guarantee
        minTicketCost
        name_en
        name_ch
        leg {
          number
          races
        }
        cWinSelections {
          composite
          name_ch
          name_en
          starters
        }
        oddsNodes {
          combString
          oddsValue
          hotFavourite
          oddsDropValue
          bankerOdds {
            combString
            oddsValue
          }
        }
      }
    }
  }';
  $qry = json_encode($qryParams);
  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_ENCODING , '');
  curl_setopt($ch, CURLOPT_POSTFIELDS, $qry);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $output = curl_exec($ch);
  $result = json_decode($output, true);
  $returned = $result["data"]["raceMeetings"][0]["pmPools"][0]["oddsNodes"];
  $odds = [];
  foreach($returned as $detail){
    $horseNumber = intval($detail["combString"]);
    $odds[$horseNumber] = (float) $detail["oddsValue"];
  }
  return $odds;
}

?>