<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use App\Test\Fixture\ArticlesFixture;
use App\Test\Fixture\UsersFixture;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    protected $Users;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Roles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = $this->getTableLocator()->get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Users);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::validationDefault()
     */

    public function testInitialize()
    {
        $this->assertSame('users', $this->Users->getTable());
        $this->assertSame('id', $this->Users->getDisplayField());
        $this->assertSame('id', $this->Users->getPrimaryKey());
        $this->asserttrue($this->Users->hasBehavior('Timestamp'));
        $this->assertInstanceOf(BelongsTo::class, $this->Users->getAssociation('Roles'));
        $this->assertInstanceOf(HasMany::class, $this->Users->getAssociation('Articles'));
    }

    public function testValidationDefaultFirstNameNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['first_name'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(2, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('first_name', $error);
        $this->assertArrayHasKey('_empty', $error['first_name']);
    }

    public function testValidationDefaultFistNameRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['first_name']);
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        $this->assertArrayHasKey('first_name', $error);
        $this->assertArrayHasKey('_required', $error['first_name']);
    }


    public function testValidationDefaultCreateRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['create'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
    }

    public function testValidationDefaultLastNameNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['last_name'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(2, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('last_name', $error);
        $this->assertArrayHasKey('_empty', $error['last_name']);
    }

    public function testValidationDefaultLastNameRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['last_name']);
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        $this->assertArrayHasKey('last_name', $error);
        $this->assertArrayHasKey('_required', $error['last_name']);
    }

    public function testValidationDefaultEmailNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['email'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('email', $error);
        $this->assertArrayHasKey('_empty', $error['email']);
    }

    public function testValidationDefaultEmailRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['email']);
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('email', $error);
        $this->assertArrayHasKey('_required', $error['email']);
    }

    public function testValidationDefaultPasswordNotEmptyString()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        $subject['password'] = null;
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(2, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('password', $error);
        $this->assertArrayHasKey('_empty', $error['password']);
    }

    public function testValidationDefaultPasswordRequirePresence()
    {
        $subject = $this->Users->get(UsersFixture::ID)->toArray();
        unset($subject['password']);
        $validator = $this->Users->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        $this->assertArrayHasKey('password', $error);
        $this->assertArrayHasKey('_required', $error['password']);
    }

    /**
     *  Test to check the role_id field's existIn rule
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRulesRoleIdExistIn(): void
    {
        $data = $this->Users->get(UsersFixture::ID)->toArray();
//        print_r($data);
        $entity = $this->Users->newEntity($data);
        $entity->role_id = 'b43a752d-11a4-4cdd-845a-70433cca6ec6';
        $entity->password = 'test';
        $entity->email = 'testuser2@domain.com';
        $this->assertFalse($this->Users->save($entity));
        $errors= $entity->getErrors();
//        print_r($errors);
        $this->assertArrayHasKey('role_id', $errors);
        $this->assertArrayHasKey('_existsIn', $errors['role_id']);
    }
    /**
     *  Test to check the email field's isUnique rule
     *
     * @return void
     * @uses \App\Model\Table\UsersTable::buildRules()
     */
    public function testBuildRulesEmailIsUnique(): void
    {
        $data = $this->Users->get(UsersFixture::ID)->toArray();
        $data['email'] = 'testUser@domain.com';
        $entity = $this->Users->newEntity($data);
        $this->assertFalse($this->Users->save($entity));
        $errors= $entity->getErrors();
//        print_r($errors);
        $this->assertCount(1, $errors);
        $this->assertArrayHasKey('email', $errors);
        $this->assertArrayHasKey('unique', $errors['email']);
    }
}
