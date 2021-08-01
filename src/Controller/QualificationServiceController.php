<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QualificationService Controller
 *
 * @property \App\Model\Table\QualificationServiceTable $QualificationService
 * @method \App\Model\Entity\QualificationService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QualificationServiceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Qualification', 'Service'],
        ];
        $qualificationService = $this->paginate($this->QualificationService);

        $this->set(compact('qualificationService'));
    }

    /**
     * View method
     *
     * @param string|null $id Qualification Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $qualificationService = $this->QualificationService->get($id, [
            'contain' => ['Qualification', 'Service'],
        ]);

        $this->set(compact('qualificationService'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $qualificationService = $this->QualificationService->newEmptyEntity();
        if ($this->request->is('post')) {
            $qualificationService = $this->QualificationService->patchEntity($qualificationService, $this->request->getData());
            if ($this->QualificationService->save($qualificationService)) {
                $this->Flash->success(__('The qualification service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qualification service could not be saved. Please, try again.'));
        }
        $qualification = $this->QualificationService->Qualification->find('list', ['limit' => 200]);
        $service = $this->QualificationService->Service->find('list', ['limit' => 200]);
        $this->set(compact('qualificationService', 'qualification', 'service'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Qualification Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $qualificationService = $this->QualificationService->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $qualificationService = $this->QualificationService->patchEntity($qualificationService, $this->request->getData());
            if ($this->QualificationService->save($qualificationService)) {
                $this->Flash->success(__('The qualification service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The qualification service could not be saved. Please, try again.'));
        }
        $qualification = $this->QualificationService->Qualification->find('list', ['limit' => 200]);
        $service = $this->QualificationService->Service->find('list', ['limit' => 200]);
        $this->set(compact('qualificationService', 'qualification', 'service'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Qualification Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $qualificationService = $this->QualificationService->get($id);
        if ($this->QualificationService->delete($qualificationService)) {
            $this->Flash->success(__('The qualification service has been deleted.'));
        } else {
            $this->Flash->error(__('The qualification service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
