<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Authentication\Controller\Component\AuthenticationComponent;
use Authorization\Controller\Component\AuthorizationComponent;
use Cake\ORM\TableRegistry;
use CodeItNow\BarcodeBundle\Utils\QrCode;
use Cake\View\Helper\FormHelper;
/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property AuthenticationComponent $Authentication
 * @property AuthorizationComponent $Authorization
 * @property UsersTable $Users
 */
class ArticlesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        $articles = TableRegistry::getTableLocator()->get('Articles');
        $this->Articles = $articles;
        parent::beforeFilter($event);
        $this->Authorization->skipAuthorization(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function index()
    {
        $query = $this->Articles->find()->contain([
            'Categories',
        ])->orderAsc('Articles.modified');
        $articles = $this->paginate($query);
//        $this->Authorization->skipAuthorization();
        $user = $this->request->getAttribute('identity')->getIdentifier();
        $user1 = $this->request->getAttribute('identity');




        $this->set(compact('articles','user','user1'));
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id,[
            'contain'=>['Categories']
        ]);
        $user = $this->request->getAttribute('identity');
        $qrCode=new QrCode();
        $qrCode
            ->setText(" $article->title  $article->body  \n $article->created \n $article->modified")
            ->setSize(200)
            ->setPadding(10)
            ->setErrorCorrection('high')
            ->setForegroundColor(array('r'=>0,'g'=>0,'b'=>0,'a'=>0))
            ->setBackgroundColor(array('r'=>255,'g'=>255,'b'=>255,'a'=>0))
            ->setLabelFontSize(16)
            ->setImageType(QrCode::IMAGE_TYPE_PNG);
        $img_qrcode= '<img src="data:'.$qrCode->getContentType().';base64,'.$qrCode->generate().'"/>';

        $this->set(compact('article','user','img_qrcode'));

    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
//        $this->Authorization->authorize($article);
//        dd($article);
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $article->category_id = $this->request->getData('category_id');
            $article->user_id = $this->request->getAttribute('identity')->getIdentifier();
//            dd($article->user_id);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $categories = $this->Articles->Categories->find('list')->all();
        $this->set(compact('categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => [],
        ]);
        //$this->Authorization->authorize($article);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $categories = $this->Articles->Categories->find('list', ['limit' => 200]);
        $this->set(compact('article', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
//        $this->Authorization->authorize($article);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function pdf($id = null)
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $report = $this->Articles->get($id);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'download' => true, // This can be omitted if "filename" is specified.
                'filename' => 'Report_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
            ]
        );
        $this->set(compact('report'));
    }


}
