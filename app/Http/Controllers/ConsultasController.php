<?php

namespace App\Http\Controllers;

use App\Repositories\PacienteRepository;
use App\Repositories\UserRepository;
use App\Http\Requests\ConsultaCreateRequest;
use App\Http\Requests\ConsultaUpdateRequest;
use App\Repositories\ConsultaRepository;
use App\Services\consultaService;



/**
 * Class ConsultasController.
 *
 * @package namespace App\Http\Controllers;
 */
class ConsultasController extends Controller
{
    /**
     * @var ConsultaRepository
     */
    protected $repository;
    protected $service;
    protected $userrepository;
    protected $pacienterepository;


    public function __construct(ConsultaRepository $repository, consultaService $service, UserRepository $userrepository, PacienteRepository $pacienterepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->userrepository = $userrepository;
        $this->pacienterepository = $pacienterepository;

    }
    public function index()
    {
        $consultas           =$this->repository->all();
        $user_list           =$this->userrepository->selectBoxList();
        $paciente_list      =$this->pacienterepository->selectBoxList();
        return view('consulta.index', [
            'consultas'         =>$consultas,
            'user_list'        =>$user_list,
            'paciente_list'    =>$paciente_list,
        ]);
    }


    public function store(ConsultaCreateRequest $request)
    {

        $request = $this->service->store($request->all());

        $consultas = $request['success'] ? $request['data'] : null;


        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);
        return view('consulta.index', [
            '$consultas' => $consultas,
        ]);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(ConsultaUpdateRequest $request, $id)
    {

    }



    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Consulta deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Consulta deleted.');
    }
}
