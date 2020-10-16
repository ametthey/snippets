/****************************************************
 *
 * String Replace
 *
 * *************************************************/

<?php
    str_replace($search, $replace, $subject)
    $subject    = 'Ceci est une phrase en entière';
    $search     = 'en entière';

    $trimmed    =  str_replace( $search, '', $subject );

    echo $trimmed; // Ceci est une phrase

?>
