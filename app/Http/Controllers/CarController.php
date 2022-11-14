<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCars = Car::all();
        return response()->json(
            [
                "title" => 'Bem vindo a CRUD Car!',
                "description" => 'Segue a baixo nossos produtos de vitrine:',
                "body" => ( empty($getCars) ? 'Nenhum produto disponível' : $getCars )
            ]
        ,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // view create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validatorRequest($request);
            $save = Car::insert($request->input());

            return ( $save ? response()->json(['Novo registro adicionado com sucesso.'], 200) : response()->json(['Erro ao salvar registro.'], 500));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $id = (int) $id;
            if(is_integer($id)){
                $cars = Car::where('id', $id)->first();
                return response()->json($cars, 200);
            }

            return response()->json(['Parametro incorreto'], 500);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $id = (int) $id;
            $this->validatorRequest($request);

            if(is_integer($id)){
                $dados = array_filter($request->input());
                $cars = Car::where('id', $id)
                ->update($dados);

                return ( $cars ? response()->json(['Registro alterado com sucesso.'], 200) : response()->json(['Erro ao atualizar registro.'], 500));

            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validatorRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "ano" => "required",
            "modelo" => "required|string",
            "marca_fabricante" => "required|min:2",
            "valor_tabela" => "required|min:4",
        ],[
            "ano.required" => "Campo (ano), obrigatorio",
            "modelo.required" => "Campo (modelo), obrigatorio",
            "marca_fabricante.required" => "Campo (marca_fabricante), obrigatorio",
            "valor_tabela.required" => "Campo (valor_tabela), obrigatorio",
        ]);

        if($validator->fails()){
            throw (new \Exception($validator->errors()));
        }

        return true;
    }
}
