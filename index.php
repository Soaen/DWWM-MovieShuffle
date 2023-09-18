<?php
$json = file_get_contents("movies.json");
$movies = json_decode($json, true);// Avec le true on transforme les objets en tableau associatif (array)

include('./templates/header.php')

?>

<div class="global-card-container">


<?php
    foreach ($movies as $movie){
        ?>
        <div class="card-container">
            <img src="./img/poster/<?= strtolower(str_replace(' ', '-', $movie['title']));?>.jpg" alt="" >

            
            <div class="text-container">



                <a href="./films.php?id=<?= $movie['id']?>" class="film-title"><?= $movie['title']?></a>
                <div class="genre-container">

                    <p><?= implode(", ", $movie['genres']); ?></p>

                </div>
            </div>
        </div>

        <?php
    }
?>
</div>
<?php
include('./templates/footer.php')
?>