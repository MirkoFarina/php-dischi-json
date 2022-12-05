<?php 

$str = file_get_contents('dischi.json');

$listAlbum = json_decode($str, true);





header('Content-Type: application/json');
echo json_encode($listAlbum);