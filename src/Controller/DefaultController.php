<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route('/first', name: 'first')]
    public function first(): Response
    {
        return new JsonResponse(['number' => random_int(1, 100)], Response::HTTP_OK);
    }
}
