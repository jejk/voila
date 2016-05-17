<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DemoCriteriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DemoCriteriaTable Test Case
 */
class DemoCriteriaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DemoCriteriaTable
     */
    public $DemoCriteria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.demo_criteria',
        'app.demos',
        'app.criterias',
        'app.artists',
        'app.agencies',
        'app.demo',
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
        $config = TableRegistry::exists('DemoCriteria') ? [] : ['className' => 'App\Model\Table\DemoCriteriaTable'];
        $this->DemoCriteria = TableRegistry::get('DemoCriteria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DemoCriteria);

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
