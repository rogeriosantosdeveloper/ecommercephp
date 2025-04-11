# 🛒 E-Commerce com Painel Administrativo em Laravel

Este projeto é uma aplicação web desenvolvida com Laravel que simula um sistema de e-commerce com funcionalidades completas de vitrine de produtos, carrinho de compras, controle de estoque, vendas e painel administrativo para funcionários.

---

## 🚀 Funcionalidades

### 👤 Autenticação e Controle de Acesso
- Registro e login de **clientes**
- Login de **funcionários** com acesso ao painel administrativo
- Controle de permissões com middleware (`is_admin`)

### 🛍️ Vitrine de Produtos
- Página pública com listagem de produtos (imagem, descrição e preço)
- Filtros e busca por nome ou categoria

### 👥 Gestão de Usuários (CRUD)
- Cadastro, edição, visualização e exclusão de **clientes**
- Cadastro, edição, visualização e exclusão de **funcionários**

### 📦 Gestão de Produtos (CRUD)
- Cadastro de novos produtos com imagem, preço e descrição
- Edição, visualização e exclusão de produtos
- Controle de estoque automático

### 🛒 Carrinho de Compras e Vendas
- Adição e remoção de produtos no carrinho
- Tela de checkout com resumo da compra
- Registro de vendas no banco de dados

### 📊 Painel Administrativo
- Acesso restrito a funcionários
- Visualização de estatísticas de vendas e estoque em tempo real

### 📑 Geração de Relatórios
- Relatório de **vendas por período**
- Relatório de **estoque**
- Relatório de **clientes cadastrados**

---

## ⚙️ Tecnologias Utilizadas

- **Laravel 10+**
- **Blade** (sistema de templates)
- **MySQL** (ou outro banco relacional)
- **Bootstrap** ou **Tailwind CSS**
- **Auth middleware** personalizado (`is_admin`)
- **Eloquent ORM**

---

## 🧑‍💻 Como Executar Localmente

1. Clone o repositório:
   ```bash
   git clone https://github.com/rogeriosantosdeveloper/ecommercephp.git
   cd ecommercephp
Instale as dependências:

bash
Copiar
Editar
composer install
npm install && npm run dev
Configure o .env:

Copie o .env.example para .env

Configure suas credenciais do banco de dados

Gere a chave da aplicação:

bash
Copiar
Editar
php artisan key:generate
Execute as migrations e, se necessário, seeds:

bash
Copiar
Editar
php artisan migrate --seed
Inicie o servidor:

bash
Copiar
Editar
php artisan serve
🧪 Acesso de Teste
Você pode utilizar as seguintes credenciais para testes:

Cliente
Email: rogerio2@rogerio2.com

Senha: 12345678

Funcionário (Admin)
Email: admin@example.com

Senha: 12345678

📌 Melhorias Futuras
Integração com gateways de pagamento

Confirmação de pedido por e-mail

Responsividade aprimorada

Implementação de testes automatizados

📄 Licença
Este projeto está sob a licença MIT.

🤝 Contribuindo
Pull requests são bem-vindos! Para grandes mudanças, abra uma issue antes para discutir o que você gostaria de modificar.

