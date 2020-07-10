<?php
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = date_create_from_format($format, $date);
    return $d && strcmp(date_format($d, $format), $date) === 0;
}
?>
