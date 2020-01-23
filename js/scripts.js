const subtiposHW = Array();
const subtiposSW = Array();

subtiposHW['remocao'] = 'Remoção';
subtiposHW['adicao'] = 'Adição';
subtiposHW['substituicao'] = 'Substituição';
//subtiposHW[''] = '';

subtiposSW['instalacao'] = 'Instalação';
subtiposSW['atualizacao'] = 'Atualização';
subtiposSW['desinstalacao'] = 'Desinstalação';
subtiposSW['imageacao'] = 'Imageação';
subtiposSW['configuracao'] = 'Configuração';
//subtiposSW[''] = '';

console.log(subtiposHW);
console.log(subtiposSW);

function gerarOptions() {

    switch (document.getElementById('cadastroTipo').value) {
        case 'hardware':
            gerarOptionsValue(subtiposHW);
            break;
        case 'software':
            gerarOptionsValue(subtiposSW);
            break;
        case 'rede':
            gerarOptionsValue(subtiposSW);
            break;
        default:
            gerarOptionsValue(subtiposSW);
            break;
    }

    function gerarOptionsValue(varArray) {
        removerOptions('cadastroSubTipo');
        for (let key in varArray) {
            document.getElementById('cadastroSubTipo');
            let opt = document.createElement('option');
            opt.value = key;
            opt.innerHTML = varArray[key];
            document.getElementById('cadastroSubTipo').appendChild(opt);
        }
    }
}

function removerOptions(id) {
    let i;
    let select = document.getElementById(id);
    for(i = select.options.length - 1 ; i >= 0; i-- ) {
        select.remove(i);
    }

}

