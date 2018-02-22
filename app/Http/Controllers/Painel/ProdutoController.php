<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;
    private $totalPage = 4;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index()
    {
        $title = 'Cadastrar Novo Produto';
        $products = $this->product->paginate($this->totalPage);
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = ['eletronicos', 'moveis', 'limpeza'];

        return view('painel.products.create-edit', compact('categorys'));
        /*
        $insert = $this->product->create([
            'name' => 'celular',
            'number' => 123,
            'active' => false,
            'category' => 'eletronicos',
            'description' => 'Descrição do celular'
        ]);
        if ($insert)
            return "{$insert->name} inserido com sucesso";
        else
            return 'O produto não foi inserido';
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0: 1;

        $insert = $this->product->create($dataForm);

        if ($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->back();

        //dd($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        $title = "Produto: {$product->name}";

        return view('painel/products/show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);

        $title = "Editar Produto: {$product->name}";

        $categorys = ['eletronicos', 'moveis', 'limpeza'];

        return view('painel.products.create-edit', compact('categorys', 'title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
       $dataForm = $request->all();
        
       $product = $this->product->find($id);

       $update = $product->update($dataForm);

       if ($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        $delete = $product->delete();

        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show, $id')->with(['errors' => 'Falha ao deletar']);
        /*$prod = $this->product->find(3);
        $delete = $prod->delete();
        if ($delete)
            return "Produto excluido com sucesso";
        else
            return 'O produto não foi excluido';*/
    }
}
