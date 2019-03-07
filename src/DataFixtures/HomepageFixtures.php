<?php

namespace App\DataFixtures;

use App\Entity\Homepage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HomepageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $panels = [
            [
                //"title" => 'Stay.',
                "content" => '<h2>Stay.</h2><p>Loose Reins is where the world slows down. It’s where the daily grind is left at the gate and a place of experience, discovery and relaxation opens up. It’s where you reconnect, come together and unwind in luxurious lodges or cosy cabins. Surrounded by beautiful Dorset countryside, it’s the place where life’s stresses end and life’s adventures begin.</p><p>Put those feet up and toast marshmallows on the fire. Take things slow. Rock back on the cabin porch. Listen to the owls. Snuggle inside with the woodburner or feel the summer dew on your feet. Make friends with the ponies, make memories forever.</p><p>Live the pioneer life in tranquil comfort. Share a home-cooked meal and share trail talk under the stars. ‘Do not go where the path may lead,’ As Ralph Waldo Emerson said, ‘go instead where there is no path and leave a trail.’ Discover Loose Reins. Discover your trail.</p>',
                "image" => "images/homepage/bed-cup.jpg"
            ],
            [
                //"title" => "Discover",
                "content" => "<h2>Discover.</h2><p>See the world from the Wessex Ridgeway. Walk through the woods and see the deer. Take a picnic. Dine out in nature. Listen for birdsong or the rustle of woodland wildlife. Share tales from the trail. Smell the wood smoke. Plan tomorrow’s adventure.</p><p>Learn some rural crafts, hire a bike and explore the North Dorset Trailway, walk on our Ancient Hill Forts, paddle in the river or explore the Blackmore Vale. Take a trip to the Jurassic Coast and find a fossil or visit the many attractions in the area.</p><p>Or discover the magic of Loose Reins; make the days as long as you want them to be, relax, unwind and enjoy the moment.</p><a href=\"#\">More About Us</a>",
                "image" => "images/homepage/dorset-countryside.jpg"
            ],
        ];

        $homepage = new Homepage();
        $homepage->setTitle('Homepage');
        $homepage->setRoute('app_default_homepage');
        $homepage->setPanels($panels);


        $manager->persist($homepage);
        $manager->flush();
    }
}
