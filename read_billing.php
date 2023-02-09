<?php

   function string2array($string,&$myarray){

      $lines = explode("\n",$string);

      foreach ($lines as $value){


        $items = explode("\t",$value);

        #$myarray[$items[0]]['GTotal'] = $items[18];
				printf (" $items[0] \n");
        $myarray[$items[0]]['name'] = "shashi";
        $myarray[$items[0]]['lname'] = "kiran";

      }

   }

   // Read the file back from the disk

   $f1 = fopen("tab_delimited.txt","r");
   $newString = fread($f1,filesize('test.txt'));
   fclose($f1);
   
   // Convert the content back to an array
   string2array($newString, $newArray);

	 printf ( " $newArray\n");

   // Print out the array
   foreach ($newArray as $item) {
			echo 'Name: '.$item['ABACUS']['name'].'<br>';
   }

?>
