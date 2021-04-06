<?php
function scanAll(){
$scan = scandir('data');
$result= [];
foreach($scan as $dir) {
     if (is_dir("data/$dir")) {
     $result[]=$dir;    }
}
print_r($result);
return $result;
}
function searchq($query){
     $arr=scanAll();
     $key=array_search($query,$arr);
     if($key==false){return "<div><h1>Nothing found</h1></div>";}
     $name=$arr[$key];
     $data=file_get_contents("data/$name/daten.txt");
     $icon="data/$name/icon.jpg";
     return '<div><h1>'.$name.'</h1><p><img src="'.$icon.'" alt="'.$name.'"></p><p>'.$data.'</p></div>';
}
?>
