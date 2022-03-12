<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Consulta;

/**
 * Class ConsultaTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConsultaTransformer extends TransformerAbstract
{
    /**
     * Transform the Consulta entity.
     *
     * @param \App\Entities\Consulta $model
     *
     * @return array
     */
    public function transform(Consulta $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
