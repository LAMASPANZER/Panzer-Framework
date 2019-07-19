
# Panzer PHP Framework
Minimal PHP Framework based on MVC

## Implementation
- Autoloading with PSR-4
- Use Smarty as template engine
- Use PHP>=7
## Installation
For apache, in vhost configuration set the folder "public" as base path.
``` apache
DocumentRoot /var/www/public
```

``` bash
$ composer install
```

Create the folders "_compiled" and "_cache" in App/Views and set the wrinting permission.

edit the file ``app.json`` in App folder to setting the routes, database credentials, debug level and more.
## Using
### Routes
Panzer Framework using [AltoRouter](https://github.com/dannyvankooten/AltoRouter)

### Plugins
### Controller
Exemple
``` php
namespace App\Controllers;

use Panzer\Controller;

class Exemple extends Controller
{
	public function index()
	{
		$this->view->assign(['data'=>$this->model->getTable()])
		->render('exemple');
	}
}

```
### Model
Exemple
``` php
namespace App\Models;

use Panzer\Database;

class Exemple extends Database
{
	public function getTable()
	{
		return self::$db->query("SELECT * FROM ".self::addPrefix('table'))->fetchAll(\PDO::FETCH_ASSOC);
	}
}
```
### View
Panzer Framework using [Smarty](https://www.smarty.net)
