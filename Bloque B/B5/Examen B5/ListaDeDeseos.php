<?php

// Clase ListaDeDeseos
class ListaDeDeseos
{
    /**
     * Array indexado que contiene cadenas de texto en sus elementos
     * Contiene las cartas recibidas para Santa Claus (que han sido almacenadas después de un proceso de normalización y limpieza)
     */
    private array $cartas;
    
    /**
     * Array indexado cuyos valores son cadenas de texto
     * Representa la lista de palabras prohibidas que no deben aparecer en las cartas
     */
    private array $palabrasProhibidas;

    /**
     * Array asociativo cuyas claves son strings (nombre de regalo) y sus valores el precio asociado al regalo. 
     * Representa una lista de posibles regalos que pueden fabricarse, junto con su precio correspondiente (array asociativo "regalo" => precio)
     */
    private array $posiblesRegalos; 
    
    /**
     * Array indexado que contiene cadenas de texto. 
     * Representa la lista de regalos que hay fabricados y listos para ser entregados
     */
    private array $regalosDisponibles; 

    /**
     * Constructor de la clase ListaDeDeseos.
     * 
     * Este constructor inicializa las propiedades principales de la clase, incluyendo las palabras prohibidas,
     * los regalos disponibles, y un array vacío para almacenar las cartas para Santa Claus. Además, precarga una lista inicial
     * de regalos disponibles a partir de los regalos configurados en `$posiblesRegalos`.
     * 
     * Parámetros:
     * - `$palabrasProhibidas` (array, opcional): Un array indexado de cadenas que define las palabras que no deben aparecer en las cartas de deseos.  
     *   Por defecto, el array está vacío, lo que significa que no habrá restricciones en el texto.
     * - `$posiblesRegalos` (array asociativo, opcional): Un array que asocia los nombres de los regalos con sus precios.  
     *   Por defecto, contiene los siguientes regalos:
     *   - `"bicicleta" => 299.99`
     *   - `"patinete" => 499.90`
     *   - `"videoconsola" => 599.99`
     * 
     * Inicialización de las propiedades:
     * - `$this->cartas`:  
     *   Se inicializa como un array vacío, destinado a almacenar las cartas recibidas y procesadas.
     * - `$this->palabrasProhibidas`:  
     *   Se asigna el valor del parámetro `$palabrasProhibidas` para definir las palabras que deben ser filtradas en las cartas.
     * - `$this->posiblesRegalos`:  
     *   Se asigna el valor del parámetro `$posiblesRegalos`, que contiene los nombres de los regalos disponibles junto con sus precios.
     * - `$this->regalosDisponibles`:  
     *   Inicialmente es un array vacío, que luego se llena con una lista inicial de regalos "fabricados".  
     *   La lista de regalos se genera aleatoriamente a partir de los nombres de regalos en `$this->posiblesRegalos`. 
     *   La cantidad inicial de regalos se establece como el doble del número de elementos en `$posiblesRegalos`.

     * Lógica adicional para generar el array "$this->regalosDisponibles":
     * - Se utiliza un bucle `for` para llenar la lista de `$this->regalosDisponibles` con nombres de regalos aleatorios:
     *   - Cada iteración llama a `array_rand($this->posiblesRegalos)`, que selecciona una clave aleatoria (nombre del regalo) del array `$this->posiblesRegalos`.
     *   - La lista resultante contendrá 2 veces el número de regalos posibles en `$this->posiblesRegalos`.
     * 
     * @param array $palabrasProhibidas Palabras que deben ser filtradas en las cartas. (Opcional)
     * @param array $posiblesRegalos Nombres de regalos con sus precios asociados. (Opcional)
     */
    public function __construct($palabrasProhibidas = [], $posiblesRegalos = ["bicicleta" => 299.99, "patinete" => 499.90, "videoconsola" => 599.99])
    {
        // Inicializar la lista de cartas como un array vacío
        $this->cartas = [];
        
        // Inicializar las palabras prohibidas con el valor del parámetro
        $this->palabrasProhibidas = $palabrasProhibidas;
        
        // Inicializar los posibles regalos con el valor del parámetro
        $this->posiblesRegalos = $posiblesRegalos;
        
        // Inicializar la lista de regalos disponibles
        $this->regalosDisponibles = [];

        // Generar la lista inicial de regalos disponibles
        // La cantidad de regalos inicial será el doble del número de elementos en $posiblesRegalos
        $cantidadInicial = count($this->posiblesRegalos) * 2;

        for ($i = 0; $i < $cantidadInicial; $i++) {
            // Seleccionar aleatoriamente un nombre de regalo
            $regaloAleatorio = array_rand($this->posiblesRegalos);

            // Añadir el regalo al array de regalos disponibles
            $this->regalosDisponibles[] = $regaloAleatorio;
        }
    }

