<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobHistoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobHistoryTable Test Case
 */
class JobHistoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JobHistoryTable
     */
    protected $JobHistory;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.JobHistory',
        'app.Employee',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JobHistory') ? [] : ['className' => JobHistoryTable::class];
        $this->JobHistory = $this->getTableLocator()->get('JobHistory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->JobHistory);

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
