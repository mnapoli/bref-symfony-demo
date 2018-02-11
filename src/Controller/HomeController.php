<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        return new Response(
            '<html><body>Hello world!</body></html>'
        );
    }
}
