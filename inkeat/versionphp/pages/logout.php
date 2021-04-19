<?php
    session_start();
    session_destroy();
    header('Location: /inkeat/index');
?>