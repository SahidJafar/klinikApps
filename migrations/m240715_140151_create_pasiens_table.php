<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pasiens}}`.
 */
class m240715_140151_create_pasiens_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pasiens}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'nama' => $this->string()->notNull(),
            'alamat' => $this->string()->notNull(),
            'jenis_kelamin' => "ENUM('laki-laki', 'perempuan') NOT NULL",
            'tanggal_lahir' => $this->date()->notNull(),
            'nomor_telepon' => $this->string()->notNull()
        ]);

        // Trigger to generate the id with prefix 'PS'
        $this->execute("
            CREATE TRIGGER before_insert_pasiens
            BEFORE INSERT ON {{%pasiens}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('PS', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_pasiens");
        $this->dropTable('{{%pasiens}}');
    }
}
