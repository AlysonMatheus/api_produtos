# API de Produtos - Laravel

## Descrição
Esta é uma API desenvolvida em Laravel para gerenciar produtos. A API permite realizar operações de CRUD (Create, Read, Update, Delete) com autenticação via Laravel Sanctum.

## Tecnologias Utilizadas
- PHP 8+
- Laravel
- MySQL
- Laravel Sanctum (para autenticação via token)

## Instalação
### 1. Clonar o repositório
```bash
git clone https://github.com/seu-usuario/api-produtos.git
cd api-produtos
```

### 2. Instalar dependências
```bash
composer install
```

### 3. Configurar ambiente
Copie o arquivo de ambiente e configure suas credenciais:
```bash
cp .env.example .env
```
Edite o arquivo `.env` e configure as informações do banco de dados.

### 4. Gerar chave da aplicação
```bash
php artisan key:generate
```

### 5. Executar migrações e seeders
```bash
php artisan migrate --seed
```

### 6. Iniciar o servidor
```bash
php artisan serve
```

## Rotas da API

### Autenticação
| Método | Rota       | Descrição                  |
|--------|-----------|----------------------------|
| POST   | /api/login | Autentica um usuário e retorna um token |

### Produtos
| Método | Rota             | Descrição |
|--------|-----------------|-----------|
| GET    | /api/produtos    | Lista todos os produtos |
| POST   | /api/produtos    | Cria um novo produto (requer autenticação) |
| PUT    | /api/produtos/{id} | Atualiza um produto (requer autenticação) |
| DELETE | /api/produtos/{id} | Deleta um produto (requer autenticação) |

## Autenticação
A API utiliza Laravel Sanctum para autenticação. Após fazer login, será retornado um token que deve ser enviado no header `Authorization` das requisições protegidas.

Exemplo de uso do token em requisições autenticadas:
```bash
curl -H "Authorization: Bearer SEU_TOKEN" http://127.0.0.1:8000/api/produtos
```

## Licença
Este projeto está licenciado sob a MIT License - veja o arquivo [LICENSE](LICENSE) para mais detalhes.
