<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemoTable Test Case
 */
class DemoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DemoTable
     */
    public $Demo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.demo',
        'app.artists',
        'app.agencies',
        'app.demo_criteria',
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
        $config = TableRegistry::exists('Demo') ? [] : ['className' => 'App\Model\Table\DemoTable'];
        $this->Demo = TableRegistry::get('Demo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Demo);

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
