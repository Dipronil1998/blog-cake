<?php


namespace App\Test\TestCase\Controller;
use App\Test\Fixture\UsersFixture;
use App\Model\Table\ArticlesTable;
use App\Model\Table\UsersTable;
use Cake\TestSuite\IntegrationTestTrait;

/**
 * @property UsersTable $Users
 */
class UsersControllerTest extends \Cake\TestSuite\TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Users',
        'app.Roles',
        'app.Articles',
        'app.Categories'
    ];

    protected function _login()
    {
        $identity = $this->Users->get(UsersFixture::ID);
        $this->session([
            'Auth' => $identity,
        ]);
    }
    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Users') ? [] : ['className' => UsersTable::class];
        $users = $this->getTableLocator()->get('Users', $config);
        $this->Users = $users;
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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\UsersController::index()
     */
    public function testIndex(): void
    {
        $this->_login();
        $this->enableSecurityToken();
        $this->enableCsrfToken();
        $this->get('/Users');
        $this->assertResponseOk();
    }



    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\UsersController::add()
     */
    public function testAdd(): void
    {
        {
            $this->enableCsrfToken();
            $this->_login();
            $this->enableSecurityToken();
            $this->post('/users/add/',[
                'id' => UsersFixture::ID,
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'testUser@domain.com',
                'password' => '1234',
                'role_id' => '62b09ed1-9d7a-4b0f-9485-1c282348e6de',

            ]);
            $this->assertResponseSuccess();
        }
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\UsersController::edit()
     */


    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\UsersController::delete()
     */
    public function testDelete(): void
    {
        $this->enableCsrfToken();
        $this->post('/users/delete/',[
            'id' => UsersFixture::ID,
        ]);
        $this->assertResponseSuccess();
    }
}
