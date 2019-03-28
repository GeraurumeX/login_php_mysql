<?php

    session_start();

    session_unset();

    session_destroy();

    header( "Location: /login_registro_php_mysql_fazt");

?>