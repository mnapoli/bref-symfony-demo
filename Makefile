preview:
	sam local start-api --region us-east-1

deploy:
	composer install --optimize-autoloader --no-dev --no-scripts
	rm -rf var/cache/*
	php bin/console cache:clear --no-debug --no-warmup --env=prod
	php bin/console cache:warmup --env=prod
	sam package \
	    --template-file template.yaml \
	    --output-template-file .cloudformation.yaml \
	    --s3-bucket bref-demo-symfony
	sam deploy \
	    --template-file .cloudformation.yaml \
	    --capabilities CAPABILITY_IAM \
	    --region us-east-1 \
	    --stack-name bref-demo-symfony
