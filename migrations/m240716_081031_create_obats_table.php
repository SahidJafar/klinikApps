<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%obats}}`.
 */
class m240716_081031_create_obats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%obats}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'nama_obat' => $this->string()->notNull(),
            'biaya_obat' => $this->integer()->notNull(),
            'jumlah_stok'=> $this->integer()->notNull(),
        ]);

        // Trigger to generate the id with prefix 'OB'
        $this->execute("
            CREATE TRIGGER before_insert_obats
            BEFORE INSERT ON {{%obats}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('OB', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_obats");
        $this->dropTable('{{%obats}}');
    }
}
