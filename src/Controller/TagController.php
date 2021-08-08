<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    #[Route('/tag', name: 'tag_list', requirements: ["name" => ".+"])]
    public function index(Request $request): Response
    {
        $manager = $this->getDoctrine();
        $name = $request->get('name');

        /** @var TagRepository */
        $repository = $manager->getRepository(Tag::class);
        $allTags = $name
            ? $repository->findByName($name)
            : $repository->findAll();

        return $this->render('@tag/index.html.twig', compact('allTags'));
    }
}
