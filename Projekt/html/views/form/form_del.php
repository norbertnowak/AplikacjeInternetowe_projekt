<?php
if($_POST['i']=="") { ?>
    
    <div class="containter">
    <div class="row">
       <div class="well">
        
        <div class="alert alert-danger">Nie wybrano żadnej ankiety!</div>
        <br>
        
        <br>
        
        </div>
    </div>
    
</div>
    
    
    
    
    
    
    
    
 <?php   
}
else{
?>

<div class="containter">
    <div class="row">
       <div class="well">
        <h2>Zakończ przeprowadzanie badania</h2>
        <br>
        <h3>Czy napewno chcesz zakończyć ankietę <i><b>" <?php echo $_POST['name']; ?> "</b></i> ?</h3>
        <div class="alert alert-danger">Zmian nie będzie można cofnąć!</div>
        <br>
        
        <br>
        
        </div>
    </div>
    
</div>
    
<?php } ?>
