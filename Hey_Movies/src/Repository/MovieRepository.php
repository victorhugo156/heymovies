<?php 

class MovieRepository{
   
   private PDO $pdo;

   public function __construct(PDO $pdo)
   {
      $this->pdo = $pdo;
   }

   public function movieCard(): array
   {
      $sql1 = "SELECT * from movies";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }

   public function movieImageCarousel(): array
   {
      $sql1 = "SELECT * from movies LIMIT 3";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }

   public function movieId($id): array
   {
      $sql1 = "SELECT * FROM movies WHERE Movies_ID = $id";
      $statement = $this->pdo->query($sql1);
      $dataCardsMovie = $statement->fetchAll(PDO::FETCH_ASSOC);

      $dataMovie = array_map(function($movie) {
      return new Movie($movie['Movies_ID'], $movie['Movies_title'], $movie['Movies_Description'], $movie['Movies_Releaseyear'], $movie['Movies_language'], $movie['Movies_Genre'], $movie['Movies_Classification'], $movie['Movies_Mainactors'], $movie['Movies_director'], $movie['Movies_Sourceinformation'], $movie['Streaming_service'], $movie['image_url'], $movie['image2_url'], $movie['Youtube_ID']
   );
   }, $dataCardsMovie);

   return $dataMovie;
   }
}

?>