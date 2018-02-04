<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Persons Controller
 *
 * @property \App\Model\Table\PersonsTable $Persons
 *
 * @method \App\Model\Entity\Person[] paginate($object = null, array $settings = [])
 */
class PersonsController extends AppController
{

    public $paginate = [
        'limit' => 4,
        'order' => [
            'Persons.id' => 'asc'
        ]
    ];
     
     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->tags = TableRegistry::get('tags');
    }


    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['find']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tags = $this->tags->find();
        $this->set(compact('tags'));


        $persons = $this->paginate($this->Persons);

        $this->set(compact('persons'));
        $this->set('_serialize', ['persons']);

        $this->loadModel('Keywords');
        $keywords = $this->Keywords->find();
        $this->set(compact('keywords'));

        $this->loadModel('Bookmarks');
        $bookmarks = $this->Bookmarks->find('all',array(
	    'order' => array('id' => 'DESC')));
        $this->set(compact('bookmarks'));

        $this->loadModel('Photos');
        $photos = $this->Photos->find()
        ->where(['area' => "リビング"])
        ->order(['id'=>"desc"])
        ->first();
        $this->set(compact('photos'));
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);

        $this->set('person', $person);
        $this->set('_serialize', ['person']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->Persons->newEntity();
        if ($this->request->is('post')) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->Persons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $this->set(compact('person'));
        $this->set('_serialize', ['person']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $person = $this->Persons->get($id);
        if ($this->Persons->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
public function find() {
    $this->set('msg', 'メッセージ代入できましたたた。');
    $persons = [];
        $find = $this->request->getData("find");

        $persons = $this->Persons->find()
        ->where(["persons.name like " => '%' . $find . '%']);
 
			//全部検索
            //$persons = $this->Persons->find();

			//指名検索
            //->where(["Persons.name" => '山田']);

			//あいまい検索
			//->where(["Persons.name like " => '%山%']);

			//and検索
            //->where(["Persons.name" => '山田'])
            //->where(["Persons.age" => '22']);

			//or検索
			//->where(["Persons.name" => '山田'])
            //->orwhere(["Persons.age" => '21']);
			
			//or検索とあいまい検索
           //->orWhere(["Persons.id" => 7])
           //->orWhere(["Persons.mail like " => '%fff%']);
		   
		   
		   
		   
    $this->set('persons', $persons);
}
	
}
