<?php 
/*

   function that reads directory content and 
   returns the result as links to every file in the directory
   also it disply type wheather its a file or directory

 
    for any help please contact Chetan Akarte...

*/ 
function DirDisply($data) { 
     
     $TrackDir=opendir("."); 
     
     while ($file = readdir($TrackDir)) { 
         
      if ($file == "." || $file == "..") { } 
         else {
             print "<tr><td><font face=\"Verdana, Arial, Helvetica, sans-serif\"><a href=$file target=_blank>$file</a></font> </td>";
             print "<td>  ".filetype($file)."</td></tr><br>";
                 
          }
       
     } 
     closedir($TrackDir); 

return $data; 
} 

?> <b><font face="Verdana, Arial, Helvetica, sans-serif">Current Directory Contain
Following files and Sub Directories...</font></b>
<p>
<? 
@ DirDisply($data); 
?> 
