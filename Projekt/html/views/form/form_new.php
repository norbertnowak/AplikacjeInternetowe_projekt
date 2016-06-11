<div class="containter">
    <h2>Formularz tworzenia nowej ankiety</h2><br><Br>
    <?php
    if (empty($_POST['form_title'])) {
        ?>
        <!-- --------------------------------ETAP 1/3------------------------------------- -->  
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width: 33%"> <b>ETAP 1/3 - Podstawowe informacje</b>
                <span class="sr-only">33%</span>
            </div>
        </div>

        <form method="POST" action="/<?= APP_ROOT ?>/form/add">

            <ul class="list-group">
                <li class="list-group-item list-group-item-success"><b>NAZWA ANKIETY </B>&nbsp &nbsp wprowadź nazwę ankiety</li>
                <li class="list-group-item"> <input type="text" class="form-control" name="form_title" required="true"/></li>
            </ul><br>
            <ul class="list-group">
                <li class="list-group-item list-group-item-success"><B>ILOŚĆ PYTAŃ </b>&nbsp &nbsp określ ilość pytań w ankiecie przy użyciu suwaka (wartość z przedziału 1 - 10)</li>
                <li class="list-group-item">
                    <input id="q_num" name="q_num" type="range" min="1" max="10" value="1" onchange="rangevalue.value = value"></input>
                <center><b><output id="rangevalue">1</output></b></center></li>
            </ul><br>

            <BR>
            <button type="submit" class="btn btn-info btn-block btn-md">Dalej</button> 
            <button  class="btn btn-danger btn-block" type="reset">Wyczyść dane</button><br></form>
        <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>
    <?php } elseif (!empty($_POST['form_title']) && empty($_POST['q' . $_POST['q_num']])) { ?>

        <!-- --------------------------------ETAP 2/3------------------------------------- -->   

        <h3>
            Ankieta <b>"<?php echo $_POST['form_title']; ?>"</b>
        </h3>
        <div class="progress">
            <div class="progress-bar  progress-bar-striped active" style="width: 33%">
                <b>ETAP 1/3 - Podstawowe informacje</b>
            </div>
            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 33%">
                <b>ETAP 2/3 - Pytania</b>
            </div>
        </div>

        <form method="POST" action="/<?= APP_ROOT ?>/form/add">
            <input type="hidden"  name="form_title" value="<?php echo $_POST['form_title'] ?>">
            <input type="hidden"  name="q_num" value="<?php echo $_POST['q_num'] ?>">
            <?php for ($i = 0; $i < $_POST['q_num']; $i++) { ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info"><b>PYTANIE <?php echo $i + 1; ?></B>&nbsp &nbsp wprowadź treść pytania</li>
                    <li class="list-group-item"> <input type="text" class="form-control" name="q<?php echo $i + 1; ?>" required="true"/></li>
                    <li class="list-group-item list-group-item-success"><B>ILOŚĆ ODPOWIEDZI </b>&nbsp &nbsp określ ilość odpowiedzi dla pytania przy użyciu suwaka (wartość z przedziału 2 - 10)</li>
                    <li class="list-group-item">
                        <input id="q_num" name="q<?php echo $i + 1; ?>_ans_number" type="range" min="2" max="10" value="2" onchange="rangevalue<?php echo $i + 1; ?>.value = value"></input>

                    <center><b><output id="rangevalue<?php echo $i + 1; ?>">2</output></b></center></li>
                    <li class="list-group-item">
                    <center>  <input type="radio" name="q<?php echo $i + 1; ?>_ans_type" value="1"> Jedna odpowiedź</input> &nbsp &nbsp
                        <input type="radio" name="q<?php echo $i + 1; ?>_ans_type" value="0"> Wiele odpowiedzi</input> </center></li>
                </ul><br>
            <?php } ?>
            <BR>
            <button type="submit" class="btn btn-info btn-block btn-md">Dalej</button> 
            <button  class="btn btn-danger btn-block" type="reset">Wyczyść dane</button><br></form><br>
        <a href="/<?= APP_ROOT ?>/form/add">  <button type="submit" class="btn btn-default btn-block btn-md">Rozpocznij tworzenie ankiety od nowa</button> </a><br>
        <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>
    <?php } else {
        ?>

        <!-- --------------------------------ETAP 3/3------------------------------------- -->  
        <h3>
            Ankieta<h2><b>"<?php echo $_POST['form_title']; ?>"</b></h2>
        </h3>
        <div class="progress">
            <div class="progress-bar  progress-bar-striped active" style="width: 33%">
                <b>ETAP 1/3 - Podstawowe informacje</b>
            </div>
            <div class="progress-bar progress-bar-warning progress-bar-striped active" style="width: 33%">
                <b>ETAP 2/3 - Pytania</b>
            </div>
            <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 34%">
                <b>ETAP 3/3 - Odpowiedzi</b>
            </div>
        </div>

        <form method="POST" action="/<?= APP_ROOT ?>/form/add">
            <input type="hidden"  name="form_title" value="<?php echo $_POST['form_title'] ?>">
            <input type="hidden"  name="q_num" value="<?php echo $_POST['q_num'] ?>">  
             <?php for ($i = 0; $i < $_POST['q_num']; $i++) {  

                
                        ?>
                <input type="hidden"  name="q<?php echo $i + 1 ?>" value="<?php echo $_POST['q'.($i+1)]; ?>">
                <input type="hidden"  name="q<?php echo $i + 1 ?>_ans_number" value="<?php echo $_POST[('q' . ($i + 1) . '_ans_number')]; ?>">
                <input type="hidden"  name="q<?php echo $i + 1; ?>_ans_type" value="<?php echo $_POST['q' . ($i + 1) . '_ans_type']; ?>">
            <?php } ?>

    <?php for ($i = 0; $i < $_POST['q_num']; $i++) { ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info"><b>
                            PYTANIE <?php echo $i + 1; ?></B>&nbsp &nbsp <?php echo $_POST['q' . ($i + 1)]; ?></li>
                    <?php
                    if ($_POST['q' . ($i + 1) . '_ans_type'] == 0) {
                        $typ = 'checkbox';
                    } else {
                        $typ = 'radio';
                    }

                    for ($j = 0; $j < $_POST['q' . ($i + 1) . '_ans_number']; $j++) {
                        ?>

                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="<?php echo $typ; ?>"  >
                            </span>
                            <input type="text" class="form-control" name="q<?php echo ($i + 1); ?>_ans<?php echo ($j + 1); ?>" >
                        </div>

                <?php } ?>

                </ul>
    <?php } ?>
            <BR>
            <input type="hidden"  name="form_success" value="1">
            <button type="submit" class="btn btn-success btn-block btn-md">Generuj ankietę!</button> <br>
            <button  class="btn btn-danger btn-block" type="reset">Wyczyść dane</button><br></form><br>

        <a href="/<?= APP_ROOT ?>/form/add">  <button type="submit" class="btn btn-default btn-block btn-md">Rozpocznij tworzenie ankiety od nowa</button> </a><br>
        <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>



<?php } ?>   



</div>




