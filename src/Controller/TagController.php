<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    #[Route('/tag/{name}', name: 'tag_list', requirements: ["name" => ".+"])]
    public function index(?string $name = null): Response
    {
        $manager = $this->getDoctrine();

        /** @var TagRepository */
        $repository = $manager->getRepository(Tag::class);
        $allTags = $name
            ? $repository->findByName($name)
            : $repository->findAll();

        return $this->render('tag/index.html.twig', compact('allTags'));
    }
}
