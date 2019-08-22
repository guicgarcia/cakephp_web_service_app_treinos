<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SeriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SeriesTable Test Case
 */
class SeriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SeriesTable
     */
    public $Series;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.series',
        'app.exercises'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Series') ? [] : ['className' => SeriesTable::class];
        $this->Series = TableRegistry::getTableLocator()->get('Series', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Series);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
