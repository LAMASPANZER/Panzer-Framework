# Panzer PHP Framework
Minimal PHP Framework based on MVC

## Implementation
- Autoloading with psr-7
- Use Smarty
## Installation
For apache, in vhost configuration set the folder "public" as base path.
``` apache
DocumentRoot /var/www/public
```

``` bash
$ composer install
```
edit the file ``app.json`` in App folder to setting the routes, database credentials, debug level and more.
## Using
### Routes
### Plugins
### Controller
``` php
namespace App\Controllers;

use Panzer\Controller;

class Exemple extends Controller
{
	public function index()
	{
		$this->view->render('exemple');
	}
}
```
### Models
### Views

