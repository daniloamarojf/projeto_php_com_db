<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Escolar</title>
</head>

<body>
    <h1>Gestão escolar</h1>
    
    <label for="alunos">Alunos</label>
    <select id="alunos" onchange="navegarPara('alunos', this.value)">
        <option value="">Selecione</option>
        <option value="adicionar">Adicionar</option>
        <option value="deletar">Deletar</option>
        <option value="editar">Alterar</option>
        <option value="listar">Listar</option>
    </select>

    <label for="disciplinas">Disciplinas</label>
    <select id="disciplinas" onchange="navegarPara('disciplinas', this.value)">
        <option value="">Selecione</option>
        <option value="adicionar">Adicionar</option>
        <option value="deletar">Deletar</option>
        <option value="editar">Alterar</option>
        <option value="listar">Listar</option>
    </select>

    <label for="turmas">Turmas</label>
    <select id="turmas" onchange="navegarPara('turmas', this.value)">
        <option value="">Selecione</option>
        <option value="adicionar">Adicionar</option>
        <option value="deletar">Deletar</option>
        <option value="editar">Alterar</option>
        <option value="listar">Listar</option>
    </select>

    
    <script src="../js/script.js"></script>
</body>
</html>
