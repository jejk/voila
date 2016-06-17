<?php
namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Artist Entity.
 *
 * @property int $id
 * @property int $agency_id
 * @property \App\Model\Entity\Agency $agency
 * @property string $email
 * @property string $password
 * @property bool $active
 * @property \Cake\I18n\Time $expiration
 * @property int $nbrdemo
 * @property string $slug
 * @property string $first_name
 * @property string $last_name
 * @property string $description
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property bool $accept_agence_edit
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Criterion[] $criteria
 * @property \App\Model\Entity\Demo[] $demos
 */
class Artist extends Entity
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

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
	
	
}
