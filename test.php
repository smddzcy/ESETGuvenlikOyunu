<?php
/**
 * Created by PhpStorm.
 * User: smddzcy
 * Date: 15/11/15
 * Time: 00:41
 */
function level1($password)
{
    if (strlen($password) == 0) return 1;
    $strength = 0;
    $length = strlen($password);
    if (strtolower($password) != $password) $strength += 1;
    if (strtoupper($password) != $password) $strength += 1;
    if ($length >= 6 && $length <= 10) $strength += 1;
    if ($length >= 10 && $length <= 16) $strength += 2;
    if ($length > 16) $strength += 3;
    preg_match_all('/[|!\\@#$%&*\/=?,;.:\-_+~^]/', $password, $specialchars);
    $strength += sizeof($specialchars[0]) * 4;
    $chars = str_split($password);
    $num_unique_chars = sizeof(array_unique($chars));
    $strength += $num_unique_chars * 2;
    if ($strength < 12) return 1;
    elseif ($strength >= 12 && $strength < 18) return 2;
    elseif ($strength >= 18 && $strength < 24) return 3;
    elseif ($strength >= 24 && $strength < 30) return 4;
    else return 5;
}

echo ((level1("123^12'^'4saad")*20)/5)."\n";