## LEIA ME

** executar projeto

1. composer install
2. configure as conexões do seu banco de dados no arquivo .env
2. php artisan migrate
2. php artisan serve

## ROTAS

- Criar novos carros -> /api/car (PUT)
- Buscar carro -> /api/car/{id} (GET)
- Atualizar carro -> /api/car/{id} (GET)
- Listar todos -> /api/car (GET)