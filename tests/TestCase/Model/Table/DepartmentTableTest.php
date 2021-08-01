<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DepartmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DepartmentTable Test Case
 */
class DepartmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DepartmentTable
     */
    protected $Department;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Department',
        'app.Business',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Department') ? [] : ['className' => DepartmentTable::class];
        $this->Department = $this->getTableLocator()->get('Department', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Department);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
