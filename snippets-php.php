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


/****************************************************
 *
 * ODD or EVEN number in for loop
 *
 * *************************************************/
<?php
 $even = ($num % 2 == 0);
 $odd = ($num % 2 != 0);

?>

<?php
    $count = 10;
    $even = ($num % 2 == 0);
    $odd = ($num % 2 != 0);
    foreach( range(1,$count) as $item){
        echo 'The count is ' . $item;

        if ( $even ) {
            echo 'The count is a even number ' . $item;
        }

        if ( $odd ) {
            echo 'The count is a odd number ' . $item;
        }
    }
?>

<?php $count = 10; ?>
<?php foreach( range(1,$count) as $item){ ?>

<?php } ?>

