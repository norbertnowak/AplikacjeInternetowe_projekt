<div class="containter">
    
    <div class="well">
        <form method="POST" action="/<?= APP_ROOT ?>/form/add_save">
            <input type="hidden" value="<?php echo $_POST['form_title']; ?>" name="form_title">
            <input type="hidden" value="<?php echo $_POST['q_num']; ?>" name="q_num">
            <?php 
            for ($i = 0; $i <= $_POST['q_num']; $i++) { ?>
            <input type="hidden" value="<?php echo $_POST['q'.$i]; ?>" name="<?php echo 'q'.$i; ?>">
            <input type="hidden" value="<?php echo $_POST['q'.$i.'_ans_number']; ?>" name="<?php echo 'q'.$i.'_ans_number'; ?>">        
            <input type="hidden" value="<?php echo $_POST['q'.$i.'_ans_type']; ?>" name="<?php echo 'q'.$i.'_ans_type'; ?>">

            
            
            <?php  }  ?>
            
            
            
            <center><h1><b><?php echo $_POST['form_title']; ?></b></h1></center>
           
       
        <font size="1" color="grey"> <center>Liczba pytań: <?php echo $_POST['q_num']; ?> </center></font>
        <br>
         <hr style="border:solid 1px grey;">
        <br>
        
        
        <?php 
            for ($i = 0; $i < $_POST['q_num']; $i++) { ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info"><h4><b>
        <?php echo ($i+1).". ".$_POST['q' . ($i + 1)]."<BR>"; ?> </b></h4></li>
        
                    
                    <li class="list-group-item list-group-item-success">
                       <?php if ($_POST['q' . ($i + 1) . '_ans_type'] == 0) { $typ = 'checkbox'; } else { $typ = 'radio';} ?>
                        
                       <?php
                       for ($j = 0; $j < $_POST['q' .($i + 1).'_ans_number']; $j++) {?>
                        <input type="<?php echo $typ; ?>" name="<?php echo 'q' .($i + 1).'odp' ?>" value=""> &nbsp <?php echo $_POST["q".($i + 1)."_ans".($j + 1)]; ?> <br>
                        <input type="hidden" name="<?php echo 'q' .($i + 1).'_ans'.($j+1); ?>" value="<?php echo $_POST["q".($i + 1)."_ans".($j + 1)]; ?>">
                        
                       <?php } ?> 
                    </li>
               </ul> <?php
             }
    
        ?>
        <input type="hidden" name="form_save" value="1"><br><br>
            <button type="submit" class="btn btn-success btn-block btn-md">Zapisz ankietę</button> <br>
        </form>
        <a href="/<?= APP_ROOT ?>/form/add">  <button type="submit" class="btn btn-default btn-block btn-md">Rozpocznij tworzenie ankiety od nowa</button> </a><br>
        <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>
    </div>
    
    
    
    
    
</div>












