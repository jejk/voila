<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Criterion Entity.
 *
 * @property int $id
 * @property string $title_fr
 * @property string $title_en
 * @property string $title_es
 * @property string $title_it
 * @property \App\Model\Entity\Demo[] $demo
 */
class Criterion extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
