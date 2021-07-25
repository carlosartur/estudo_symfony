<?php

namespace App\Controller;

use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/first', name: 'first')]
    public function first(): Response
    {
        $manager = $this->get('doctrine');
        $repository = $manager->getRepository(Tag::class);
        $allTags = $repository->findAll();

        return new JsonResponse(['tags' => $allTags], Response::HTTP_OK);
    }
}
