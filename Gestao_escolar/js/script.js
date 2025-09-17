function navegarPara(entidade, acao) {
    if (!acao) return; // Se "Selecione" for escolhido, não faz nada

    const url = `../${entidade}/${acao}.php`;
    window.location.href = url;
}
