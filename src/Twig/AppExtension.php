<?php

namespace App\Twig;

use App\Entity\MainPage;
use App\Entity\Navigation;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('json_decode', [$this, 'decodeJSON']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('main_navigation', [$this, 'loadMainNavigation']),
        ];
    }

    public function decodeJSON($value)
    {
        return json_decode($value);
    }

    public function loadMainNavigation()
    {
        return $this->em->getRepository(Navigation::class)->findMainNavigation();
    }
}
