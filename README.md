# ComputerManager

### Objetivos: 

Criar um sistema Web que mostre todos os computadores de uma empresa em detalhes;\
Possibilidade de incluir manutenções executadas nos detalhes dos computadores;\
Realizar Wake on Lan (WOL) para realizar manutenções remotas nos computadores.

### Requisitos 

Sistema de login;\
Possibilidade de pesquisar computadores específicos (via patrimonial por exemplo);\
Listagem de todos os computadores cadastrados;\
Página individual do computador com as seguintes informações:
 - ID;
 - Patrimonial;
 - Marca;
 - Modelo;
 - CPU;
 - RAM;
 - HD;
 - Fonte;
 - MAC;
 - Nome do computador;
 - Sistema operacional.
 
Registrar modificações/manutenções (hardware e software) na página do computador;\
Realizar Wake on Lan;\
Atalho para conexão remota;\
Página de cadastro de novos computadores;\
Página de edição de computadores existentes;\
Mostrar o histórico de manutenção do computador;\
Possibilidade de criação de novos usuários pelo admin pelo próprio sistema;

### Extras

Monitoramento dinâmico utilizando Zabbix;\
Atualização do IP via pfSense Scrapper no DHCP Leases;

### Tabelas no banco de dados

Users:
 - Nome;
 - Email;
 - Login;
 - Senha (criptografada);

Devices:
  - ID;
  - Patrimonial;
  - Marca;
  - Modelo;
  - CPU;
  - RAM;
  - HD;
  - Fonte;
  - MAC;
  - Nome;
  - OS;
 
Manutenções: 
  - ID;
  - Device_ID (FK);
  - Tipo;
  - Descrição;
  - Comentários;
  - Criador;
  - Data;
