<?php
namespace App\Services;
use App\Repositories\ConsultaRepository;
use App\Validators\ConsultaValidator;
use Illuminate\Database\QueryException;
use Mockery\Exception;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;


class userService{
    protected $repository;
    protected $validator;
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    public function store($data){
        try {

            $usuario =$this->repository->create($data);

            return [
                'success' =>true,
                'message'=> "usuario cadastrado",
                'data' => $usuario
            ];
        return redirect()->route('user.index');
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
