 <?php
 // Aidan ODonnell
class DatabaseAdaptor {
    private $DB; // The instance variable used in every method
    // Connect to an existing data based named 'first'
    public function __construct() {
        $dataBase = 'mysql:dbname=cinemashop;charset=utf8;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE,
                                      PDO::ERRMODE_EXCEPTION );
            
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }
    } // . . . continued
    
    // Return all customer records as a PHP associative array.
    public function getMoviesReleasedSince($release) {
        $stmt = $this->DB->prepare( "SELECT * FROM movies WHERE year >= " . $release);
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
    
    public function showActors($arg) {
        $stmt = $this->DB->prepare( "SELECT first_name, last_name FROM actors WHERE first_name LIKE '%" . $arg . "%' OR last_name LIKE '%" . $arg . "%'");
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
    
    public function showMovies($arg) {
        $stmt = $this->DB->prepare( "SELECT name FROM movies WHERE name LIKE '%" . $arg . "%'");
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
    
    public function showRoles($arg) {
        $stmt = $this->DB->prepare( "SELECT role FROM roles WHERE role LIKE '%" . $arg . "%'");
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }
    public function showMovieTimes($movie) {
        $stmt = $this->DB->prepare( "SELECT movie.name, movie.run, movie.rating, aud.time, aud.id FROM movie JOIN aud ON movie.id = aud.movie_id WHERE movie.name ='" . $movie . "'");
        $stmt->execute ();
        return $stmt->fetchAll( PDO::FETCH_ASSOC );
    }

} // End class DatabaseAdaptor
?>