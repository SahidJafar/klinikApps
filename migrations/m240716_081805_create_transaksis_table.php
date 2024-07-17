<?php
use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksis}}`.
 */
class m240716_081805_create_transaksis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksis}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'id_resep' => $this->string()->notNull(),
            'tanggal_bayar' => $this->date()->notNull(),
            'total_bayar' => $this->integer()->notNull(),
            'uang_bayar' => $this->integer()->notNull(),
            'uang_kembalian' => $this->integer()->notNull(),
            'status_registrasi' => "ENUM('lunas', 'belum lunas') NOT NULL DEFAULT 'belum lunas'",
        ]);
    
        // Trigger to generate the id with prefix 'TR'
        $this->execute("
            CREATE TRIGGER before_insert_transaksis
            BEFORE INSERT ON {{%transaksis}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('TR', UUID());
            END;
        ");

        // Add foreign key
        $this->addForeignKey(
            'fk_transaksis_id_resep',
            '{{%transaksis}}',
            'id_resep',
            '{{%reseps}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key first before dropping the table
        $this->dropForeignKey(
            'fk_transaksis_id_resep',
            '{{%transaksis}}'
        );

        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_transaksis");
        $this->dropTable('{{%transaksis}}');
    }
}
