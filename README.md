# Framework: gabriel-guzman-fw


### Funcionamiento:

El Framework está compuesto por "Application.php" y diversos componentes descritos con más detalle en el apartado siguiente.

Application.php se encarga de designar a través de los "setters", los componentes necesarios para ejecutar una aplicación a través del método "run()". 


### Descripción de los Componentes:

> Container:

- Container.php
(Construye un contenedor de servicios a partir del de Symfony e implementa un método que devuelve el mismo contenedor creado.)


> Routing:

- Routing.php
(Interfaz para especificar que el método "parseRoutes()" debe ser implementado.)

- YamlParser.php
(Clase que implementa el método de Routing, "parseRoutes()". Para ello necesita el parser de Yaml de Symfony y el path donde se encuentra el fichero a "parsear".)

- PhpParser.php
(Implementa el método anterior devolviendo un "include" del fichero que se encuentra en el "path" indicado, que contendrá un array PHP.)

- JsonParser.php
(Implementa el método anterior devolviendo un array gracias a la función de PHP "json_decode()".)

- GenericParser.php
(Clase que construye a partir del objeto recibido YamlParser, PhpParser o JsonParser, del tipo Routing, un objeto con el método "parseRoutes()" que devuelve la ruta o array del fichero de configuración pertinente.)

- Router.php
(Clase que construye a partir del objeto recibido del tipo GenericParser. El constructor inicializa su atributo "route" con el "array parseado". También se encarga de devolver la subruta en la que coincida el "path" de "request" con el "path" del fichero de configuración "routing" y comprueba que los métodos de "request" estén permitidos según la configuración.)


> Request:

- Request.php
(Clase con los atributos "method", "path" y los métodos "getMethod()" y "getPath()". El atributo "method" es inicializado con las variables globales $_GET, $_POST y $_SERVER. EL atributo "path" contiene la URL de la "request".)


> Dispatcher:

- Dispatcher.php
(Clase con el método "getController()" que recibe la subruta donde el router encuentra la coincidencia y devuelve el controlador pertinente.)


> Controller:

- Controller.php
(Interfaz para especificar que el método "__invoke()" debe ser implementado y recibir un objeto del tipo "Request".)


> Response:

- Response.php
(Interfaz "Response".)

- JsonResponse.php
(Clase que implementa la interfaz "Response" y inicializando su atributo "data" a partir de un array y lo devuelve a través de su método "getParameters()".)

- WebResponse.php
(Clase que implementa la interfaz "Response" y que consta de dos atributos, "templateName" y "parameters". Devuelve el nombre de la plantilla Twig a utilizar en la "View" y los parámetros a mostrar.)


> View:

- View.php
(Interfaz para especificar que el método "render()" debe ser implementado y recibir un objeto del tipo "Response".)

- JsonView.php
(Clase que implementa la interfaz "View" y muestra por pantalla la respuesta Json a través del método "render()".)

- WebView.php
(Interfaz que extiende de "View".)

- TwigView.php
(Clase que implementa a "WebView", con el atributo "twig". El constructor recibe el "path" donde se encuentran las plantillas, inicializa el cargador "loader" y el atributo "twig" mediante la implementación de Symfony.)


> Database:

- Database.php
(Interfaz para especificar que el método "prepare()" debe ser implementado.)

- MySQL.php
(Interfaz que extiende de "Database".)

- PDO.php
(Clase que implementa la interfaz "MySQL". El constructor recibe los parámetros: nombre de la base de datos, de "host", de usuario y su contraseña. A partir de estos, crea una base de datos, si no existe, con el nombre facilitado e inicializa el atributo de clase, "db", para poder tener acceso a ella. La clase también implementa el método "prepare" para realizar las consultas "MySQL".)


### Descripción del Flujo de una Petición:

Según este Framework, podríamos decir que una petición haría el siguiente Flujo:

index.php -> Application -> Router -> Dispatcher -> Controller -> Database -> Response -> View
