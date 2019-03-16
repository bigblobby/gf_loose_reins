<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MediaFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 32; $i++){
            $image = new Media();
            $image->setTitle("Image $i");
            $image->setPath("images/gallery/square/$i.jpg");

            $manager->persist($image);
        }

        $manager->flush();
    }
}
