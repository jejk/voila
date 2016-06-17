<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\Cache\Cache;

/**
 * I18nMessage Entity.
 *
 * @property int $id
 * @property string $domain
 * @property string $locale
 * @property string $singular
 * @property string $plural
 * @property string $context
 * @property string $value_0
 * @property string $value_1
 * @property string $value_2
 */
class I18nMessage extends Entity
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
