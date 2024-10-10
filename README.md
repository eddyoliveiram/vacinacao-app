
# Controle de Vacinação

Este é um sistema para cadastro e controle dos funcionários de uma empresa que foram vacinados contra a COVID-19.

## Requisitos

Antes de começar, você precisará ter os seguintes itens instalados na sua máquina:

- [Docker](https://www.docker.com/)
- Terminal Ubuntu ou outra dist (WSL 2)
  
## Passos para Configurar e Levantar a Aplicação

### 1. Clonar o Repositório para o ambiente linux

```bash
git clone https://github.com/eddyoliveiram/vacinacao-app.git
cd controle-vacinacao
```

### 2. Copiar o Arquivo `.env.example` para `.env`, já deixei com o example com as keys corretas para facilitar

```bash
cp .env.example .env
```

### 3. Instalar as Dependências

Depois que os containers estiverem rodando, instale as dependências do Laravel:

```bash
./vendor/bin/sail composer install
```

### 4. Manter aberto o Docker Desktop e subir os Containers Docker com Laravel Sail

Inicie os containers usando o Sail:

```bash
./vendor/bin/sail up -d
```

Isso irá levantar a aplicação e o banco de dados. Certifique-se de que o Docker está rodando em sua máquina.

### 5. Gerar a Chave da Aplicação

Gere a chave do aplicativo Laravel para ser usada no `.env`:

```bash
./vendor/bin/sail artisan key:generate
```

### 6. Executar as Migrações E Seeders

Execute as migrações para criar as tabelas no banco de dados:

```bash
./vendor/bin/sail artisan migrate fresh --seed
```

### 7. Manter as Filas Rodando

Você pode rodar o worker de filas para processar os jobs em segundo plano:

```bash
./vendor/bin/sail artisan queue:work
```

### 8. Acessar a Aplicação

A aplicação estará disponível em `http://localhost` ou na porta que você configurou no arquivo `.env`.

## Tecnologias Utilizadas

O sistema foi desenvolvido utilizando as seguintes tecnologias:

- **Laravel Sail (Docker)**: Utilizado para fornecer um ambiente de desenvolvimento completo e padronizado, eliminando a necessidade de configuração manual de servidores e dependências locais. Laravel Sail facilita o uso de containers Docker para a aplicação Laravel, banco de dados, e serviços auxiliares como Redis.
  
- **Filas (Queues)**: Para processar tarefas em segundo plano, como o envio de emails e a geração de relatórios, foi utilizado o sistema de filas do Laravel. O processamento de jobs é feito de maneira assíncrona para melhorar a performance e a experiência do usuário.

- **Pusher Websocket**: Usado para fornecer notificações em tempo real para os usuários. Com o Pusher Websockets, é possível disparar eventos do backend e capturá-los no frontend em tempo real.

- **Laravel Echo**: É utilizado no frontend para escutar eventos de WebSocket e se comunicar com o Pusher. Laravel Echo simplifica a integração de WebSockets com a interface do usuário, facilitando a implementação de comunicação em tempo real.

- **PostgreSQL**: O banco de dados utilizado na aplicação é o PostgreSQL. Ele foi escolhido pela sua robustez e conformidade com os padrões SQL, além de seu ótimo desempenho para sistemas transacionais.

- **Tailwind CSS**: Toda a estilização da interface foi construída com o **Tailwind CSS**, um framework CSS utilitário que facilita a criação de layouts modernos, responsivos e altamente customizáveis sem escrever CSS personalizado.

- **Alpine.js**: Para comportamentos dinâmicos no frontend, foi utilizado **Alpine.js**, uma biblioteca leve de JavaScript que permite adicionar interatividade e reatividade à interface sem a complexidade de frameworks maiores como Vue.js ou React.


## Comandos Úteis

### Limpar o Cache

Se precisar limpar o cache de configuração:

```bash
./vendor/bin/sail artisan config:clear
```

## Licença

Este projeto está sob a licença MIT.
