<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all(); // Obtenha todos os clientes
        return view('index', compact('clientes')); // Retorne a view com os dados
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create'); // Retorne a view de criação de um novo cliente
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'nome_produto' => 'required|string|max:100',
            'preco' => 'required|numeric|min:0',
            'descricao_produto' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nome_produto.required' => 'O campo nome do produto é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'descricao_produto.required' => 'O campo descrição do produto é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve estar em formato jpeg, png, jpg ou gif.',
            'imagem.max' => 'A imagem deve ter no máximo 2048 KB.',
        ]);


        $cliente = new Cliente();
        $cliente->nome_produto = $request->nome_produto;
        $cliente->preco = $request->preco;
        $cliente->descricao_produto = $request->descricao_produto;

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
            $cliente->imagem = $imageName;
        }

        $cliente->save();
        return redirect()->back()->with("sucesso", "Produto adicionado com sucesso!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('editar', compact('cliente')); // Retorne a view de edição com os dados do cliente
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados recebidos
        $validator = Validator::make($request->all(), [
            'nome_produto' => 'required|string|max:100',
            'preco' => 'required|numeric|min:0',
            'descricao_produto' => 'required|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nome_produto.required' => 'O campo nome do produto é obrigatório.',
            'preco.required' => 'O campo preço é obrigatório.',
            'descricao_produto.required' => 'O campo descrição do produto é obrigatório.',
            'imagem.image' => 'O arquivo deve ser uma imagem válida.',
            'imagem.mimes' => 'A imagem deve estar em formato jpeg, png, jpg ou gif.',
            'imagem.max' => 'A imagem deve ter no máximo 2048 KB.',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $cliente = Cliente::find($id);
        $cliente->nome_produto = $request->nome_produto;
        $cliente->preco = $request->preco;
        $cliente->descricao_produto = $request->descricao_produto;

        // Upload da imagem
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
            $cliente->imagem = $imageName;
        }

        $cliente->save();
        return redirect('clientes')->with("sucesso", "Produto atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->back()->with("sucesso", "Produto excluído com sucesso!");
    }
}