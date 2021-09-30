<?php
namespace App\Controller;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use App\Model\Table\UsersTable;
use Authentication\Controller\Component\AuthenticationComponent;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\Event\EventInterface;
use Cake\View\Helper\FormHelper;
use CodeItNow\BarcodeBundle\Utils\QrCode;

use Laminas\Diactoros\CallbackStream;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



/**
 * @property UsersTable $Users
 * @property AuthenticationComponent $Authentication
 * @property AuthorizationComponent $Authorization
 *
 *
 */


/**
 * @property UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * @return \Cake\Http\Response|null|void Renders view
     * @var \Cake\Datasource\RepositoryInterface|null
     */


    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login','add']);
    }

//    public function index()
//    {
//
//        $this->Authorization->skipAuthorization();
////        $this->set('users', $this->Users->find()->all());
//        $query1 = $this->Users->find()->contain([
//            'Roles',
//        ])->orderAsc('Users.modified');
//        $users = $this->paginate($query1);
////        $this->Authorization->skipAuthorization();
//        $user = $this->request->getAttribute('identity')->getIdentifier();
//        $user1 = $this->request->getAttribute('identity');
//
//
//        $this->set(compact('users','user','user1'));
//    }

//    public function index()
//    {
//        $query = $this->Users->find()->orderDesc('Users.created');
//        if ($this->getRequest()->getQuery('q')) {
//            $query->where(function (QueryExpression $expression) {
//                $conditions = [
//                    $this->Users->aliasField('first_name').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
//                    $this->Users->aliasField('email').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
//                    $this->Users->aliasField('last_name').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
//                ];
//                return $expression->or($conditions);
//            });
//        }
//        $query = $this->Users->find()->contain([
//            'Roles',
//        ])->orderAsc('Users.modified');
//        $users = $this->paginate($query);
//        $this->Authorization->skipAuthorization();
//        $this->set(compact('users'));
//    }

    public function index()
    {
        $query = $this->Users->find()->orderDesc('Users.created');
        if ($this->getRequest()->getQuery('q')) {
            $query->where(function (QueryExpression $expression) {
                $conditions = [
                    $this->Users->aliasField('first_name').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
                    $this->Users->aliasField('email').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
                    $this->Users->aliasField('last_name').' LIKE' => '%'.$this->getRequest()->getQuery('q'),
                ];
                return $expression->or($conditions);
            });
        }
//        $query = $this->Users->find()->contain([
//            'Roles',
//        ])->orderAsc('Users.modified');
        $users = $this->paginate($query);
        $this->Authorization->skipAuthorization();



        $this->set(compact('users'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!$user->getErrors()) {
                $fileobject = $this->request->getData('image_file');
                $name = $fileobject->getClientFilename();
                $uploadPath = WWW_ROOT.'img'.DS.$name;
                $user->image = $name;
                $fileobject->moveTo($uploadPath);
            }

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



    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->skipAuthorization();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());

            if (!$user->getErrors()) {
                $fileobject = $this->request->getData('image_file');
                $name = $fileobject->getClientFilename();
                $uploadPath = WWW_ROOT.'img'.DS.$name;
                $user->image = $name;
                $fileobject->moveTo($uploadPath);
            }

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The User has been Updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The User could not be saved. Please, try again.'));
        }
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


    public function pdf($id = null)
    {

        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->enableAutoLayout(false);
        $report = $this->Users->get($id);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'download' => true, // This can be omitted if "filename" is specified.
                'filename' => 'Report_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
            ]
        );

        $qrCode=new QrCode();
        $qrCode
            ->setText(" Name: $report->first_name  $report->last_name \n $report->email \n $report->created \n $report->modified \n $report->image")
            ->setSize(200)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r'=>0,'g'=>0,'b'=>0,'a'=>0))
            ->setBackgroundColor(array('r'=>255,'g'=>255,'b'=>255,'a'=>1))
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

//        $im = new Imagick();
//        $image = $im->readImage(WWW_ROOT . 'img' . DS . $report->image);
//        $type = $im->getImageMimeType();
//        $imageView = $im->getImageBlob();
//        $encoded = base64_encode($imageView);
//        $img = '<img src="data:' . $type . ';base64,' . $encoded .'" width = 195, height= 258 alt=""/>';
        $img_qrcode= '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'"/>';
        $this->set(compact('report','img_qrcode'));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->Authorization->skipAuthorization();
        $qrCode=new QrCode();
        $qrCode
            ->setText(" Name: $user->first_name  $user->last_name \n $user->email \n $user->created \n $user->modified \n $user->image")
            ->setSize(200)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r'=>0,'g'=>0,'b'=>0,'a'=>0))
            ->setBackgroundColor(array('r'=>255,'g'=>255,'b'=>255,'a'=>1))
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);

        $img_qrcode= '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'"/>';

        $this->set(compact('user','img_qrcode'));
    }

    public function csv()
    {
        $this->Authorization->skipAuthorization();
        $this->response = $this->response->withDownload('user.csv');
        $users = $this->Users->find();
        $_serialize = 'users';
        $_header = ['id', 'first_name', 'last_name', 'email'];
        $_extract = ['id', 'first_name', 'last_name', 'email'];

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('users', '_serialize', '_header', '_extract'));
    }

    public function excel($id=null)
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', $user->first_name . $user->last_name);
        $sheet->setCellValue('B1', $user->email);
        $sheet->setCellValue('C1', $user->created);
        $writer = new Xlsx($spreadsheet);
        $stream = new CallbackStream(function () use ($writer) {
            $writer->save('php://output');
        });
        $filename = 'sample_'.date('ymd_His');
        $response = $this->response;
        return $response->withType('xlsx')
            ->withHeader('Content-Disposition', "attachment;filename=\"{$filename}.xlsx\"")
            ->withBody($stream);
    }

}
