<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;
use App\Test\Fixture\ArticlesFixture;
use App\Test\Fixture\CategoriesFixture;
use App\Model\Table\CategoriesTable;
use Cake\ORM\Association\BelongsTo;

use Cake\ORM\Association\HasMany;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesTable Test Case
 */
class CategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesTable
     */
    protected $Categories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Categories',
        'app.Articles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $this->Categories = $this->getTableLocator()->get('Categories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Categories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CategoriesTable::validationDefault()
     */
    public function testInitialize()
    {
        $this->assertSame('categories',$this->Categories->getTable());
        $this->assertSame('name',$this->Categories->getDisplayField());
        $this->assertSame('id',$this->Categories->getPrimaryKey());
        $this->asserttrue($this->Categories->hasBehavior('Timestamp'));
        $this->assertInstanceOf(HasMany::class,$this->Categories->getAssociation('Articles'));
    }
    public function testValidationDefaultNameNotEmptyString()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        $subject['name'] = null;
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
//        print_r($error);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('name', $error);
        $this->assertArrayHasKey('_empty', $error['name']);
    }

    public function testValidationDefaultNameRequirePresence()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        unset($subject['name']);
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(1, $error);
        $this->assertIsArray($error);
        $this->assertArrayHasKey('name', $error);
        $this->assertArrayHasKey('_required', $error['name']);
    }

    public function testValidationDefaultDescriptionEmptyString()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
        unset($subject['description']);
        $validator = $this->Categories->getValidator('default');
        $error = $validator->validate($subject);
        $this->assertCount(0, $error);
        $this->assertIsArray($error);
//        print_r($error);
//        $this->assertArrayHasKey('description', $error);
//        $this->assertArrayHasKey('_empty', $error['description']);
    }
public function testValidationDefaultNameMaxLength()
{
    $subject = $this->Categories->get(CategoriesFixture::ID)->toArray();
    $subject['name'] = 'tooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLongtooLong';
    $validator = $this->Categories->getValidator('default');
    $error = $validator->validate($subject);
    $this->assertCount(1, $error);
    //print_r($error);
    $this->assertArrayHasKey('name', $error);
    $this->assertArrayHasKey('maxLength', $error['name']);
}


    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CategoriesTable::buildRules()
     */
    public function testBuildRulesExistsIn()
    {
        $subject = $this->Categories->get(CategoriesFixture::ID);
        $subject['parent_id'] = "8b0b2080-18fa-4bbc-90c5-3a0abf48049d";
        $this->assertFalse($this->Categories->save($subject));
        $error = $subject->getErrors();
//      print_r($error);
        $this->assertCount(1, $error);
        $this->assertArrayHasKey('parent_id',$error);
        $this->assertArrayHasKey('_existsIn',$error['parent_id']);

    }
}
