<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeTable Test Case
 */
class EmployeeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeTable
     */
    protected $Employee;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Employee',
        'app.Department',
        'app.Qualification',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Employee') ? [] : ['className' => EmployeeTable::class];
        $this->Employee = $this->getTableLocator()->get('Employee', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Employee);

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
