<?php

namespace App\DataFixtures;

use App\Entity\MainPage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MainPageFixtures extends Fixture
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
        "images/navigation_images/cabins-banner.jpg",
        "images/navigation_images/lodges-banner.jpg",
        "images/navigation_images/loose-reins-country-banner.jpg",
        "images/navigation_images/out-and-about-banner.jpg",
        "images/navigation_images/pantry-banner.jpg",
        "images/navigation_images/loose-talk-banner.jpg",
        "images/navigation_images/review-banner.jpg"
    ];

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < count(self::$navTitles); $i++){

            $navItem = new MainPage();
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
