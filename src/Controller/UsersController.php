<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UsersTable;
use Cake\Event\EventInterface;


/**
 * @property UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','add']);
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
//        $this->set('users', $this->Users->find()->all());
        $query = $this->Users->find()->contain([
            'Roles',
        ])->orderAsc('Users.modified');
        $users = $this->paginate($query);
//        $this->Authorization->skipAuthorization();
        $user = $this->request->getAttribute('identity')->getIdentifier();
        $user1 = $this->request->getAttribute('identity');


        $this->set(compact('users','user','user1'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->role_id =$this->request->getData('role_id');

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Unable to add the user!!! '));
        }
        $roles = $this->Users->Roles->find('list')->all();
        $this->set(compact('roles'));
        $this->set('user', $user);
    }


    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        $this->Authorization->skipAuthorization();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Articles',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

//    public function view($id)
//    {
//        $this->Authorization->skipAuthorization();
//        $user = $this->Users->get($id);
//        $this->set(compact('user'));
//    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->skipAuthorization();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
//            dd($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The User has been Updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The User could not be saved. Please, try again.'));
        }
//        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('user'));
    }



    public function logout()
    {
        $result = $this->Authentication->getResult();
        $this->Authorization->skipAuthorization();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect([
                'controller' => 'Users',
                'action' => 'login']);
        }
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $this->Authorization->skipAuthorization();
//        $this->Authorization->authorize($article);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function change($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->skipAuthorization();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), [
                'validate' => 'password'
            ]);
            $user->password =  $this->request->getData('new_password');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The Password has been saved.'));
                return $this->redirect(['action' => 'logout']);
            }
            $this->Flash->error(__('The Password could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));

    }

}
