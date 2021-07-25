<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach (range(0, 30, 2) as $tagNumber) {
            $tag = new Tag();
            $tag->setName("{$tagNumber} - Tag");
            $manager->persist($tag);
        }
        $manager->flush();
    }
}
