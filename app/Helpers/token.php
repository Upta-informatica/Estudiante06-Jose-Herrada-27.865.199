<?php

function token_generate($id, $rep = NULL, $token = NULL)
{

    $string = '';
    $t = $rep !== NULL ? $rep : 11;
    for ($x = 0, $y = 0; $x <= $t; $x++) {
        $y = round(random_int(97, 122));
        $string .= utf8_encode(chr($y));
        $y = 0;
    }
    if ($token === null) {
        $string .= '-' . $id . '$cryp';
    } else {
        $string .= $token;
    }
    return $string;
}
