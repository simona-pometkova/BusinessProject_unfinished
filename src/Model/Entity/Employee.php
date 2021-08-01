<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $dept_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Qualification[] $qualification
 */
class Employee extends Entity
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
        'dept_id' => true,
        'first_name' => true,
        'last_name' => true,
        'address' => true,
        'department' => true,
        'qualification' => true,
    ];
}
