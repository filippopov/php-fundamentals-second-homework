<?php
$word = $argv[1];

$wordArray = [];
for ($i = 0; $i < strlen($word); $i++) {
    if (! isset($wordArray[$word[$i]])) {
        $wordArray[$word[$i]] = 1;
    } else {
        $wordArray[$word[$i]] += 1;
    }
}

arsort($wordArray);

foreach ($wordArray as $key => $value) {
    echo "$key -> $value \n";
}