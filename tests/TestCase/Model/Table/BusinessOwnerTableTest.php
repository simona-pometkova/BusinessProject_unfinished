<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessOwnerTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessOwnerTable Test Case
 */
class BusinessOwnerTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessOwnerTable
     */
    protected $BusinessOwner;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BusinessOwner',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BusinessOwner') ? [] : ['className' => BusinessOwnerTable::class];
        $this->BusinessOwner = $this->getTableLocator()->get('BusinessOwner', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BusinessOwner);

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
