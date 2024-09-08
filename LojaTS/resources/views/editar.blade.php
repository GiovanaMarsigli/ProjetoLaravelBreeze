<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar - Anúncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar bg-body-tertiary">
      <div class="container-sm">
        <span class="navbar-brand mb-0 h1">Projeto Web</span>
      </div>
    </nav>
    <div class="container mt-5">
        <form method="POST" action="/atualizar/{{$cliente->id}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label for="nome_produto">Nome do Produto</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{$cliente->nome_produto}}" placeholder="Nome do Produto">
            </div>
            <div class="form-group mb-2">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" value="{{$cliente->preco}}" placeholder="Preço">
            </div>
            <div class="form-group mb-2">
                <label for="descricao_produto">Descrição</label>
                <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="{{$cliente->descricao_produto}}" placeholder="Descrição do Produto">
            </div>
            <div class="form-group mb-2">
                <label for="imagem-produto">Imagem</label>
                <input type="file" class="form-control" id="imagem-produto" name="imagem" accept=".jpg, .png, .jpeg">
                @if ($cliente->imagem)
                    <img src="{{ asset('storage/' . $cliente->imagem) }}" alt="Imagem do Produto" style="width: 150px; margin-top: 10px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</body>

</html>