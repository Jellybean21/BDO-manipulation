<?php try {
    $users = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
}

catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
} ?>








<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Manipulation de la base de données</title>
</head>
<body>

  <?php

  $query = "select * from users
            where last_name = 'Palmer'";
  $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);


  echo '<h1>'."Résulat des entrées comportant le nom Palmer: ".'</h1>';


  echo '<table border="1">'."\n";

  echo '<thead>';
  echo '<tr>';
  echo '<th>'."ID".'</th>';
  echo '<th>'."first_name".'</th>';
  echo '<th>'."last_name".'</th>';
  echo '<th>'."email".'</th>';
  echo '<th>'."gender".'</th>';
  echo '<th>'."ip_adress".'</th>';
  echo '<th>'."birth_date".'</th>';
  echo '<th>'."zip_code".'</th>';
  echo '<th>'."avatar_url".'</th>';
  echo '<th>'."state_code".'</th>';
  echo '<th>'."country_code".'</th>';
  echo '</tr>';
  echo '</thead>';

foreach($result as $data){
  echo '<tr>';
  echo '<td>'.$data['id'].'</td>';
  echo '<td>'.$data['first_name'].'</td>';
  echo '<td>'.$data['last_name'].'</td>';
  echo '<td>'.$data['email'].'</td>';
  echo '<td>'.$data['gender'].'</td>';
  echo '<td>'.$data['ip_adress'].'</td>';
  echo '<td>'.$data['birth_date'].'</td>';
  echo '<td>'.$data['zip_code'].'</td>';
  echo '<td>'.$data['avatar_url'].'</td>';
  echo '<td>'.$data['state_code'].'</td>';
  echo '<td>'.$data['country_code'].'</td>';
  echo '</tr>';

}
echo '</table>'."\n";


$query = "SELECT `gender`, COUNT(*) AS nb_person FROM `users` GROUP BY `gender`";
$result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>'."Résultat par genre et nombre dans chaque genres: ".'</h1>';


echo '<table border="1">'."\n";

echo '<thead>';
echo '<tr>';




echo '<th>'."gender".'</th>';
echo '<th>'."nombre de personnes".'</th>';





echo '</tr>';
echo '</thead>';

foreach($result as $data){
  echo '<tr>';
  echo '<td>'.$data['gender'].'</td>';
  echo '<td>'.$data['nb_person'].'</td>';
  echo '</tr>';

}
echo '</table>'."\n";
?>
<?php

$query = "SELECT * FROM `users` WHERE `gender` = 'male'";
$result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>'."Entrées des utilisateaurs femme: ".'</h1>';

echo '<table border="1">'."\n";

echo '<thead>';
echo '<tr>';
echo '<th>'."ID".'</th>';
echo '<th>'."first_name".'</th>';
echo '<th>'."last_name".'</th>';
echo '<th>'."email".'</th>';
echo '<th>'."gender".'</th>';
echo '<th>'."ip_adress".'</th>';
echo '<th>'."birth_date".'</th>';
echo '<th>'."zip_code".'</th>';
echo '<th>'."avatar_url".'</th>';
echo '<th>'."state_code".'</th>';
echo '<th>'."country_code".'</th>';
echo '</tr>';
echo '</thead>';

foreach($result as $data){
echo '<tr>';
echo '<td>'.$data['id'].'</td>';
echo '<td>'.$data['first_name'].'</td>';
echo '<td>'.$data['last_name'].'</td>';
echo '<td>'.$data['email'].'</td>';
echo '<td>'.$data['gender'].'</td>';
echo '<td>'.$data['ip_adress'].'</td>';
echo '<td>'.$data['birth_date'].'</td>';
echo '<td>'.$data['zip_code'].'</td>';
echo '<td>'.$data['avatar_url'].'</td>';
echo '<td>'.$data['state_code'].'</td>';
echo '<td>'.$data['country_code'].'</td>';
echo '</tr>';

}
echo '</table>'."\n";






 ?>
 <?php

 $query = "SELECT * FROM `users` WHERE `gender` = 'male'";
 $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

 echo '<h1>'."Entrées des utilisateaurs homme : ".'</h1>';

 echo '<table border="1">'."\n";

 echo '<thead>';
 echo '<tr>';
 echo '<th>'."ID".'</th>';
 echo '<th>'."first_name".'</th>';
 echo '<th>'."last_name".'</th>';
 echo '<th>'."email".'</th>';
 echo '<th>'."gender".'</th>';
 echo '<th>'."ip_adress".'</th>';
 echo '<th>'."birth_date".'</th>';
 echo '<th>'."zip_code".'</th>';
 echo '<th>'."avatar_url".'</th>';
 echo '<th>'."state_code".'</th>';
 echo '<th>'."country_code".'</th>';
 echo '</tr>';
 echo '</thead>';

 foreach($result as $data){
 echo '<tr>';
 echo '<td>'.$data['id'].'</td>';
 echo '<td>'.$data['first_name'].'</td>';
 echo '<td>'.$data['last_name'].'</td>';
 echo '<td>'.$data['email'].'</td>';
 echo '<td>'.$data['gender'].'</td>';
 echo '<td>'.$data['ip_adress'].'</td>';
 echo '<td>'.$data['birth_date'].'</td>';
 echo '<td>'.$data['zip_code'].'</td>';
 echo '<td>'.$data['avatar_url'].'</td>';
 echo '<td>'.$data['state_code'].'</td>';
 echo '<td>'.$data['country_code'].'</td>';
 echo '</tr>';

 }
 echo '</table>'."\n";






  ?>


 <?php