    /**
     * Obtiene el precio de un regalo dado su nombre.
     * 
     * Este método devuelve el precio asociado a un regalo a partir de su nombre. Si el regalo es "carbón", 
     * retorna un precio de `0`, dado que este es un regalo simbólico sin coste.
     * 
     * Detalles del funcionamiento:
     * - `$nombreRegalo`: Es una cadena que representa el nombre del regalo cuyo precio se quiere consultar.
     * - `$this->posiblesRegalos`: Es un array asociativo que contiene los nombres de los regalos como claves y sus precios como valores.  
     *   Ejemplo: `["muñeca" => 10.5, "coche" => 20.0]`.
     * - Si el nombre del regalo no es "carbón", el método retorna el precio correspondiente accediendo al array `$this->posiblesRegalos`.
     * - Si el nombre del regalo es "carbón", el método retorna `0` como precio.
     * 
     * Consideraciones:
     * - Se asume que `$nombreRegalo` siempre será una clave válida dentro del array `$this->posiblesRegalos`, excepto para el caso especial de "carbón".
     * - No realiza validaciones adicionales sobre `$nombreRegalo`. Si se requiere mayor robustez, se podrían agregar controles para asegurarse de que el nombre del regalo existe en `$this->posiblesRegalos` antes de intentar acceder a su precio. 
     *   Pero no es necesario hacer esto para este ejercicio.
     * 
     * Ejemplo de uso:
     * - Supongamos que `$this->posiblesRegalos = ["muñeca" => 15.0, "coche" => 25.0]`.
     * - Llamada al método:  
     *   - `obtenerPrecioRegalo("muñeca")` devolverá `15.0`.
     *   - `obtenerPrecioRegalo("carbón")` devolverá `0`.
     * 
     * @param string $nombreRegalo El nombre del regalo cuyo precio se desea obtener.
     * @return float El precio del regalo (o `0` si el regalo es "carbón").
     */
    public function obtenerPrecioRegalo(string $nombreRegalo): float
    {
        // Caso especial: si el regalo es "carbón", retorna 0
        if ($nombreRegalo === "carbón") {
            return 0.0;
        }

        // Retornar el precio del regalo desde el array posiblesRegalos
        // No se valida la existencia de la clave, pues se asume que es válida según la especificación
        return $this->posiblesRegalos[$nombreRegalo];
    }

    /**
     * Limpia el texto de una carta para normalizarlo y facilitar su procesamiento.
     * 
     * Este método realiza dos pasos principales para limpiar y normalizar el texto recibido:
     * 1. **Eliminar espacios en blanco al inicio y al final del texto:**  
     *    Utiliza la función `trim()` para asegurarse de que no queden espacios no deseados antes o después del contenido del texto.
     * 2. **Convertir el texto a minúsculas:**  
     *    Utiliza la función `strtolower()` para transformar todo el texto a minúsculas, garantizando uniformidad y evitando problemas de sensibilidad a mayúsculas/minúsculas durante el procesamiento posterior.
     * 
     * Detalles:
     * - `$texto`: Es el texto original de la carta que será procesado.
     * - Este método no altera el contenido del texto en sí, únicamente elimina espacios sobrantes al comienzo y final del mismo, y unifica el formato en minúsculas.
     * - El texto procesado se devuelve como un string limpio y normalizado.
     * 
     * Ejemplo de uso:
     * - Supongamos que `$texto = "  Querido Santa, QUIERO UN JUGUETE   "`.
     * - Al ejecutar este método:
     *   1. `trim($texto)` elimina los espacios al inicio y al final, dejando `"Querido Santa, QUIERO UN JUGUETE"`.
     *   2. `strtolower($texto)` convierte todo a minúsculas, resultando en `"querido santa, quiero un juguete"`.
     * - El texto final devuelto es: `"querido santa, quiero un juguete"`.
     * 
     * @param string $texto El texto original de la carta.
     * @return string El texto limpio y normalizado.
     */
    public function limpiarTexto(string $texto): string
    {
        // Eliminar espacios al inicio y al final del texto
        $textoLimpio = trim($texto);
        
        // Convertir el texto a minúsculas
        $textoLimpio = strtolower($textoLimpio);
        
        // Devolver el texto limpio y normalizado
        return $textoLimpio;
    }

