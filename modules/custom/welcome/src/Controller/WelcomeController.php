<?php
namespace Drupal\welcome\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller routines for welcome module routes.
 */
class WelcomeController extends ControllerBase
{
    protected $date;

    // Précision du chemin complet pour avoir accès à "Date" du Service.
    public function __construct(\Drupal\welcome\Service\Date $date)
    {
        $this->date = $date;
    }

    /**
     * {@inheritdoc}
     * Précision du chemin complet pour avoir accès à "ContainerInterface",
     * sinon il va le chercher dans le dossier "Controller" de ce module.
     */
    public static function create(\Psr\Container\ContainerInterface $container)
    {
        return new static(
            $container->get('welcome.date')
        );
    }

    /**
     * @return array
     * A render array containing the page content.
     */
    public function Welcome() 
    {
        // L'injection de dépendance se fait grâce à "\Drupal::service".
        $serviceDate = \Drupal::service('welcome.date');
        $difference = $serviceDate->differenceDate("2020-04-26", "2020-07-11");
        $element = array('#markup' => 'Mon premier module sur Drupal 9, la différence entre le 26 avril et le 11 juillet est de : ' . $difference . ' jours.');
        return $element;
    }
}

?>