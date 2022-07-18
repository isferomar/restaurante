<?php
namespace App\Http\Controllers;
use App\Repositories\ComidaRepository;

class ComidaController
{
    public function index()
    {
        $comidas=ComidaRepository::GetAll();
        return json($comida);
    }
    public function show($id)
    {
        $comida=ComidaRepository::Find($id);
        if (empty($comida)){
            return json("No se eeontró la comida",404);
        }
        return json($comida); 
    }
    public function store()
    {
        ComidaRepository::Save($comida);
        return json("ok");
    }
    public function update($comida)
    {
        ComidaRepository::update($comida);
        return json("ok");
    }
    public function destroy($id)
    {
        ComidaRepository::Delete($id);
        return json("ok");
    }
}
