<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConsultaRepository;
use App\Entities\Consulta;
use App\Validators\ConsultaValidator;

/**
 * Class ConsultaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConsultaRepositoryEloquent extends BaseRepository implements ConsultaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Consulta::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ConsultaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
