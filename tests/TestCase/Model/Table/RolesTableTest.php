<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolesTable;
use App\Model\Table\UsersTable;
use App\Test\Fixture\CategoriesFixture;
use App\Test\Fixture\RolesFixture;
use App\Test\Fixture\UsersFixture;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RolesTable
     */
    protected $Roles;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Roles',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Roles') ? [] : ['className' => RolesTable::class];
        $this->Roles = $this->getTableLocator()->get('Roles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Roles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RolesTable::validationDefault()
     */
    public function testInitialize()
    {
        $this->assertSame($this->Roles->getTable(), 'roles');
        $this->assertSame('title',$this->Roles->getDisplayField());
        $this->assertSame('id',$this->Roles->getPrimaryKey());
        $this->asserttrue($this->Roles->hasBehavior('Timestamp'));
        $this->assertInstanceOf(HasMany::class,$this->Roles->getAssociation('Users'));

    }
    public function testValidationDefaultCodeNotEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['code'] = null;
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('code', $error);
        $this->assertArrayHasKey('_empty', $error['code']);
    }
    public function testValidationDefaultCodeRequirePresence()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        unset($subject['code']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('code', $error);
        $this->assertArrayHasKey('_required', $error['code']);
    }

    public function testValidationDefaultTitleNotEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        $subject['title'] = null;
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(2, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_empty', $error['title']);
    }
    public function testValidationDefaultTitleRequirePresence()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        unset($subject['title']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(2, $error);
        $this->assertArrayHasKey('title', $error);
        $this->assertArrayHasKey('_required', $error['title']);
    }
    public function testValidationDefaultDescriptionEmptyString()
    {
        $subject = $this->Roles->get(RolesFixture::ID)->toArray();
        unset($subject['description']);
        $validator = $this->Roles->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
//        print_r($error);
//        $this->assertArrayHasKey('description', $error);
//        $this->assertArrayHasKey('_empty', $error['description']);
    }




    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RolesTable::buildRules()
     */
    public function testBuildRulesCodeIsUnique(): void
    {
        $data = $this->Roles->get(RolesFixture::ID)->toArray();
        $data['code'] = 'abcd';
        $entity = $this->Roles->newEntity($data);
        $this->assertFalse($this->Roles->save($entity));
        $errors= $entity->getErrors();
//        print_r($errors);
        $this->assertCount(1, $errors);
        $this->assertArrayHasKey('code', $errors);
        $this->assertArrayHasKey('unique', $errors['code']);
    }
}