    /**
     * Limpia las palabras prohibidas de un texto, reemplazándolas por asteriscos.
     * 
     * Este método recorre el texto recibido como parámetro y sustituye todas las palabras que coincidan con las 
     * definidas en `$this->palabrasProhibidas` por una cadena de asteriscos ("*****") de la misma longitud que 
     * cada palabra prohibida. De este modo, garantiza que el texto no contenga contenido inapropiado o no permitido.
     * 
     * Detalles del funcionamiento:
     * - `$texto`: Es un string que contiene el texto original que se desea procesar.
     * - `$this->palabrasProhibidas`: Un array que almacena las palabras que no deben aparecer en el texto.
     *   - Ejemplo: `["feo", "gordo", "malo"]`.
     * - Por cada palabra prohibida en `$this->palabrasProhibidas`:
     *   1. Se construye una expresión regular (en una variable que podéis llamar `$regex`) para detectar la palabra prohibida que se está buscando en el texto.
     *   2. Se utiliza un bucle while que se repetirá mientras se detecte alguna ocurrencia de dicha palabra en el texto 
     *      (usar `preg_match()` para comprobar que exista al menos una ocurrencia).
     *   3. Dentro del bucle, se sustituirá (con `preg_replace()`) la primera ocurrencia de la palabra encontrada con una sucesión de asteríscos "*****"
     *      de longitud igual a la longitud de la palabra sustituida (p.e: si se sustituye "gordo" se reemplazará dicha palabra 
     *      en el texto por "*****" porque "gordo" tiene 5 letras) (Nota: podéis usar la función `strlen()` para obtener la longitud de la palabra)
     * 
     * Consideraciones:
     * - No es necesario hacer una búsqueda insensible a mayúsculas/minúsculas, ya que el texto que se recibirá como argumento siempre estará en minúsculas.
     * 
     * Ejemplo de uso:
     * - Supongamos que `$this->palabrasProhibidas = ["feo", "gordo"]` y `$texto = "santa claus es muy feo y gordo."`.
     * - Al ejecutar este método:
     *   1. La palabra "feo" se reemplaza por "***".
     *   2. La palabra "gordo" se reemplaza por "*****".
     *   3. El texto final devuelto es: `"santa claus es muy *** y *****."`.
     * 
     * @param string $texto El texto original que será procesado.
     * @return string El texto modificado, con las palabras prohibidas reemplazadas por asteriscos.
     */
    public function limpiarPalabrasProhibidas(string $texto): string
    {
        // Recorrer cada palabra prohibida en la lista
        foreach ($this->palabrasProhibidas as $palabraProhibida) {
            // Construir una expresión regular para buscar la palabra completa
            $regex = '/\b' . preg_quote($palabraProhibida, '/') . '\b/';

            // Reemplazar todas las ocurrencias de la palabra con asteriscos
            while (preg_match($regex, $texto)) {
                $texto = preg_replace($regex, str_repeat('*', strlen($palabraProhibida)), $texto, 1);
            }
        }

        // Devolver el texto limpio
        return $texto;
    }

    /**
     * Agrega una nueva carta al listado de cartas, limpiando su contenido y filtrando palabras prohibidas.
     * 
     * 
     * Este método permite añadir una carta al array `$this->cartas` tras procesar su texto. 
     * Detalles del proceso:
     * 1. Llamar al método `limpiarTexto` para eliminar espacios en blanco innecesarios y convertir todo el texto de la carta a minúsculas
     * 2. Reemplazar cualquier palabra prohibida en el texto con asteriscos ("*****") utilizando el método `limpiarPalabrasProhibidas`.
     * 3. Almacenar la carta procesada en el array `$this->cartas`.
     * 
     * Consideraciones:
     * - Este método no devuelve ningún valor, ya que su objetivo es actualizar el estado interno del objeto almacenando la carta procesada.
     * 
     * Ejemplo de uso:
     * - Supongamos que `$texto = "  Querido Santa, quiero un coche y un drone, pero nada de cosas malas feo.  "`.
     * - Tras ejecutar:
     *   1. Tras limpiar el texto se produce: `"querido santa, quiero un coche y un drone, pero nada de cosas malas feo."`.
     *   2. Al limpiar las palabras prohibidas se sustituye "feo" por "***". (Suponiendo que "feo" se encuentre en la lista de palabras prohibidas)
     *   3. El resultado almacenado en `$this->cartas` es:
     *      `["querido santa, quiero un coche y un drone, pero nada de cosas malas ***."]`.
     * 
     * @param string $texto El texto original de la carta enviada.
     */
    public function agregarCarta(string $texto)
    {
        // 1. Limpiar el texto eliminando espacios y convirtiéndolo a minúsculas
        $textoLimpio = $this->limpiarTexto($texto);

        // 2. Reemplazar las palabras prohibidas con asteriscos
        $textoProcesado = $this->limpiarPalabrasProhibidas($textoLimpio);

        // 3. Almacenar la carta procesada en el array de cartas
        $this->cartas[] = $textoProcesado;
    }

