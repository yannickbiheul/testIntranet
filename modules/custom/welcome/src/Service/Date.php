<?php

namespace Drupal\welcome\Service;

/**
 * Class Contact
 * @package Drupal\welcome\Service
 */
class Date 
{
    /**
     * @param $date1
     * @param $date2
     * @return mixed
     */
    public function differenceDate($date1, $date2)
    {
        $debut = new \DateTime($date1);
        $fin = new \DateTime($date2);
        return $fin->diff($debut)->format("%a");
    }
}