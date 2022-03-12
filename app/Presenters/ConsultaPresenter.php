<?php

namespace App\Presenters;

use App\Transformers\ConsultaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConsultaPresenter.
 *
 * @package namespace App\Presenters;
 */
class ConsultaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConsultaTransformer();
    }
}
