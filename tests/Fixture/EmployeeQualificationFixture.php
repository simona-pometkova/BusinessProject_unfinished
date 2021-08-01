<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeeQualificationFixture
 */
class EmployeeQualificationFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'employee_qualification';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'employee_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'qualification_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'employee_id' => ['type' => 'index', 'columns' => ['employee_id'], 'length' => []],
            'qualification_id' => ['type' => 'index', 'columns' => ['qualification_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'employee_qualification_ibfk_1' => ['type' => 'foreign', 'columns' => ['employee_id'], 'references' => ['employee', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'employee_qualification_ibfk_2' => ['type' => 'foreign', 'columns' => ['qualification_id'], 'references' => ['qualification', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'employee_id' => 1,
                'qualification_id' => 1,
            ],
        ];
        parent::init();
    }
}
