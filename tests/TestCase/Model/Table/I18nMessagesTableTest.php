<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\I18nMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\I18nMessagesTable Test Case
 */
class I18nMessagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\I18nMessagesTable
     */
    public $I18nMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.i18n_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('I18nMessages') ? [] : ['className' => 'App\Model\Table\I18nMessagesTable'];
        $this->I18nMessages = TableRegistry::get('I18nMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->I18nMessages);

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
