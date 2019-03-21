<?php

function test ($word){
    return mb_substr($word, mb_strlen($word)-1, mb_strlen($word)-1);
}