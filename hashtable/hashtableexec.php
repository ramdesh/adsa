<?php
require('hashtable.php');

$targetSums = array(231552, 234756, 596873, 648219, 726312, 981237, 988331, 1277361, 1283379);
$hashIntFile = fopen('HashInt.txt', 'r');
define("DATASET_SIZE", 100000);
$hashTable = new HashTable(DATASET_SIZE);
$dataSet = array();
$resultString = array();
if($hashIntFile) {
    echo "Reading file\n";
    while (($line = fgets($hashIntFile)) !== false) {
        $dataSet[] = (int)$line;
        $listItem = new ListItem((int)$line);
        $hashTable->insert($listItem);
    }
    echo "Finished inserting items to hashtable\n";
    fclose($hashIntFile);
} else {
    die("Error reading file!\n");
}
echo "Beginning computation\n";
for($k = 0; $k < count($targetSums); $k++) {
    for($i = 0; $i < count($dataSet); $i++) {
        //echo "Evaluating " . $targetSums[$k] . " against " . $dataSet[$i]. "\n";
        $diff = $targetSums[$k] - $dataSet[$i];
        //echo "Difference is " . $diff . "\n";
        if($diff < 0) {
            // Dataset value is larger than target sum,
            // therefore we do not need to search the hashtable
            continue;
        }
        if($hashTable->search($diff) != null) {
            // There is a value in the hash table that can create the sum
            $resultString[$k] = "1";
            break;
        } else {
            $resultString[$k] = "0";
        }
    }
}
echo "Computation completed\n";
echo "Result string:\n";
for($k = 0; $k < count($targetSums); $k++) {
    echo $resultString[$k];
}
echo "\n";