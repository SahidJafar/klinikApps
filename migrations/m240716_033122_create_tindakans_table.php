<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tindakans}}`.
 */
class m240716_033122_create_tindakans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tindakans}}', [
           'id' => $this->string(50)->notNull()->unique(),
            'nama_tindakan' => $this->string()->notNull(),
            'biaya_tindakan' => $this->integer()->notNull(),
        ]);

        // Trigger to generate the id with prefix 'TK'
        $this->execute("
            CREATE TRIGGER before_insert_tindakans
            BEFORE INSERT ON {{%tindakans}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('TK', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_tindakans");
        $this->dropTable('{{%tindakans}}');
    }
}
