<?php include 'DatabaseAdaptor.php';
// Aidan ODonnell
if (isset($_GET['movie'])) {
    $theDBA = new DatabaseAdaptor();
    $query = $_GET['movie'];
    echo json_encode($theDBA->showMovieTimes($query));
} elseif (isset($_GET['button']) && $_GET['button'] == "movie") {
    $theDBA = new DatabaseAdaptor();
    $query = $_GET['query'];
    echo json_encode($theDBA->showMovies($query));
}

?>