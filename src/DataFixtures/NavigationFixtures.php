<?php

namespace App\DataFixtures;

use App\Entity\Navigation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class NavigationFixtures extends Fixture
{
    static $counter = 1;

    static $navTitles = [
        "Cabins",
        "Lodges",
        "Loose Reins Country",
        "Out And About",
        "Pantry",
        "Loose Talk",
        "Reviews"
    ];

    static $navImages = [
        "cabins-banner.jpg",
        "lodges-banner.jpg",
        "loose-reins-country-banner.jpg",
        "out-and-about-banner.jpg",
        "pantry-banner.jpg",
        "loose-talk-banner.jpg",
        "review-banner.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < count(self::$navTitles); $i++){

            $navItem = new Navigation();
            $navItem->setTitle(self::$navTitles[$i]);
            $navItem->setImage(self::$navImages[$i]);

            // Add a reference nav_item#COUNTER#
            $this->addReference(sprintf('%s_%d', 'nav_item', self::$counter), $navItem);
            self::$counter++;

            $manager->persist($navItem);
        }

        $manager->flush();
    }
}
