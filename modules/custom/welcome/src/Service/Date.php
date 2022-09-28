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
    public function differenceDate($date1)
    {
        $today = new \DateTime();
        $naissance = new \DateTime($date1);
        return $today->diff($naissance)->format("%a");
    }
}