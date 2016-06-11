
<?php
if (!empty($error)) {
    ?>
      <div class="alert alert-danger" role="alert">
        <?= $error ?>
    </div>
    <?php
    
}
?>
<form method="POST" action="/<?= APP_ROOT ?>/account/register">
    <div class="form-group">

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Adres email</span>
        <input type="email" name="email" class="form-control" required="true"/>
        </div>
    </div>
    <div class="form-group">
                <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Login</span>
  
        <input type="text" name="login" class="form-control" required="true"/> 
                </div>
    </div>
    <div class="form-group">
                <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Hasło</span>
        <input type="password" name="password" class="form-control" required="true"/> 
                </div>
        
    </div>
    <div class="form-group">
                <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Powtórz hasło</span>
            <input type="password" name="password2" class="form-control" required="true"/> </div>
    </div> 
    <button type="submit" class="btn btn-info btn-block btn-md">Zarejestruj</button> 
    <button  class="btn btn-danger btn-block" type="reset">Wyczyść</button><br></form>
    <a href="/<?= APP_ROOT ?>"><button  class="btn btn-warning btn-block">Powrót do strony głównej</button></a>

