<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Service Controller
 *
 * @property \App\Model\Table\ServiceTable $Service
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Business'],
        ];
        $service = $this->paginate($this->Service);

        $this->set(compact('service'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $service = $this->Service->get($id, [
            'contain' => ['Business', 'Qualification'],
        ]);

        $this->set(compact('service'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Service->newEmptyEntity();
        if ($this->request->is('post')) {
            $postData = $this->request->getData();
            $qualification_ids = $postData['qualification']['_ids'];
            unset($postData['qualification']);
            $service = $this->Service->patchEntity($service, $postData);
            $saveResult = $this->Service->save($service);
            if ($this->Service->save($service)) {
                $serviceId = $saveResult->id;
                $qualifications = [];
                $this->loadModel('QualificationService');
                foreach($qualification_ids as $qualification_id) {
                    $qualification = $this->QualificationService->newEntity([
                        'service_id' => $serviceId, 'qualification_id' => $qualification_id
                    ]);
                    $qualifications[] = $qualification;
                }
                $this->QualificationService->saveMany($qualifications);
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $business = $this->Service->Business->find('list', ['limit' => 200]);
        $qualification = $this->Service->Qualification->find('list', ['limit' => 200]);
        //pr($qualification->toArray()); exit;
        $this->set(compact('service', 'business', 'qualification'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Service->get($id, [
            'contain' => ['Qualification'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Service->patchEntity($service, $this->request->getData());
            if ($this->Service->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $business = $this->Service->Business->find('list', ['limit' => 200]);
        $qualification = $this->Service->Qualification->find('list', ['limit' => 200]);
        $this->set(compact('service', 'business', 'qualification'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Service->get($id);
        if ($this->Service->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
