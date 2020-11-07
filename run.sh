#!/bin/bash
green="$(tput setaf 2)"
reset="$(tput sgr0)"
function green() { echo "${green}${@}${reset}"; }

green 'Visit http://localhost:8000/sun/1/m in your browser'
# php -S 0.0.0.0:8000 router.php
hyper-run -S 0.0.0.0:8000 -s 0.0.0.0:443 router.php

