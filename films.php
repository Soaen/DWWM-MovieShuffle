<?php
$find = false;
$data = array('name' => 'film introuvable');
if(isset($_GET["id"])){

    $json = file_get_contents("movies.json");
    $movies = json_decode($json, true);// Avec le true on transforme les objets en tableau associatif (array)

    foreach ($movies as $movie) {
        if($movie['id'] == $_GET['id']){
            $find = true;
            $data = $movie;
        };
    };

}

include("./templates/header.php")
?>


<div class="details-container">


<?php 
if($find){  
?>
    <div class="poster-container">
        <img src="./img/poster/<?= strtolower(str_replace(' ', '-', $data['title']));?>.jpg" alt="" class="movie-picture">

    </div>
    <div class="data-details-container">
        <p class="date-films-details"><?= date('Y',strtotime($data['releaseDate'] ))?></p>
        <p class="title-films-details"><?= $data['title'] ?></p>
        <p class="desc-films-details"><?=$data["description"]?></p>
        <p><?=implode(", ", $data["genres"]);?></p>
        <p><?= intdiv($data['duration'], 60).'h '. ($data['duration'] % 60);?>min - <?= date('d/m/Y',strtotime($data['releaseDate'] ));?></p>
        <a href="<?= $data['video'] ?>" class="bande-annonce-btn"><?= strtoupper("Bande annonce") ?></a>
    </div>


</div>
<?php

}
include("./templates/footer.php")
?>