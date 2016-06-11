
<?php

 $form_name=$_POST['name'];
 $form_id=$_POST['id'];
 $db = $this->registry->db;
 $ankieta = new Formularz();
 $ankieta= $db::getFormByName($form_name);
 $q_num= $ankieta->getFormQNum();
 $user = $ankieta->getFormUser();

 
?>
<center><h1><b><?php echo $form_name; ?></b></h1></center>
           
       
        <font size="1" color="grey"> <center>Liczba pytań: <?php echo $q_num; ?> </center></font>
        <br>
         <hr style="border:solid 1px grey;">
        <br>
        
        <form>
            <?php for ($i=1;$i<=$q_num;$i++){ ?>
           <ul class="list-group">
               
              <?php
              $pytanie = new Pytanie();
              $pytanie = $db::GetQuestionByFormID($form_id);
              $questionID = $pytanie->getPytID();
              $question = $pytanie->getPyt_q();
              $q_ans_num = $pytanie->getPyt_q_ans_number();
              $q_ans_type = $pytanie->getPyt_q_ans_type()
              
              ?>
                    <li class="list-group-item list-group-item-info"><h4><b>
                                <?php  echo $question; ?>
        </b></h4></li>
        
                    
                    <li class="list-group-item list-group-item-success">
                       
                        <input type="<?php echo $typ; ?>" name="<?php echo 'q' .($i + 1).'odp' ?>" value=""> &nbsp <?php echo $_POST["q".($i + 1)."_ans".($j + 1)]; ?> <br>
                        <input type="hidden" name="<?php echo 'q' .($i + 1).'_ans'.($j+1); ?>" value="<?php echo $_POST["q".($i + 1)."_ans".($j + 1)]; ?>">
                        
                       
                    </li>
               </ul> 
            <?php } ?>
    
       
            <input type="hidden" name="form_save" value="1"><br><br>
            <button type="submit" class="btn btn-success btn-block btn-md">Zapisz odpowiedzi</button> <br>
            <button type="reset" class="btn btn-danger btn-block btn-md">Wyczyść odpowiedzi</button> <br>
        </form>