$query = "SELECT (`gender`), AVG(floor(datediff(CURRENT_DATE,STR_TO_DATE(`birth_date`, '%d/%m/%Y'))/365.242199)) AS moyenne FROM users GROUP BY `gender`";
$result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

echo '<h1>'."Moyenne d'âges des hommes et des femmes: ".'</h1>';

echo '<table border="1">'."\n";

echo '<thead>';
echo '<tr>';




echo '<th>'."gender".'</th>';


echo '<th>'."moyenne d\' âge".'</th>';




echo '</tr>';
echo '</thead>';

foreach($result as $data){
echo '<tr>';




echo '<td>'.$data['gender'].'</td>';


echo '<td>'.$data['moyenne'].'</td>';




echo '</tr>';

}
echo '</table>'."\n";


  ?>
<?php
  $query = "SELECT (`id`), AVG( floor(datediff(CURRENT_DATE,STR_TO_DATE(`birth_date`, '%d/%m/%Y'))/365.242199)) AS moyenne FROM users";
  $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

  echo '<h1>'."Moyenne d'âges générale: ".'</h1>';

  echo '<table border="1">'."\n";

  echo '<thead>';
  echo '<tr>';







  echo '<th>'."moyenne d\' âge générale".'</th>';




  echo '</tr>';
  echo '</thead>';

  foreach($result as $data){
  echo '<tr>';







  echo '<td>'.$data['moyenne'].'</td>';




  echo '</tr>';

  }
  echo '</table>'."\n";


    ?>


     <?php

     $query = "INSERT INTO users (first_name, last_name, email, gender, ip_adress, birth_date, zip_code, avatar_url, state_code, country_code )VALUES ('PAOLO', 'DIEGO', 'kikoolol@hotmail.fr','male', '0.0.12.12','', '', '', '', '')";

     $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);
     ?>
     <?php

     $query =  "SELECT * FROM users WHERE `first_name` = 'PAOLO'";
     $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);

     echo '<h1>'."Ajout de l'utilisateur Paolo Diego : ".'</h1>';

     echo '<table border="1">'."\n";

     echo '<thead>';
     echo '<tr>';
     echo '<th>'."ID".'</th>';
     echo '<th>'."first_name".'</th>';
     echo '<th>'."last_name".'</th>';
     echo '<th>'."email".'</th>';
     echo '<th>'."gender".'</th>';
     echo '<th>'."ip_adress".'</th>';
     echo '<th>'."birth_date".'</th>';
     echo '<th>'."zip_code".'</th>';
     echo '<th>'."avatar_url".'</th>';
     echo '<th>'."state_code".'</th>';
     echo '<th>'."country_code".'</th>';
     echo '</tr>';
     echo '</thead>';

     foreach($result as $data){
     echo '<tr>';
     echo '<td>'.$data['id'].'</td>';
     echo '<td>'.$data['first_name'].'</td>';
     echo '<td>'.$data['last_name'].'</td>';
     echo '<td>'.$data['email'].'</td>';
     echo '<td>'.$data['gender'].'</td>';
     echo '<td>'.$data['ip_adress'].'</td>';
     echo '<td>'.$data['birth_date'].'</td>';
     echo '<td>'.$data['zip_code'].'</td>';
     echo '<td>'.$data['avatar_url'].'</td>';
     echo '<td>'.$data['state_code'].'</td>';
     echo '<td>'.$data['country_code'].'</td>';
     echo '</tr>';

     }
     echo '</table>'."\n";






      ?>
           <h1>Voici la requete/ code pour supprimer cet utilisateur de la base de données :</h1>


           <p>$query = "DELETE * FROM users WHERE `first_name` = 'PAOLO'";
           $result = $users->query($query)->fetchAll(PDO::FETCH_ASSOC);</p>








</body>

</html>
