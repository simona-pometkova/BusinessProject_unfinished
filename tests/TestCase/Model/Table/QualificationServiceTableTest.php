<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualificationServiceTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualificationServiceTable Test Case
 */
class QualificationServiceTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QualificationServiceTable
     */
    protected $QualificationService;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.QualificationService',
        'app.Qualification',
        'app.Service',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QualificationService') ? [] : ['className' => QualificationServiceTable::class];
        $this->QualificationService = $this->getTableLocator()->get('QualificationService', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->QualificationService);

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
