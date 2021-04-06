<?php
$scan = scandir('data');
foreach($scan as $file) {
     if (!is_dir("data/$file")) {
     echo $file.'\n';    }
} 
?>
