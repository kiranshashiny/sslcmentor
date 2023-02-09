<?php
   function array2string($myarray,&$output,&$parentkey){
      foreach($myarray as $key=>$value){
         if (is_array($value)) {
            $parentkey .= $key."^";
            array2string($value,$output,$parentkey);
            $parentkey = "";
         }
         else {
            $output .= $parentkey.$key."^".$value."\n";
         }
      }
   }

   // Create some test data
   $mydb[0]['name'] = "John";
   $mydb[0]['city'] = "Boston";
   $mydb[0]['age']  = "32";
   $mydb[1]['name'] = "Max";
   $mydb[1]['city'] = "London";
   $mydb[1]['age']  = "41";
   $mydb[2]['name'] = "Ann";
   $mydb[2]['city'] = "Bonn";
   $mydb[2]['age']  = "29";
   $mydb[3]['name'] = "Peter";
   $mydb[3]['city'] = "Dallas";
   $mydb[3]['age']  = "28";
   $mydb[4]['name'] = "Martin";
   $mydb[4]['city'] = "Berlin";
   $mydb[4]['age']  = "22";


   // Convert the array into string
   array2string($mydb,$output,$parent);

   
   // Store the string in a file   
   $f1 = fopen("test.txt","w+");
   fwrite($f1,$output);
   fclose($f1);
?>
