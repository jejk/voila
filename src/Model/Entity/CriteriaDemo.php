<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CriteriaDemo Entity.
 *
 * @property int $id
 * @property int $demo_id
 * @property \App\Model\Entity\Demo $demo
 * @property int $criterion_id
 * @property \App\Model\Entity\Criterion $criterion
 * @property int $artist_id
 * @property \App\Model\Entity\Artist $artist
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class CriteriaDemo extends Entity
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
