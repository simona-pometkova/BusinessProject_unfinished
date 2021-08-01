<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QualificationServiceFixture
 */
class QualificationServiceFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'qualification_service';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'qualification_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'service_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'qualification_id' => ['type' => 'index', 'columns' => ['qualification_id'], 'length' => []],
            'service_id' => ['type' => 'index', 'columns' => ['service_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'qualification_service_ibfk_1' => ['type' => 'foreign', 'columns' => ['qualification_id'], 'references' => ['qualification', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'qualification_service_ibfk_2' => ['type' => 'foreign', 'columns' => ['service_id'], 'references' => ['service', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'qualification_id' => 1,
                'service_id' => 1,
            ],
        ];
        parent::init();
    }
}
