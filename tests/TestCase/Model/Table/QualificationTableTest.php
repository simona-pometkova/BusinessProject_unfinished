<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QualificationTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QualificationTable Test Case
 */
class QualificationTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QualificationTable
     */
    protected $Qualification;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Qualification',
        'app.Employee',
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
        $config = $this->getTableLocator()->exists('Qualification') ? [] : ['className' => QualificationTable::class];
        $this->Qualification = $this->getTableLocator()->get('Qualification', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Qualification);

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
}
