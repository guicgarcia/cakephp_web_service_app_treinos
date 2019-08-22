<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Series Entity
 *
 * @property int $id
 * @property int $repetitions
 * @property float $weight
 * @property int $order_exercise
 * @property int $exercise_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Exercise $exercise
 */
class Series extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'repetitions' => true,
        'weight' => true,
        'order_exercise' => true,
        'exercise_id' => true,
        'created' => true,
        'modified' => true,
        'exercise' => true
    ];
}
