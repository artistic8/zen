<?php

if(!isset($argv[1])) die("Race Date Not Entered!!\n");
$raceDate = trim($argv[1]);
if(!isset($argv[2])) $venue = "ST";
else $venue = trim($argv[2]);

$currentDir = __DIR__ . DIRECTORY_SEPARATOR . $raceDate . $venue;
$outFile = $currentDir . DIRECTORY_SEPARATOR . "agregate.php";

if(file_exists($outFile)) $oldData = include($outFile);

$mainBetsFile = $currentDir . DIRECTORY_SEPARATOR . "bets.php";
$mainData = include($mainBetsFile);
$numberOfRaces = count($mainData);
$outtext = "<?php\n\n";
$outtext .= "return [\n";

$bets = [];
$unions = [];
$sevens = [];
$basicBet = 10;
foreach($mainData as $raceNumber => $shit) {
    $bets[$raceNumber] = ['favorites' => '(F) ' . $mainData[$raceNumber]['favorites']];
}
$dir = new DirectoryIterator($currentDir); 
foreach ($dir as $fileinfo) {
    if(!$fileinfo->isDot()&& preg_match("/(bets)/", $fileinfo->getFilename())) {
        $fullFilePath = $currentDir . DIRECTORY_SEPARATOR . $fileinfo->getFilename();
        $fileContents = include($fullFilePath);
        foreach($fileContents as $raceNumber => $data){
            if(isset($oldData[$raceNumber]["unions(\$$basicBet)"])) $oldUnions = explode(", ", $oldData[$raceNumber]["unions(\$$basicBet)"]);
            else $oldUnions = [];
            if(!isset($unions[$raceNumber])) $unions[$raceNumber] = [];
            if(isset($oldData[$raceNumber]["sevens(\$$basicBet)"])) $oldSevens = explode(", ", $oldData[$raceNumber]["sevens(\$$basicBet)"]);
            else $oldSevens = [];
            if(!isset($sevens[$raceNumber])) $sevens[$raceNumber] = [];
            if(isset($data['bets'])) {
                foreach($data['bets'] as $key => $value){
                    if(!in_array($value, $bets[$raceNumber])) {
                        $bets[$raceNumber][$key] = $value;
                    }
                    if(strpos($key, "qin(union") === 0){
                        $unions[$raceNumber] = array_values(array_unique(array_merge($unions[$raceNumber], explode(", ", $value))));
                    }
                    if(strpos($key, "qin(seven") === 0){
                        $sevens[$raceNumber] = array_values(array_unique(array_merge($sevens[$raceNumber], explode(", ", $value))));
                    } 
                }
            }
            $oldUnions = array_values(array_unique(array_merge($oldUnions, $unions[$raceNumber])));
            sort($oldUnions);
            if(!empty($oldUnions)) {
                $bets[$raceNumber]["unions(\$$basicBet)"] = implode(", ", $oldUnions);
                $unionPlusFavorites = array_values(array_unique(array_merge($oldUnions, explode(", ",$mainData[$raceNumber]['favorites']))));
                sort($unionPlusFavorites);
                $bets[$raceNumber]["union + favorites"] = implode(", ", $unionPlusFavorites);
                $bets[$raceNumber]["count union + favorites"] = count($unionPlusFavorites);
            }
            $oldSevens = array_values(array_unique(array_merge($oldSevens, $sevens[$raceNumber])));
            sort($oldSevens);
            if(!empty($oldSevens)) {
                $bets[$raceNumber]["sevens(\$$basicBet)"] = implode(", ", $oldSevens);
                $bets[$raceNumber]["count sevens"] = count($oldSevens);
                if(!empty($oldUnions)){
                    $interSevenUnion = array_intersect($oldSevens, $oldUnions);
                    $bets[$raceNumber]["inter sevens unions"] = implode(", ", $interSevenUnion);
                    $bets[$raceNumber]["count inter sevens unions"] = count($interSevenUnion);
                    
                }
            }
        }
    }
}
foreach($bets as $raceNumber => $data){
    if(!empty($data)){
        $racetext = "\t'$raceNumber' => [\n";
        $racetext .= "\t\t/**\n";
        $racetext .= "\t\tRace $raceNumber\n";
        $racetext .= "\t\t*/\n";
        foreach($data as $betDescription => $betContent) $racetext .= "\t\t'$betDescription' => '$betContent',\n";
        $racetext .= "\t],\n";
        $outtext .= $racetext;
    }
}
$outtext .= "];\n";
file_put_contents($outFile, $outtext);
?>
