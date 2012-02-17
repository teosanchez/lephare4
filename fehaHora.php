<?php
/*
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("10:23"), "\n";*/
echo strtotime("25:23"), "\n";

?>

<?php
$cadena = '23:55';

// antes de PHP 5.1.0 se debería de comparar con -1, en vez de con false
if (($timestamp = strtotime($cadena)) === false) {
    echo "La cadena ($cadena) es falsa";
} else {
    echo "$cadena == " . date('l dS \o\f F Y h:i:s A', $timestamp);
}
?>