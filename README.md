Rest API на Laravel

php artisan serve - запустить сервер по адресу localhost:8000
^ По этому адресу находится dump базы данных

CRUD команды выполняются по адресу localhost:8000/api/
^ Goods, Producers, Categories, Ratings

Сортировка в товарах и производителях выполняется с помощью аргумента sort в запросе, например localhost:8000/api/Goods?sort=rating или /api/Producers?sort=amount
Фильтрация по производителю и категории в товарах по аргументам producer_id, category_id, producer и category


Поиск выполняется по адресу localhost:8000/api/Goods/search/{name} или api/Producers/search/{name}
