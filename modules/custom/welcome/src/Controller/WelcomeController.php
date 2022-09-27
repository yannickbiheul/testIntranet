<?php
namespace Drupal\welcome\Controller;

use StringTranslationTrait;

class WelcomeController 
{
    public function Welcome() 
    {
        $element = array('#markup' => 'Mon premier module sur Drupal 9');
        return $element;
        // $build = [
        //     '#type' => 'markup',
        //     '#markup' => $this->t('Salut Monde !'),
        // ];
        // return buid;
    }
}

?>