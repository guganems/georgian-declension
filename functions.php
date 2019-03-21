<?php
function motxrobiti($word) {
    $rootForm = getRoot($word);

    if (!lastIsVowel($word)) {
        if (has3Vowel($word)){
            $rootForm = $word . "მ";
        } else $rootForm .= "მა";

    } else {
        $rootForm = $word . "მ";
    }

    return $rootForm;
}

function getRoot($word){
    if (lastIsVowel($word)){
        $root = $word;
    }
    elseif (has3Vowel($word)){
        $root = $word;
    } else {
        $root = mb_substr($word, 0, mb_strlen($word)-1);
    }

    return $root;
}

function has3Vowel ($word){
    $fullVowels = ["ა", 'ე', 'ი', 'ო', 'უ'];
    $vowelsInThisWord = "";
    $isASafe = false;

    $chrArray = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);
    for ($i = 0; $i < sizeof($chrArray); $i++){
        if (in_array($chrArray[$i], $fullVowels)){
            if (isset($lastVowel)){
                if ($lastVowel == $chrArray[$i]){
                    $isASafe = true;
                }
            }
            $lastVowel = $chrArray[$i];
            $vowelsInThisWord .= $chrArray[$i];
        }
    }

    if ($isASafe) return false;
    if (endsWith($word, "ური")) return false;
    if (endsWith($word, "ორი")) return false;
    if (endsWith($word, "ები")) return false;
    if (mb_strlen($vowelsInThisWord) >= 3 && mb_strlen($vowelsInThisWord) < 4){
        return true;
    } else return false;
}

function lastIsVowel($word){
    $vowels = ["ა", 'ე', 'ო', 'უ'];

    if (in_array(mb_substr($word, mb_strlen($word)-1, mb_strlen($word)-1), $vowels)){
        return true;
    } else return false;
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}