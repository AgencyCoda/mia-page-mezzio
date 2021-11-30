# AgencyCoda Page Mezzio

1. Incluir libreria:
```bash
composer require mobileia/mia-core-mezzio
composer require mobileia/mia-auth-mezzio
composer require mobileia/mia-page-mezzio
```
5. Agregando las rutas:
```php
    /** MIA PAGE **/
    $app->route('/mia-page/fetch/{id}', [Mia\Page\Handler\FetchHandler::class], ['GET', 'POST', 'OPTIONS', 'HEAD'], 'mia-page.fetch-by-id');
    $app->route('/mia-page/fetch-by-slug/{slug}', [Mia\Page\Handler\FetchBySlugHandler::class], ['GET', 'POST', 'OPTIONS', 'HEAD'], 'mia-page.fetch-by-slug');
    $app->route('/mia-page/list', [Mia\Page\Handler\ListHandler::class], ['GET', 'POST', 'OPTIONS', 'HEAD'], 'mia-page.list');
    $app->route('/mia-page/tree', [Mia\Page\Handler\TreeHandler::class], ['GET', 'POST', 'OPTIONS', 'HEAD'], 'mia-page.tree');
    $app->route('/mia-page/save', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), Mia\Page\Handler\SaveHandler::class], ['POST', 'OPTIONS', 'HEAD'], 'mia-page.save');
    $app->route('/mia-page/remove/{id}', [\Mia\Auth\Handler\AuthHandler::class, new \Mia\Auth\Middleware\MiaRoleAuthMiddleware([MIAUser::ROLE_ADMIN]), Mia\Page\Handler\RemoveHandler::class], ['GET', 'DELETE', 'OPTIONS', 'HEAD'], 'mia-page.remove');
```