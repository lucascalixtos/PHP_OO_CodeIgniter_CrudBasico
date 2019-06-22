## AT03 - HMVC

Este repositório contém uma distribuição do CodeIgniter acrescida de alguns superpoderes. Já estão configurados o MDB, a estrutura de modularização [HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/src/codeigniter-3.x/ "HMVC") mais o ambiente de testes de unidade Toast. Você só precisa seguir os passos abaixo para executar o código do módulo de exemplo e realizar seus testes, tanto os de unidade quanto os de aceitação.

####Executar o código do módulo de exemplo
1. Clone este repositório em um diretório chamado **modulo**
2. Importe para o MySQL o arquivo tarefa_turma.sql que se encontra na pasta sql
3. Digite no navegador **http://localhost/modulo/tarefa**

####Executar os testes de unidade do módulo
1. Os testes de cada módulo devem ficar no diretório < nome_modulo >/controllers/test
2. No módulo tarefa existe um teste chamado TurmaTest; execute-o acessando **http://localhost/modulo/tarefa/test/TurmaTest**
3. Para executar o teste de regressão do módulo, acesse **http://localhost/modulo/tarefa/test/all**

####Configurar ambiente para testes de aceitação
1. Copie a pasta **selenium** para C:/ do Windows
2. Abra o Eclipse e crie um projeto chamado **modulo**
3. Clique com o botão direito sobre o projeto
4. Escolha a última opção: **Properties**
5. À esquerda clique em **Java Build Path** e selecione a aba **Libraries**
6. À direita clique no botão **Add Library** e selecione o JUnit 4
7. Clique no segundo botão **Add External Jars...** e navegue até à pasta **selenium/libs**.  Selecione todos os arquivos .jar e clique em abrir.
8. Clique no botão **Ok** para concluir esta etapa de configuração.

#### Executar testes de aceitação do módulo tarefa
1. Importe os arquivos de teste para o Eclipse clicando no menu File -> Import -> General -> File System -> Browse. Navegue até à pasta **selenium/test** e clique na pasta **src**.
2. Na janela que se abre marque o *checkbox* ao lado da pasta **src** e clique em **finish**.
3. Abra e execute o arquivo RegressionTest.java, que se encontra na pasta *default package*.

---
**Importante**
1) Você precisa ter o Firefox instalado para que os testes de aceitação funcionem imediatamente. Caso prefira usar o Chrome para executar os testes, leia o readapé do arquivo BaseTest.java e faça os ajustes necessários.
2) Os testes de aceitação foram executados usando o Eclipse 2018-09