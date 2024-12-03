# Sistema de Cadastro e Login

Este repositório contém a implementação de um sistema simples de **cadastro**, **login** e **logout** com **validação de entradas** e **conexão com banco de dados MySQL**.

## Funcionalidades

- **Cadastro de usuário**: Formulário com validação de senha e verificação de e-mail já registrado.
- **Login de usuário**: Formulário para autenticação com verificação de credenciais.
- **Logout de usuário**: Destruição da sessão do usuário.
- **Banco de dados**: Conexão com MySQL e criação da tabela `users` para armazenar dados de usuários.
- **Feedback para o usuário**: Mensagens de erro e sucesso para cadastro e login.

## Como Usar

1. **Configuração do Banco de Dados**:
   - Importe o arquivo `database.sql` para criar a tabela `users` no seu banco de dados MySQL.
   
   ```bash
   mysql -u usuario -p nome_do_banco < caminho/para/database.sql
