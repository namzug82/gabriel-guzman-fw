# Funcionamiento del Framework: gabriel-guzman-fw


### Funcionamiento:

El Framework está compuesto por "Application.php" y diversos componentes descritos con más detalle en el apartado siguiente.

Application.php se encarga de designar a través de los "setters", los componentes necesarios para ejecutar una aplicación a través del método "run()". 


### Descripción de los Componentes:

> Container:
- Container.php

> Routing:
- Routing.php
- Router.php
- YamlParser.php
- PhpParser.php
- JsonParser.php
- GenericParser.php

> Request:
- Request.php

> Dispatcher:
- Dispatcher.php

> Controller:
- Controller.php

> Response:
- Response.php
- JsonResponse.php
- WebResponse.php

> View:
- View.php
- JsonView.php
- WebView.php
- TwigView.php

> Database:
- Database.php
- MySQL.php
- PDO.php


### Descripción del Flujo de una Petición:

Según este Framework, podríamos decir que una petición haría el siguiente Flujo:

index.php -> Application -> Router -> Dispatcher -> Controller -> Database -> Response -> View
