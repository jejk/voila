<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemosTable Test Case
 */
class DemosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DemosTable
     */
    public $Demos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.demos',
        'app.artists',
        'app.agencies',
        'app.demo_criteria',
        'app.criteria',
        'app.criteria_demos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Demos') ? [] : ['className' => 'App\Model\Table\DemosTable'];
        $this->Demos = TableRegistry::get('Demos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Demos);

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
