<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PacienteCreateRequest;
use App\Http\Requests\PacienteUpdateRequest;
use App\Repositories\PacienteRepository;
use App\Validators\PacienteValidator;
use App\Services\pacienteService;
/*
 * Class PacientesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PacientesController extends Controller
{

    protected $repository;
    protected $service;


    public function __construct(PacienteRepository $repository, PacienteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    public function index()
    {
        $pacientes = $this->repository->all();
        return view('paciente.index', ['pacientes' => $pacientes]);

    }


    public function store(PacienteCreateRequest $request)
    {
            $request = $this->service->store($request->all());
            $pacientes = $request['success'] ? $request['data'] : null;


            session()->flash('success', [
                'success' => $request['success'],
                'message' => $request['message']
            ]);
            return view('paciente.index', [
                'paciente' => $pacientes,
            ]);
    }


    public function show($id)
    {
        $paciente = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $paciente,
            ]);
        }

        return view('pacientes.show', compact('paciente'));
    }


    public function edit($id)
    {
        $paciente = $this->repository->find($id);

        return view('pacientes.edit', compact('paciente'));
    }


    public function update(PacienteUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $paciente = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Paciente updated.',
                'data'    => $paciente->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }



    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Paciente deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Paciente deleted.');
    }
}
