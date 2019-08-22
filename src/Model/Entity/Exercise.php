<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exercise Entity
 *
 * @property int $id
 * @property string $name_exercise
 * @property string $image
 * @property string $description
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Series[] $series
 */
class Exercise extends Entity
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
        'name_exercise' => true,
        'image' => true,
        'description' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'series' => true
    ];
}
