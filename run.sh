#!/bin/bash
green="$(tput setaf 2)"
reset="$(tput sgr0)"
function green() { echo "${green}${@}${reset}"; }

cert=/etc/letsencrypt/live/vos.ajmoon.uk/fullchain.pem
export PATH="/home/ubuntu/.config/composer/vendor/bin:$PATH"

green 'Visit http://localhost:8000/sun/1/m in your browser'
if [[ -f "$cert" ]]; then
    hyper-run -S 0.0.0.0:8000  -s 0.0.0.0:443 -r router.php -c $cert
else
    hyper-run -S 0.0.0.0:8000 -s 0.0.0.0:443 -r router.php
fi

