<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users', [
            'id' => false,
            'primary_key' => 'id',
        ]);
        $table
            ->addColumn('id', 'uuid')
            ->addColumn('first_name', 'string', [
                'null' => false
            ])
            ->addColumn('last_name','string', [
                'null' => false
            ])
            ->addColumn('email', 'string', [
                'null' => false
            ])
            ->addColumn('password', 'string', [
                'limit' => 64,
                'null' => false
            ])
            ->addColumn('image', 'string', [
                'null' => false,
                'default'=>null
            ])
            ->addColumn('role_id', 'uuid', [
                'null' => false
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addIndex('email', [
                'unique' => true,
                'name' => 'uniq_email'
            ])
            ->create();
    }
}
