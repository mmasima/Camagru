<?php
session_start();

    if(!$_SESSION['verified'])
        echo "user verified";