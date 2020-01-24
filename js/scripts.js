const subtiposHW = Array();
const subtiposSW = Array();

subtiposHW['remoção'] = 'Remoção';
subtiposHW['adição'] = 'Adição';
subtiposHW['substituição'] = 'Substituição';
//subtiposHW[''] = '';

subtiposSW['instalação'] = 'Instalação';
subtiposSW['atualização'] = 'Atualização';
subtiposSW['desinstalação'] = 'Desinstalação';
subtiposSW['imageação'] = 'Imageação';
subtiposSW['configuração'] = 'Configuração';
//subtiposSW[''] = '';

//console.log(subtiposHW);
//console.log(subtiposSW);

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

function arrumaMenu() {
    document.getElementById('menuComputadores').className = 'col-6 d-flex justify-content-center text-center';
    document.getElementById('menuManutencoes').className = 'col-6 d-flex justify-content-center text-center';

}

