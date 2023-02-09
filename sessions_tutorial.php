<?php
    include( 'class_session.php' );
    // Use this in every page you wa! nt to use sessions first
    $sess = new sessions();
     
    // To set a variable
    $name = 'langoor, leapinglangoor';
    $sess->set_var( 'name', $name );

    // Let's retrieve it
    $name_got = $sess->get_var( 'name' );

	echo "the name I got was $name_got";

    // Let's delete the var
    $sess->del_var( 'name' );

    // We're done let's exit
    $sess->end_session();
?> 
