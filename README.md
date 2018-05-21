This is a demo of a Symfony application deployed as a serverless application on AWS Lambda using [Bref](https://github.com/mnapoli/bref).

The application is deployed at the following URL: https://7oaryq3rzl.execute-api.eu-west-3.amazonaws.com/dev

If you want to learn more:

- [this article explains how to run serverless PHP applications](http://mnapoli.fr/serverless-php/)
- [Bref](https://github.com/mnapoli/bref) is the framework used to run those applications on AWS lambda
- these lines in [`bref.php`](https://github.com/mnapoli/bref-symfony-demo/blob/master/bref.php#L25-L28) show how the Symfony application is adapted to Bref and AWS lambda
