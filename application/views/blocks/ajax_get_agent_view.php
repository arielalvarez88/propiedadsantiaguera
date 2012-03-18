
<?php
$users= isset($users) ? $users : null;

?>
<?php foreach($users as $user):  ?>

<div id="panel_user">
  <div id="div_foto" ><img src=<?php  echo $user->photo;     ?>  alt=""/></div> 
 
  <div id="datos1"> <ul  class="ul_class">
          <li><h2><?php  echo $user->name;     ?></h2></li>
          <li> <?php  echo $user->company;     ?></li>
          <li> <strong> Email:</strong><?php  echo $user->email;     ?></li>
          <li> <strong> Website::</strong><?php  echo $user->website;     ?></li>
          <li><strong> Direccion:</strong><?php  echo $user->adddress;     ?></li>
      
      
      </ul>
  
  </div>
 <div id="datos2"><ul  class="ul_class" > 
     <li> <strong> Tel::</strong><?php  echo $user->tel;     ?></li>
          <li> <strong> Cel::</strong><?php  echo $user->cel;     ?></li>
          <li><strong> BBpin::</strong><?php  echo $user->bbpin;     ?></li>
     
     </ul></div>
   
</div>

<?php endforeach; ?>

