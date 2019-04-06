<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 06/04/2019
 * Time: 10:05
 */

namespace App\Routing;


use App\Entity\Navigation;
use Doctrine\DBAL\Exception\TableNotFoundException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class ExtraLoader extends Loader
{
//    private $isLoaded = false;
//
//    public function load($resource, $type = null)
//    {
//        if(true === $this->isLoaded){
//            throw new \RuntimeException("Do not add the 'Extra' loader twice");
//        }
//
//        $routes = new RouteCollection();
//
//        // Prepare a new route
//        $path = '/extra/{parameter}';
//        $defaults = [
//            '_controller' => 'App\Controller\ExtraController::extra'
//        ];
//        $requirements = [
//            'parameter' => '\d+'
//        ];
//        $route = new Route($path, $defaults, $requirements);
//
//        // Add the new route to the route collection
//        $routeName = 'extraRoute';
//        $routes->add($routeName, $route);
//
//        $this->isLoaded = true;
//
//        return $routes;
//
//    }
//
//    public function supports($resource, $type = null)
//    {
//        return 'extra' === $type;
//    }


    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->isLoaded = false;
        $this->entityManager = $entityManager;
    }

    /**
     * @return Navigation[]
     */
    private function getNavigation()
    {
        try {
            return $this->entityManager
                ->getRepository(Navigation::class)
                ->findMainNavigation();
        } catch (TableNotFoundException $e){
            return [];
        }
    }

    private function createNavigationRoute(Navigation $navigation)
    {
        return new Route('/extra/'.$navigation->getSlug(), [
            '_controller' => 'App\Controller\ExtraController:extra',
            'id' => $navigation->getId()
        ]);
    }

    private function createNavigationRouteName(Navigation $navigation)
    {
        return sprintf('navigation_page_%s', $navigation->getId());
    }

    public function load($resource, $type = null)
    {
        $routes = new RouteCollection();

        foreach ($this->getNavigation() as $nav){
            $routes->add(
                $this->createNavigationRouteName($nav),
                $this->createNavigationRoute($nav)
            );
        }
        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return $type === 'extra';
    }

}