 

<?php
$login = $_SESSION['user'];
$isAdmin = false;
if (!empty($login)) {
    $db = $registry->db;
    ?><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Witaj <?php echo $login; ?>! </h3>
            </div>
            <div class="panel-body">


                <a href="/<?= APP_ROOT ?>/form/show"><button  class="btn btn-success btn-block btn-lg">Moje ankiety</button>  </a><br>
                <a href="/<?= APP_ROOT ?>/form/add"><button  class="btn btn-danger btn-block btn-lg">Nowa ankieta</button>  </a><br>

                <a href="/<?= APP_ROOT ?>/account/logout"><button  class="btn btn-info btn-block btn-xs">Wyloguj</button>  </a>   


            </div>
        </div>  
        <?php
    } else {
        ?> 
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Logowanie</h3>
                </div>
                <div class="panel-body"><form method="POST" action="/<?= APP_ROOT ?>/account/login">
                        <div class="form-group">

                            <div class="col-lg-12">
                                <input type="text" name="login" class="form-control" id="inputEmail" placeholder="Nazwa użytkownika">
                            </div>
                        </div><br><br>
                        <div class="form-group">

                            <div class="col-lg-12">
                                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Hasło">

                            </div>
                        </div>

                        <br><br>
                        <button  class="btn btn-success btn-block" type="submit">Zaloguj</button>
                        <button  class="btn btn-danger btn-block" type="reset">Wyczyść</button><br></form>
                    <a href="/<?= APP_ROOT ?>/account/register"><button  class="btn btn-info btn-block">Utwórz konto</button>  </a>   


                </div>
            </div><?php } ?>
    </div>