    /**
     * Devuelve el array que contiene las cartas (strings) almacenadas.
     */
    public function obtenerCartas()
    {
        return $this->cartas;
    }

    /**
     * Genera un nuevo regalo y retorna el primer regalo disponible del inventario.
     * 
     * Este método asegura que siempre haya regalos disponibles para ser asignados. Para ello:
     * 1. Llama al método `producirNuevoRegalo` para generar y agregar un nuevo regalo aleatorio al inventario 
     *    representado por el array `$this->regalosDisponibles`.
     * 2. Extrae y elimina el primer regalo del array `$this->regalosDisponibles` utilizando `array_shift` 
     *    y lo devuelve como resultado.
     * 
     * Detalles del funcionamiento:
     * - `$this->producirNuevoRegalo()` se invoca al principio para garantizar que el inventario nunca quede vacío. 
     *   Este método agrega un regalo aleatorio a `$this->regalosDisponibles`.
     * - `array_shift($this->regalosDisponibles)` extrae y devuelve el primer regalo del array, reduciendo el 
     *   tamaño del inventario en uno.
     * 
     * Consideraciones:
     * - Si `$this->regalosDisponibles` estuviera vacío al momento de llamar a este método (antes de producir un nuevo regalo), 
     *   el método aún funcionará correctamente, ya que primero genera un nuevo regalo antes de intentar extraer uno.
     * - Este enfoque asegura un flujo continuo de regalos, ya que el inventario se mantiene actualizado dinámicamente.
     * 
     * Ejemplo de uso:
     * - Supongamos que inicialmente `$this->regalosDisponibles = ["bicicleta", "patinete"];`.
     * - Al ejecutar este método:
     *   1. Se genera un nuevo regalo, por ejemplo, "videoconsola", y el inventario pasa a ser:
     *      `$this->regalosDisponibles = ["bicicleta", "patinete", "videoconsola"];`.
     *   2. Se extrae el primer regalo disponible, "bicicleta", y el inventario pasa a ser:
     *      `$this->regalosDisponibles = ["patinete", "videoconsola"];`.
     * - El método devuelve "bicicleta".
     * 
     * @return string El primer regalo disponible en el inventario de `$this->regalosDisponibles`.
     */
    public function obtenerRegalo(): string
    {
       // Aseguramos que siempre haya al menos un regalo disponible
        $this->producirNuevoRegalo();

        // Extraer y retornar el primer regalo disponible
        return array_shift($this->regalosDisponibles);
    }

    /**
     * Este método selecciona de forma aleatoria un regalo de la lista de posibles regalos (`$this->posiblesRegalos`) 
     * y lo añade al array `$this->regalosDisponibles`, que representa el inventario actual de regalos listos 
     * para ser repartidos.
     * 
     * Detalles del funcionamiento:
     * - `$this->posiblesRegalos`: Un array asociativo donde las claves de los elementos son los nombres de los regalos 
     *   y sus valores el precio asociado a cada regalo
     * - `$this->regalosDisponibles`: Un array que actúa como inventario de los regalos disponibles para repartir. 
     *   Este array se actualiza cada vez que se genera un nuevo regalo.
     * 
     * Proceso:
     * 1. El método debe utilizar `array_rand` para seleccionar una clave aleatoria del array `$this->posiblesRegalos`.
     *    - `array_rand` devuelve una clave del array, no el valor directamente.
     * 2. La clave seleccionada (se corresponde con el nombre del regalo aleatoriamente seleccionado) se agrega al array 
     *    `$this->regalosDisponibles` utilizando `array_push`.
     * 
     * Consideraciones:
     * - El método no devuelve ningún valor, ya que su única tarea es actualizar el array `$this->regalosDisponibles`.
     * - No realiza validaciones adicionales, por lo que se asume que `$this->posiblesRegalos` contiene al menos 
     *   un elemento antes de que este método sea llamado.
     * 
     * Ejemplo de uso:
     * - Supongamos que `$this->posiblesRegalos = ["bicicleta" => 299.99, "patinete" => 499.90, "videoconsola" => 599.99];`.
     * - Antes de ejecutar el método:
     *   `$this->regalosDisponibles = ["bicicleta"];`
     * - Al ejecutar el método, si se selecciona aleatoriamente "patinete":
     *   `$this->regalosDisponibles = ["bicicleta", "patinete"];`
     */
    public function producirNuevoRegalo(): void
    {
        // Seleccionar aleatoriamente una clave (nombre del regalo) de la lista de posibles regalos
        $regaloAleatorio = array_rand($this->posiblesRegalos);

        // Agregar el nombre del regalo seleccionado al inventario de regalos disponibles
        array_push($this->regalosDisponibles, $regaloAleatorio);
    }

