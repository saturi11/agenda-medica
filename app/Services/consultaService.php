<?php

namespace App\Services;

use Illuminate\Database\QueryException;
use Mockery\Exception;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\ConsultaRepository;
use App\Validators\ConsultaValidator;


class consultaService
{
    protected $repository;
    protected $validator;

    public function __construct(ConsultaRepository $repository, ConsultaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {

        try {

            $consulta = $this->repository->create($data);

            return [
                'success' => true,
                'message' => "consulta criada",
                'data' => $consulta
            ];
            return redirect()->route('consulta.index');
        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class      :
                    ['succses' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class  :
                    ['succses' => false, 'messages' => $e->getMessageBag()];
                case Exception::class           :
                    ['succses' => false, 'messages' => $e->getMessage()];
                default                         :
                    ['succses' => false, 'messages' => $e->getMessage()];
            }

        }
    }

    public function update()
    {
    }

    public function delete($consulta_id)
    {
        try {

            $this->repository->destroy($consulta_id);

            return [
                'success' => true,
                'message' => "consulta removido",
                'data' => null
            ];

        } catch (Exception $e) {

            switch (get_class($e)) {
                case QueryException::class      :
                    ['succses' => false, 'messages' => $e->getMessage()];
                case ValidatorException::class  :
                    ['succses' => false, 'messages' => $e->getMessageBag()];
                case Exception::class           :
                    ['succses' => false, 'messages' => $e->getMessage()];
                default                         :
                    ['succses' => false, 'messages' => $e->getMessage()];
            }

        }
    }


}
