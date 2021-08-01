<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Busines Entity
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property \Cake\I18n\FrozenDate $founding_date
 * @property string $address
 * @property int $type
 *
 * @property \App\Model\Entity\BusinessOwner $business_owner
 */
class Busines extends Entity
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
        'owner_id' => true,
        'name' => true,
        'founding_date' => true,
        'address' => true,
        'type' => true,
        'business_owner' => true,
    ];
}
