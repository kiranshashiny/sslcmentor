#!/usr/bin/perl




use File::stat;

$sb = stat ("willbk.jpg" );

printf " File size is ".$sb->size ."\n";
print " time it was touched ".scalar localtime $sb-> mtime;
