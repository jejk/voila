<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CriteriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CriteriaTable Test Case
 */
class CriteriaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CriteriaTable
     */
    public $Criteria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.criteria',
        'app.demos',
        'app.artists',
        'app.agencies',
        'app.demo_criteria',
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
        $config = TableRegistry::exists('Criteria') ? [] : ['className' => 'App\Model\Table\CriteriaTable'];
        $this->Criteria = TableRegistry::get('Criteria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Criteria);

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
}
