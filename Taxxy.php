<?php
   $annual=0;
   $annualtax=0;
   $monthlytax=0;
   $salary=0;
    ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="cp3.css">
<body>
<section class="cp-container cp-center cp-content" style="max-width:600px">
  <h2 class="cp-wide">Taxxy: A Tax Calculator</h2>
</section>
 <form method="GET">
 <fieldset> 
         <table class="cp-table-all-member cp-centered" border=2>
             <tr class="cp-centered">
                 <td>Salary: </td>
                 <td><input class="cp-input" type="number" name="salary" id="salary" required/> <td><p> </p></td></tr>   
             <tr class="cp-centered">
             <div class="settings">
                 <td>Type: </td>
                 <td><p class="cp-center">Bi-monthly</p><input class="cp-input" type="radio" name="type" id="type" value="Bi-monthly" required/></td>
                 <td><p class="cp-center">Monthly</p><input class="cp-input" type="radio" name="type" id="type" value="Monthly"required/>
                 </tr></td>  
              </div>
     </table>
 </fieldset>
     <br>
     <input class="btn" type="submit" name="compute" id="compute" value="Compute">
 </form>  
 <br>
 <?php
 ini_set('display_errors', 0);
    $salary = $_GET['salary'];
    $type = $_GET['type'];

    if($type=="Bi-monthly"){
        $annual=$salary*24;
     }
     else if($type=="Monthly"){
        $annual=$salary*12;
     }
    
     if($annual<250000){
        $annualtax=0;
        $monthlytax=0;
      }
      else if (250000<=$annual&&$annual<400000){
       $annualtax=(($annual-250000)*0.2);
       $monthlytax=(($annual-250000)*0.2)/12;
      }
      else if (400000<=$annual&&$annual<800000){
       $annualtax=30000+(($annual-400000)*0.25);
       $monthlytax=(30000+($annual-400000)*0.25)/12;
      }
      else if (800000<=$annual&&$annual<2000000){
       $annualtax=130000+12*(($annual-800000)*0.3);
       $monthlytax=(130000+($annual-800000)*0.3)/12;
      }
      else if (2000000<=$annual&&$annual<8000000){
       $annualtax=490000+(($annual-2000000)*0.32);
       $monthlytax=(490000+($annual-2000000)*0.32)/12;
      }
      else if (8000000<=$annual){
       $annualtax=2410000+12*(($annual-8000000)*0.35);
       $monthlytax=(2410000+($annual-8000000)*0.35)/12;
      }  
     else{
         alert("Invalid Input!");
     }
 ?>
 <section class="cp-container cp-center cp-content" style="max-width:600px">
 <h4 class="cp-wide">Annual salary: PHP <?php echo $annual; ?></h4>
 <h4 class="cp-wide">Est. Annual tax: PHP <?php echo number_format($annualtax,2,".",""); ?></h4>
 <h4 class="cp-wide">Est. Monthly Tax: PHP <?php echo number_format($monthlytax,2,".",""); ?></h4>
</section>
</body>
</html>

