<?php       

echo "<tr>";
          echo '<td><center><b>'.$row['idForm'].'</b></center></td>'
                  .'<td><center>'.$row['form_name'].'</center></td>'
                  . '<td><center>'.$row['q_num'].'</center></td>'
                  . '<td><center>'.$row['done'].'</center></td>';
                 
          if($row['active']){
              echo '<td><center><font color="green"><b> <i>AKTYWNA</i> </b></font></center>';
          }   else echo'<td><center><font color="red"><b> <i>NIE AKTYWNA</i> </b></font></center>';   
        
          echo '</td>';
          
          echo '<td>';
          if($row['active']){
          echo '<form method="POST" action="/'.APP_ROOT.'/form/del/">'
                  . '<input type="hidden" name="id" value="'.$row['idForm'].'">'
                  . '<input type="hidden" name="name" value="'.$row['form_name'].'">'
          . '<button  class="btn btn-primary btn-xs btn-block" type="submit">Zakończ badanie</button></form>';
          
          echo '<form method="POST" action="/'.APP_ROOT.'/form/view/">'
                  . '<input type="hidden" name="id" value="'.$row['idForm'].'">'
                  . '<input type="hidden" name="name" value="'.$row['form_name'].'">'
                  . '<button class="btn btn-danger btn-xs btn-block" type="submit">Wyświetl badanie</button></form>';}
          echo '<form method="POST" action="/'.APP_ROOT.'/form/result/">'
                  . '<input type="hidden" name="id" value="'.$row['idForm'].'">'
                  . '<input type="hidden" name="name" value="'.$row['form_name'].'">'
                  . '<button  class="btn btn-success btn-xs btn-block" type="submit">Przeglądaj wyniki</button></form>';
          
          
          
         
          
          
          echo '</td>';
          
          
         
          
            echo '</tr>';
           
      
      
      ?>