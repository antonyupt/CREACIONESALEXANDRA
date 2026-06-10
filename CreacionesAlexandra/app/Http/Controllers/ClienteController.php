<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Http;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create([

            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion

        ]);

        return redirect()->route('clientes.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->update([

            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'direccion' => $request->direccion

        ]);

        return redirect()->route('clientes.index');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()->route('clientes.index');
    }
public function buscarDocumento(Request $request)
{
     dd('ENTRO AL CONTROLADOR');
    /*$tipo = $request->tipo_documento;
    $numero = $request->numero_documento;

    $token = env('APIS_PERU_TOKEN');

    if ($tipo == 'DNI') {

        $url = "https://dniruc.apisperu.com/api/v1/dni/{$numero}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFudG9ueWNoYXRhY2hvcXVlQGdtYWlsLmNvbSJ9._83lRwXjMZGsdccRAXiJwH_6e-_gPmzr_bTgQREUy2o";

    } else {

        $url = "https://dniruc.apisperu.com/api/v1/ruc/{$numero}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFudG9ueWNoYXRhY2hvcXVlQGdtYWlsLmNvbSJ9._83lRwXjMZGsdccRAXiJwH_6e-_gPmzr_bTgQREUy2o";

    }

    $response = Http::get($url);

    dd(
        $url,
        $response->status(),
        $response->json()
    );*/ 
  

   

}
}