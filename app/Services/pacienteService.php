<?php
namespace App\Services;

use Illuminate\Database\QueryException;
use Mockery\Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\PacienteRepository;
use App\Validators\PacienteValidator;


class pacienteService{
    protected $repository;
    protected $validator;
    public function __construct(PacienteRepository $repository, PacienteValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    public function store($data){

        try {
            $paciente =$this->repository->create($data);
            return [
                'success' =>true,
                'message'=> "paciente cadastrado",
                'data' => $paciente
            ];
            return redirect()->route('paciente.index');
        }catch (Exception $e){

            switch (get_class($e)){
                case QueryException::class      :['succses' =>false, 'messages' =>$e->getMessage()];
                case ValidatorException::class  :['succses' =>false, 'messages' =>$e->getMessageBag()];
                case Exception::class           :['succses' =>false, 'messages' =>$e->getMessage()];
                default                         :['succses' =>false, 'messages' =>$e->getMessage()];
            }

        }
    }
    public function update(){}

    public function delete($user_id){
        try {

            $this->repository->destroy($user_id);

            return [
                'success' =>true,
                'message'=> "usuario removido",
                'data' => null
            ];

        }catch (Exception $e){

            switch (get_class($e)){
                case QueryException::class      :['succses' =>false, 'messages' =>$e->getMessage()];
                case ValidatorException::class  :['succses' =>false, 'messages' =>$e->getMessageBag()];
                case Exception::class           :['succses' =>false, 'messages' =>$e->getMessage()];
                default                         :['succses' =>false, 'messages' =>$e->getMessage()];
            }

        }
    }


}

