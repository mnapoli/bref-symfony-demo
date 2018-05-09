deploy:
	APP_ENV=prod vendor/bin/bref deploy

preview:
	APP_ENV=dev php -S 127.0.0.1:8000 bref.php
