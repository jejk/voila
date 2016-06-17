<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Demo Entity.
 *
 * @property int $id
 * @property int $artist_id
 * @property \App\Model\Entity\Artist $artist
 * @property bool $active
 * @property int $order
 * @property string $title
 * @property string $customer
 * @property string $url
 * @property \Cake\I18n\Time $end_date
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Criterion[] $criteria
 */
class Demo extends Entity
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
