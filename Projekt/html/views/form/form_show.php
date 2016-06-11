<div class="containter">
    <div class="row">
       <div class="well">
        <h2>Moje ankiety</h2>
        <br>
        Poniżej przedstawione są wszystkie Twoje ankiety.
        <br></div>
       
        
        
        <br><br>
    </div>
    <div class="row">
        <?php 
            $db = $this->registry->db;
            $user = $_SESSION['user'];
            $user1 = $db::GetUserByLogin($user);
            $user_id = $user1->getId();

            ?>   
         <table class="table table-bordered"> 
             
             <thead>
            <tr>
                <th>Numer ID</th>
                <th>Tytuł badania</th>
               <th>Liczba pytań</th>
               <th>Wypełnień</th>
                 <th>Stan ankiety</th>
                 <th>Działania</th>
            </tr>
            </thead>
            
            <tbody>
         <?php   $db::ShowFormByUser($user_id); 

         ?>
            </tbody>
        </table>
        
     
    </div>    
    
    <br>
   
    <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>
    <br><Br><br>
    
    
    
</div>

