#!/usr/bin/perl


printf ("hello world");


$FH = open "neel.html";
while ( <FH> ) {



		printf ( "$_\n" );



}
close FH;

