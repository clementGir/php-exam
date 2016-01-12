<?php

    //validation
    function is_valid_email($email){
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    }

    //erreur
    function message_erreur($errors, $input){
        if($_POST){
            if ($errors[$input] != '') {
                return '<p class="error_message">'.$errors[$input].'</p>';
            }
        }
    }

    //success
    function message_success($success, $input){
        if($_POST){
            if ($success[$input] != '') {
                return '<p class="success_message">'.$success[$input].'</p>';
            }
        }
    }

?>