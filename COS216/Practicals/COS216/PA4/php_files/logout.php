<script>
    localStorage.clear();
</script>

<?php

session_start();

// localStorage.clear();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location: ../today.html');

?>

