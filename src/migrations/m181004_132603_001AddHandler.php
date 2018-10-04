<?php

namespace lukeyouell\support\migrations;

use Craft;
use craft\db\Migration;

/**
 * m181004_132603_001AddHandler migration.
 */
class m181004_132603_001AddHandler extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%support_ticketstatuses}}', 'requiresAgent', $this->boolean());
        $this->addColumn('{{%support_tickets}}', 'agentId', 'int');
        $this->addForeignKey(
            $this->db->getForeignKeyName('{{%support_tickets}}', 'agentId'),
            '{{%support_tickets}}',
            'agentId',
            '{{%users}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m181004_132603_001AddHandler cannot be reverted.\n";
        return false;
    }
}
