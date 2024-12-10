<?php
$a = 5;
$b = 10;
if ($a > 0 && $b > 0) {
    echo "Both are greater than zero.";
}

 $a = 5;
$b = 0;
if ($a > 0 || $b > 0) {
    echo "At least one value is greater than zero.";
} 

 $a = true;
if (!$a) {
    echo "This will not be printed because $a is true.";
} 
?>