<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merch Oficial</title>
    <link href="https://fonts.googleapis.com/css2?family=Radley&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="top-left-logo">
                <a href="index.html">
                    <img src="img/logo.png" alt="Logo">
                </a>
                            </div>
        </div>
    </div>

    <!-- Seção Formulário Criar Anúncio -->
    <div class="container-form">
        <div class="image-section-form">
            <img src="img/criaranuncio.png" alt="The Tortured Poets Department">
        </div>

        <div class="form-section-form">
        
            <h1>CRIAR ANÚNCIO</h1>
            <form action="{{route('cliente.add')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="text" id="nome_produto" name="nome_produto" placeholder="Nome do Produto">
                <input type="text" id="preco" name="preco" placeholder="Preço">
                <input type="text" id="descricao_produto" name="descricao_produto" placeholder="Descrição do Produto">
                
                <div class="upload-image-form">
                    <label for="imagem-produto">
                        <img id="imagem-preview" src="img/img.png" alt="Upload de imagem">
                    </label>
                    <input type="file" id="imagem-produto" name="imagem" accept=".jpg, .png, .jpeg" required>
                </div>
                
                <script>
                    // Seleciona o input e a imagem de pré-visualização
                    const inputImagem = document.getElementById('imagem-produto');
                    const imagemPreview = document.getElementById('imagem-preview');
                
                    // Adiciona um listener para quando o usuário selecionar uma imagem
                    inputImagem.addEventListener('change', function(event) {
                        const file = event.target.files[0]; // Pega o arquivo selecionado
                        if (file) {
                            const reader = new FileReader(); // Cria um FileReader para ler o arquivo
                
                            reader.onload = function(e) {
                                imagemPreview.src = e.target.result; // Atualiza a imagem de pré-visualização
                            }
                
                            reader.readAsDataURL(file); // Converte a imagem para uma URL utilizável
                        }
                    });
                </script>
                

                <button type="submit">Confirmar</button>

            </form>

        </div>
    </div>
   <!-- TABELA  -->
   <div class="container-table mt-5">
        <h1>PRODUTOS REGISTRADOS</h1>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome do Produto</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @if (count($clientes) > 0)
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome_produto }}</td>
                            <td>{{ $cliente->preco }}</td>
                            <td>{{ $cliente->descricao_produto }}</td>
                            <td><img src="{{ asset('images/' . $cliente->imagem) }}" alt="Imagem do Produto" style="width: 100px;"></td>
                            <td>
                                <a href="/editar/{{ $cliente->id }}" class="btn btn-primary">Editar</a>
                                <a href="/excluir/{{ $cliente->id }}" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Sem registros!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

</body>
</html>
