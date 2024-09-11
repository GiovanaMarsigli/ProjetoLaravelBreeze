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

<div class="container mt-5">
    <div class="container-form">
        <div class="form-section-form">
            <h1>Editar Anúncio</h1>
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
                <div class="upload-image-form">
    <label for="imagem-produto">Imagem</label>
    <input type="file" class="form-control" id="imagem-produto" name="imagem" accept=".jpg, .png, .jpeg">
    @if ($cliente->imagem)
        <img src="{{ asset('storage/' . $cliente->imagem) }}" alt="Imagem do Produto" class="image-preview">
    @endif
</div>

                
                <button type="submit" class="btn">Atualizar</button>
            </form>
        </div>
    </div>
</div>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
        font-family: 'Radley', sans-serif;
        background-color: #3b2a22;
    }

    .container {
        background-image: url('img/home.png');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .container-form {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #3b2a22;
        padding: 20px;
        min-height: 60vh;
        width: 70%;
        margin: 0 auto;
        border-radius: 15px;
    }

    .form-section-form {
        flex: 1;
        margin-left: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 20px;
        border-radius: 10px;
    }

    h1 {
        font-family: 'Radley', serif;
        font-size: 36px;
        letter-spacing: 2px;
        margin-bottom: 20px;
        color: #EFEFEF;
        text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 68%;
        align-items: left;
    }

    label, input[type="text"], input[type="file"] {
        font-family: 'Radley', serif;
        color: #EFEFEF;
    }

    input[type="text"], input[type="file"] {
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 20px;
        background-color: #EFEFEF;
        color: #4B3A2D;
        font-size: 16px;
        width: 100%;
        max-width: 300px;
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .upload-image-form {
    display: flex;
    flex-direction: column; 
    justify-content: flex-start; 
    align-items: flex-start; 
    margin-bottom: 20px; 
    width: 100%;
}

.upload-image-form label {
    font-family: 'Radley', serif;
    font-size: 16px;
    color: #EFEFEF;
    margin-bottom: 10px;
}

.upload-image-form input[type="file"] {
    font-family: 'Radley', serif;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 20px;
    background-color: #EFEFEF; 
    color: #4B3A2D;
    font-size: 16px;
    width: 100%; 
    max-width: 300px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); 
}

.upload-image-form img {
    width: 150px;
    height: auto;
    object-fit: contain;
    margin-top: 10px;
    border-radius: 10px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
}

    input[type="file"] {
        display: none;
    }

    .btn {
        font-family: 'Radley', serif;
    padding: 10px;
    border: none;
    border-radius: 30px; 
    background-color: #756357;
    color: #FFFFFF; 
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    max-width: 300px;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); 
    }

    button:hover {
        background-color: #5A4B3F;
    }
</style>


</body>

</html>