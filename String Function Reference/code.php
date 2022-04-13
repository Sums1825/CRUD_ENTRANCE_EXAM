<?php

function cleanChars($string)
{

    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), ' ', $string);

    return ucwords(trim($string, '-'));
}

// echo "<input type='submit' value='Go' name='Gobut'></input>";
// echo "<input type='text' value='" . cleanChars('January-Febraury\March,April May;June:]August/September.October|November#December') . "'></input>";
