

function addClass(id, classe) {
    var elemento = document.getElementById(id);
    elemento.classList.toggle(classe);

    var elemento = document.getElementById('conteudoListaImoveis');
    elemento.classList.toggle('formatacao');
}