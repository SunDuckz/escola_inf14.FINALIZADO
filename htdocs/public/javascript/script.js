function validarCamposLogin(event) {
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposEditarUsuario(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;

    if (nome === '' || email === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposCadastro(event) {
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Preencha os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposTipoUsuario(event) {
    const tipoUsuario = document.getElementById('descricao').value;

    if (tipoUsuario === '') {
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}
function validarCamposSenha(event) {
    const nome = document.getElementById('nome').value;

    if (nome === '') {
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false;
    }

    return true;
}

function validarCamposEditarNota(event) {
    const valor = document.getElementById('valor').value;

    if (valor === '') {
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false
    }
    return true
}

function validarCamposMateria(event) {
    const materia = document.getElementById('descricao').value;

    if (materia === '') {
        alert('Preencha todos os campos corretamente!');

        event.preventDefault();

        return false
    }
    return true
}