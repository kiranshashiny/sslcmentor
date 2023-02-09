<?php

    function getLang($lang)
    {
        global $messages;

        $display_message = $messages[$lang];

        return $display_message;
    }

?>


