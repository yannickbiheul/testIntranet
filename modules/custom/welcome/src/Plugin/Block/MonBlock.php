<?php

namespace Drupal\welcome\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'monBlock' block.
 * 
 * @Block(
 *  id = "mon_block",
 *  admin_label = @Translation("Mon premier bloc"),
 *  category = @Translation("Custom"),
 * )
 */
class MonBlock extends BlockBase
{
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $date_naissance = '1981-12-16';

        return [
            '#markup' => 'Voici ma date de naissance : ' . $date_naissance,
        ];
    }

    // /**
    //  * Overrides \Drupal\block\BlockBase::blockForm().
    //  */
    // public function blockForm($form, Drupal\Core\Form\FormStateInterface $form_state)
    // {
    //     $form['mon_texte'] = [
    //         '#type' => 'textfield',
    //         '#title' => $this->t('Mon texte'),
    //         '#default_value' => isset($this->configuration['mon_texte']) ? 
    //             $this->configuration['mon_texte'] : '',
    //     ];

    //     return $form;
    // }

    // /**
    //  * Overrides \Drupal\block\BlockBase::blockSubmit().
    //  */
    // public function blockSubmit($form, Drupal\Core\Form\FormStateInterface $form_state)
    // {
    //     $this->configuration['mon_texte'] = $form_state->getValue('mon_texte');
    // }
}