deploy: optimize package upload
optimize:
	APP_ENV=prod php bin/console cache:clear --no-debug --no-warmup
	APP_ENV=prod php bin/console cache:warmup
package:
	sam package \
        --template-file template.yaml \
        --output-template-file .cloudformation.yaml \
        --s3-bucket bref-demo
upload:
	sam deploy \
        --template-file .cloudformation.yaml \
        --stack-name bref-symfony-demo \
        --capabilities CAPABILITY_IAM \
        --region us-east-1

preview:
	APP_ENV=dev php -S 127.0.0.1:8000 bref.php
