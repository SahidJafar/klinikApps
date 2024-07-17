<?php
namespace console\seeder;

use diecoding\seeder\TableSeeder;
use Yii;

class Seeder extends TableSeeder
{
    /**
     * Default execution
     *
     * @return void
     */
    public function run()
    {
        $this->createUser();
    }

    private function createUser()
    {
        $user = [
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Yii::$app->security->generatePasswordHash('12345678'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'access_token' => Yii::$app->security->generateRandomString(),
        ];

        $this->insert('{{%users}}', $user);
    }
}
