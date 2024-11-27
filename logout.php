<!-- pagina para apagar a sessao atual -->
<?php
session_start();
session_destroy();
header('Location: login.html');