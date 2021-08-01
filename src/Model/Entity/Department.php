<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property int $business_id
 * @property string $name
 * @property string $address
 * @property string $manager
 * @property int $num_of_employees
 *
 * @property \App\Model\Entity\Busines $busines
 */
class Department extends Entity
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
        'business_id' => true,
        'name' => true,
        'address' => true,
        'manager' => true,
        'num_of_employees' => true,
        'busines' => true,
    ];
}
