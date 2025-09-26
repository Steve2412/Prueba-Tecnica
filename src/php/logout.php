<?php

// destruir la sesión y redirigir al inicio
session_start();
session_destroy();
header("Location: ../../index.html");
exit;
