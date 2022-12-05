<?php 

$str = file_get_contents('dischi.json');

$listAlbum = json_decode($str, true);


// se description è settato prendo da list album solo gli elementi che mi servono e gli torno solo quelli richiesti
if(isset($_GET['description'])) {
    $listAlbum = [
          [
            'genre' => $listAlbum[$_GET['description']]["genre"],
            'author' => $listAlbum[$_GET['description']]["author"],
            'poster' => $listAlbum[$_GET['description']]["poster"]
          ]
    ];
}

if(isset($_POST['getGenre'])) {
    $albumFilter = [];
    foreach($listAlbum as $album){
        if($album["genre"] === $_POST['getGenre']) {
            $albumFilter[] = $album;
        }
    }
    $listAlbum = $albumFilter;
}


header('Content-Type: application/json');
echo json_encode($listAlbum);