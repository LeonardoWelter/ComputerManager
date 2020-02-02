/*
 * - Copyright (c) Leonardo Welter, 2020.
 * - https://github.com/LeonardoWelter/
 */

// Declaração dos arrays de Subtipo de Hardware e Software
const subtiposHW = Array();
const subtiposSW = Array();

// Subtipos de Hardware
subtiposHW['placeholder'] = 'Selecione o subtipo';
subtiposHW['remoção'] = 'Remoção';
subtiposHW['adição'] = 'Adição';
subtiposHW['substituição'] = 'Substituição';
//subtiposHW[''] = '';

// Subtipos de Software
subtiposSW['placeholder'] = 'Selecione o subtipo';
subtiposSW['instalação'] = 'Instalação';
subtiposSW['atualização'] = 'Atualização';
subtiposSW['desinstalação'] = 'Desinstalação';
subtiposSW['imageação'] = 'Imageação';
subtiposSW['configuração'] = 'Configuração';
//subtiposSW[''] = '';

// Gera programaticamente as opções de subtipo com base no tipo seleciona
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

// Remove as opções de um Select
function removerOptions(id) {
    let i;
    let select = document.getElementById(id);
    for(i = select.options.length - 1 ; i >= 0; i-- ) {
        select.remove(i);
    }

}

// Ajusta o menu para ficar formatado corretamente
function arrumaMenu() {
    document.getElementById('menuComputadores').className = 'col-6 d-flex justify-content-center text-center';
    document.getElementById('menuManutencoes').className = 'col-6 d-flex justify-content-center text-center';
}

