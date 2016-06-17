<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CriteriaDemosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CriteriaDemosTable Test Case
 */
class CriteriaDemosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CriteriaDemosTable
     */
    public $CriteriaDemos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.criteria_demos',
        'app.demos',
        'app.artists',
        'app.agencies',
        'app.criteria'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CriteriaDemos') ? [] : ['className' => 'App\Model\Table\CriteriaDemosTable'];
        $this->CriteriaDemos = TableRegistry::get('CriteriaDemos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CriteriaDemos);

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
