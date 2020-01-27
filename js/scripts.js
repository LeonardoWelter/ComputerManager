const subtiposHW = Array();
const subtiposSW = Array();

subtiposHW['placeholder'] = 'Selecione o subtipo';
subtiposHW['remoção'] = 'Remoção';
subtiposHW['adição'] = 'Adição';
subtiposHW['substituição'] = 'Substituição';
//subtiposHW[''] = '';

subtiposSW['placeholder'] = 'Selecione o subtipo';
subtiposSW['instalação'] = 'Instalação';
subtiposSW['atualização'] = 'Atualização';
subtiposSW['desinstalação'] = 'Desinstalação';
subtiposSW['imageação'] = 'Imageação';
subtiposSW['configuração'] = 'Configuração';
//subtiposSW[''] = '';

//console.log(subtiposHW);
//console.log(subtiposSW);

function gerarOptions(selected) {

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
            if(key === 'placeholder' && !selected) {
                opt.value = '';
                opt.disabled = true;
                opt.selected = true;
            } else {
                opt.value = key;
            }
            if(key === selected) {
                opt.selected = true;
            }
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

