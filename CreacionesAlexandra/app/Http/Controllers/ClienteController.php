<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

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
        $numeroDocumento = trim($request->numero_documento);

        Cliente::create([
            'tipo_documento' => $this->tipoDocumentoDesdeNumero($numeroDocumento),
            'numero_documento' => $numeroDocumento,
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

        $numeroDocumento = trim($request->numero_documento);

        $cliente->update([
            'tipo_documento' => $this->tipoDocumentoDesdeNumero($numeroDocumento),
            'numero_documento' => $numeroDocumento,
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

    private function tipoDocumentoDesdeNumero(string $numeroDocumento): string
    {
        $longitud = strlen($numeroDocumento);

        if ($longitud === 8) {
            return 'DNI';
        }

        if ($longitud === 11) {
            return 'RUC';
        }

        return 'DOCUMENTO';
    }
}