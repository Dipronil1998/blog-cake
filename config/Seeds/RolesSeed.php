<?php
declare(strict_types=1);

use Cake\I18n\Time;
use Migrations\AbstractSeed;

/**
 * Categories seed.
 */
class RolesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $time = (new Time())->format('Y-m-d H:i:s');
        $data = [
            [
                'id' => \Cake\Utility\Text::uuid(),
                'code'=>'1',
                'title' => 'Admin',
                'description' => 'Administrator',
                'created' => $time,
                'modified' => $time,
            ],
            [
                'id' => \Cake\Utility\Text::uuid(),
                'code'=>'2',
                'title' => 'author',
                'description' => 'Writer',
                'created' => $time,
                'modified' => $time,
            ],
        ];

        $table = $this->table('roles');
        $table->truncate();
        $table->insert($data)->save();
    }
}