    /**
     * Analiza el reparto de regalos para determinar si los deseos de cada casa fueron cumplidos.
     * 
     * Este método verifica, para cada casa, si alguno de los regalos asignados coincide con los deseos
     * expresados en las cartas enviadas a Santa Claus. En función de esto, genera un array de booleanos
     * indicando si se ha cumplido (`true`) o no (`false`) el reparto para cada casa.
     * 
     * @param array $repartoDeRegalos Un array bidimensional donde:
     * - Cada sub-array representa una casa y contiene los regalos asignados a esa casa.
     * @return array Un array de valores booleanos donde:
     * - `true` indica que al menos uno de los regalos asignados coincide con un deseo en la carta de la casa.
     * - `false` indica que ninguno de los regalos asignados coincide con los deseos de la carta.
     * 
     * Detalles del proceso:
     * 1. Se itera a través de cada casa, representada por un índice en el array `$repartoDeRegalos`.
     * 2. Para cada casa, se recorre el sub-array de regalos asignados:
     *    - Si al menos uno de los regalos asignados coincide con algún deseo de la carta asociada a la casa
     *      (se puede comprobar fácilmente mediante `preg_match`), se marca como `true`.
     *    - Si no hay coincidencias tras revisar todos los regalos asignados, se marca como `false`.
     * 3. El resultado es un array de booleanos donde cada índice representa si el reparto fue exitoso o no para cada casa.
     * 
     * Ejemplo:
     * - Supongamos que las cartas contienen los deseos:
     *   `$this->cartas = [
     *                      "quiero un coche", 
     *                      "quiero una muñeca", 
     *                      "quiero una pelota o un libro", 
     *                      "quiero un tren *****"];`
     * - Y el reparto de regalos es:
     *   `$repartoDeRegalos = [
     *                          ["coche", "pelota"], 
     *                          ["muñeca", "libro"], 
     *                          ["bicicleta"], 
     *                          ["carbón"]
     *                        ];`
     * - Análisis del reparto:
     *   - Casa 0: El regalo "coche" está en la carta -> `true`.
     *   - Casa 1: El regalo "muñeca" está en la carta -> `true`.
     *   - Casa 2: Ninguno de los regalos ("bicicleta") coincide con los deseos -> `false`.
     *   - Casa 3: El regalo "carbón" no aparece en la carta -> `false`.
     * - Resultado: `[true, true, false, false]`.
     */
    public function analisisReparto(array $repartoDeRegalos): array
    {
        // Array para almacenar los resultados del análisis (true o false para cada casa)
        $resultado = [];

        // Iterar a través de cada casa y los regalos asignados
        foreach ($repartoDeRegalos as $indiceCasa => $regalosCasa) {
            // Obtener la carta asociada a la casa actual
            $carta = $this->cartas[$indiceCasa];

            // Inicializar una bandera para determinar si se cumple algún deseo
            $deseoCumplido = false;

            // Verificar cada regalo asignado a la casa
            foreach ($regalosCasa as $regalo) {
                // Utilizar preg_match para verificar si el regalo está mencionado en la carta
                if (preg_match('/\b' . preg_quote($regalo, '/') . '\b/', $carta)) {
                    $deseoCumplido = true;
                    break; // Si se encuentra un regalo coincidente, no es necesario seguir verificando
                }
            }

            // Agregar el resultado (true o false) al array de resultados
            $resultado[] = $deseoCumplido;
        }

        // Devolver el array con los resultados del análisis
        return $resultado;
    }
}
