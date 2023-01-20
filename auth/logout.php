<?php

session_start();

session_unset();

session_destroy();

header("Location: http://store.hr:8080/ ");