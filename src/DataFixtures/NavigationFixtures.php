<?php

namespace App\DataFixtures;

use App\Entity\Navigation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class NavigationFixtures extends Fixture
{

    static $navigationItems = [
        "Cabins",
        "Lodges",
        "Loose Reins Country",
        "Out And About",
        "Pantry",
        "Loose Talk",
        "Reviews"
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::$navigationItems as $title){
            $navItem = new Navigation();
            $navItem->setTitle($title);
            $manager->persist($navItem);
        }

        $manager->flush();
    }
}
