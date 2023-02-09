<?php
 
#$filename = "./widgets.<span class=\"posthilit\">xls</span>";
$filename = "widgets.xls";
 
$sheet1 = 1;
 
$arr=array(1=>'a','b','c','d');
 
$sheet2 = "sheet2";
 
$excel_app = new COM("Excel.application") or Die ("Did not connect");
 
print "Application name: {$excel_app->Application->value}<br>\n" ;
 
print "Loaded version: {$excel_app->Application->version}<br>\n";
 
#print $filename;
 
//$excel_app->Application->Visible = 1; #Make Excel visible.
 
$Workbook = $excel_app->Workbooks->Open($filename) or Die("Did not open $filename $Workbook");
 
$Worksheet = $Workbook->Worksheets($sheet1);
 
echo "AMIT YADAV<br>";
 
$Worksheet->activate;
 
$excel_cell = $Worksheet->Range("C1");
 
$excel_cell->activate;
 
for($i=1; $i<4;$i++)
 
   {
 
   for($j=1; $j<4;$j++)
 
      {
 
         $excel_cell = $Worksheet->Range($arr[$i].$j);
 
         echo "<br> The value is $arr[$i].$j  => " . $excel_cell->value;
 
      }
 
   }
 
     
 
   
 
   
 
 
 
 
 
$excel_result = $excel_cell->value;
 
 
 
$Workbook->Close;
 
unset($Worksheet);
 
unset($Workbook);
 
$excel_app->Workbooks->Close();
 
$excel_app->Quit();
 
unset($excel_app);
 
?>
