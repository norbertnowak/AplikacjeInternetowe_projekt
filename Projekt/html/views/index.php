
<?php include 'html\includes\login.php'; ?> 
 <?php
$login = $_SESSION['user'];
$isAdmin = false;
if (!empty($login)) {
    $db = $registry->db;
?> 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><?php } else { ?><div class="col-lg-8 col-md-6 col-sm-12 col-xs-12"><?php } ?>
    <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Rozwój projektu</h3>
  </div>
         <div class="panel-body"><span class="label label-success">3 kwietnia 2016</span> <br><br>
      Zadania wykonane w ramach projektu: 
      <ul>
          <li>Stworzenie wstępnego szablonu strony startowej oraz wyświetlenie wyniku zapytania </li>
          <li>Podpięcie bazy danych</li>
          <li>Utworzenie i wprowadzenie danych testowych w bazie danych</li>
          <li>Przygotowanie struktury aplikacji oraz zamodelowanie klas</li>
          <li>Opracowanie dokumentacji wstępnej do projektu, utworzenie modelu bazy danych</li>
          <li>Przygotowanie środowiska pracy</li>
      </ul>

     
  </div>
</div>
    </div> 
    
    
    
    

</div>

