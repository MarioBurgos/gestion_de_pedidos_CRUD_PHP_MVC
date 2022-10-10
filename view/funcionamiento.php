<section class="section-three w-100" id="funcionamiento">
    <div class="container text-light">
        <h1 class="h1">Arquitectura de la aplicación:</h1>
        <hr>
        <h2>Modelo vista controlador:</h2>
        <p>Con MVC los desarrollos se realizan estructurada y ordenadamente, aportando escalabilidad, aunque también algo de complejidad. A primera vista, especialmente para los recién iniciados, puede resultar intimidante pero si se mantiene la calma y se analiza <a href="https://github.com/MarioBurgos/gestion_de_pedidos_CRUD_PHP_MVC" target="_blank">el código</a>, uno descubre que la dificultad no es tanta.</p>
        <p>A continuación se explica cómo se ha desarrollado esta aplicación web.</p>

        <h2>¿Qué es MVC?</h2>
        <p>Antes de empezar, es importante que se conozca el significado de estas siglas. <a href="https://developer.mozilla.org/es/docs/Glossary/MVC" target="_blank">MVC</a>, o Modelo Vista Controlador es un patrón de diseño de software utilizado para implementar interfaces de usuario (vistas) con los datos y lógica (modelo) siguiendo unas instrucciones escritas en un controlador, que gobierna las operaciones.</p>
        <p>Entonces, en esta aplicación de Pedidos,</p>
        <ul>
            <li>el <strong>Modelo</strong> se encarga de cargar y realizar operaciones con el back end o base de datos.</li>
            <li>la <strong>Vista</strong> corresponde al front end o interfaz gráfica.</li>
            <li>el <strong>Controlador</strong> solicita los datos mediante los métodos del modelo y los plasma en la vista. Es el enlace entre el front end y el back end.</li>
        </ul>
        <p>Es un patrón de diseño aceptado por desarrolladores desde hace muchísimos años, porque permite dividir el trabajo de front y back end en un grupo de trabajo; y además por la escalabilidad del código resultante.</p>

        <div class="code-box bg-light text-center">
            <a href="https://github.com/MarioBurgos/gestion_de_pedidos_CRUD_PHP_MVC" target="_blank">
                <h3>Clona el proyecto de Github o échale un vistazo</h3>
            </a>
        </div>

        <h2>Base de datos</h2><br>
        <p>La base de datos consiste en 3 tablas (productos, clientes y pedidos). El volcado de datos se ha hecho utilizando <a href="https://www.mockaroo.com/" target="_blank">Mockaroo</a> y puedes ejecutar el siguiente script para crear una copia similar a la que se está utilizando:</p>
        <div class="code-box bg-dark">
            <p class="text-light m-0">-- productos.sql</p>
            <hr>
            <code>
                <span class="comentario">-- CREACIÓN DE LA TABLA</span><br>
                <span class="palabra-reservada">CREATE TABLE</span> `productos` <span class="simbolo">(</span> <br>
                `id` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>11<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `codigo` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>11<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `nombre` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `descripcion` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>256<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `precio` <span class="palabra-reservada">float</span> <span class="palabra-reservada">NOT NULL</span><br>
                <span class="simbolo">)</span> ENGINE=InnoDB <span class="palabra-reservada">DEFAULT</span> CHARSET=utf8;
                <br>
                <hr>
                <span class="comentario">-- AÑADIR PRIMARY KEY id AUTOINCREMENTAL</span><br>
                <span class="palabra-reservada">ALTER TABLE</span> `productos`
                <span class="palabra-reservada">ADD PRIMARY KEY</span> <span class="simbolo">(</span>`id`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD UNIQUE KEY</span> `codigo` <span class="simbolo">(</span>`codigo`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">MODIFY</span> `id` <span class="palabra-reservada">int</span><span class="simbolo">(</span>11<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span> AUTO_INCREMENT, AUTO_INCREMENT=10;
                <br>
                <hr>
                <span class="comentario">-- INSERTAR ALGUNOS PRODUCTOS</span><br>
                <span class="palabra-reservada">INSERT INTO</span> `productos` <span class="simbolo">(</span>`id`, `codigo`, `nombre`, `descripcion`, `precio`<span class="simbolo">)</span> <br>
                <span class="palabra-reservada">VALUES</span> <br>
                <span class="simbolo">(</span>1, 39020261, 'Street Fighter, The', 'Vestibulum ac est lacinia nisi.', 76.75<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>2, 24173352, 'Public Eye, The', 'Cum sociis natoque penatibus et magnis.', 79.71<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>3, 53373454, 'Sparrow', 'Morbi porttitor lorem id ligula.', 69.39<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>4, 69682240, 'Black Sabbath', 'Sed sagittis. Nam congue, risus semper porta volutpat.', 91.06<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>5, 77867439, 'Circle, The', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna.', 94.04<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>6, 6632344, 'Transformers: The Movie', 'Nam ultrices, libero non mattis pulvinar.', 46.33<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>7, 34367104, 'Spiders Part 1: The Golden Lake, The', 'Fusce posuere felis sed lacus.', 42.15<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>8, 54760248, 'Life is to Whistle', 'Duis bibendum. Morbi non quam nec dui luctus rutrum.', 68.77<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>9, 41983057, 'Love & Pop', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere.', 43.2<span class="simbolo">)</span>;<br>
            </code>
        </div>
        <div class="code-box bg-dark">
            <p class="text-light m-0">-- clientes.sql</p>
            <hr>
            <code>
                <span class="comentario">-- CREACIÓN DE LA TABLA</span><br>
                <span class="palabra-reservada">CREATE TABLE</span> `clientes` <span class="simbolo">(</span> <br>
                `id` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `dni` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>9<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `nombre` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `apellido1` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `apellido2` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                <span class="simbolo">)</span> ENGINE=InnoDB <span class="palabra-reservada">DEFAULT</span> CHARSET=utf8;
                <br>
                <hr>
                <span class="comentario">-- AÑADIR PRIMARY KEY id AUTOINCREMENTAL Y HACER UNIQUE EL CAMPO dni</span><br>
                <span class="palabra-reservada">ALTER TABLE</span> `clientes`
                <span class="palabra-reservada">ADD PRIMARY KEY</span> <span class="simbolo">(</span>`id`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD UNIQUE KEY</span> `dni` <span class="simbolo">(</span>`dni`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">MODIFY</span> `id` <span class="palabra-reservada">int</span><span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span> AUTO_INCREMENT, AUTO_INCREMENT=11;
                <br>
                <hr>
                <span class="comentario">-- INSERTAR UNOS CUANTOS CLIENTES</span><br>
                <span class="palabra-reservada">INSERT INTO</span> `clientes` <span class="simbolo">(</span>`id`, `dni`, `nombre`, `apellido1`, `apellido2`<span class="simbolo">)</span> <br>
                <span class="palabra-reservada">VALUES</span> <br>

                <span class="simbolo">(</span>1, '60168376U', 'Tedi', 'Grossier', 'Lonnon'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>2, '60614481S', 'Sancho', 'Soutter', 'Tonry'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>3, '73718635H', 'Moria', 'Ventham', 'O\'Dowgaine'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>4, '65461116A', 'Garrek', 'Dicty', 'Dunridge'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>5, '86945601T', 'Nadine', 'Willoughley', 'Aloigi'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>6, '60790193I', 'Fan', 'Simchenko', 'Tretter'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>7, '25096313J', 'Kile', 'Perell', 'Goldsmith'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>8, '59975957Q', 'Felisha', 'Connop', 'Raith'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>9, '12947004U', 'Anjanette', 'MacGarrity', 'Kepe'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>10, '95725578O', 'Torrance', 'Hucknall', 'Inchbald'<span class="simbolo">)</span>;<br>
            </code>
        </div>
        <div class="code-box bg-dark">
            <p class="text-light m-0">-- pedidos.sql</p>
            <hr>
            <code>
                <span class="comentario">-- CREACIÓN DE LA TABLA</span><br>
                <span class="palabra-reservada">CREATE TABLE</span> `pedidos` <span class="simbolo">(</span> <br>
                `id` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `id_cliente` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `id_producto` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>11<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `cantidad` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>3<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `codigo_pedido` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>9<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `fecha` <span class="palabra-reservada">date</span> <span class="palabra-reservada">NOT NULL</span><br>
                <span class="simbolo">)</span> ENGINE=InnoDB <span class="palabra-reservada">DEFAULT</span> CHARSET=utf8;
                <br>
                <hr>
                <span class="comentario">-- AÑADIR PRIMARY PRIMARY KEY id Y LAS DOS FOREIGN KEY DE LA RELACIÓN</span><br>
                <span class="palabra-reservada">ALTER TABLE</span> `pedidos`
                <span class="palabra-reservada">ADD PRIMARY KEY</span> <span class="simbolo">(</span>`id`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD KEY</span> `fk_pedidos_cliente` <span class="simbolo">(</span>`id_cliente`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD KEY</span> `fk_pedidos_producto` <span class="simbolo">(</span>`id_producto`<span class="simbolo">)</span>;
                <br>
                <hr>
                <span class="comentario">-- INSERTAR PEDIDOS REALIZADOS</span><br>
                <span class="palabra-reservada">INSERT INTO</span> `pedidos` <span class="simbolo">(</span>`id`, `id_cliente`, `id_producto`, `cantidad`, `codigo_pedido`, `fecha`<span class="simbolo">)</span> <br>
                <span class="palabra-reservada">VALUES</span> <br>

                <span class="simbolo">(</span>1, 1, 1, 1, 1, '2022-04-04'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>2, 1, 2, 1, 1, '2022-04-04'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>3, 2, 2, 1, 2, '2022-05-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>4, 2, 3, 1, 2, '2022-05-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>5, 2, 4, 1, 2, '2022-05-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>6, 2, 5, 1, 2, '2022-05-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>7, 3, 6, 1, 3, '2022-05-12'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>8, 4, 7, 1, 4, '2022-05-12'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>9, 4, 8, 1, 4, '2022-05-12'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>10, 4, 9, 1, 4, '2022-05-12'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>11, 4, 10, 1, 5, '2022-07-05'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>12, 5, 7, 1, 6, '2022-07-05'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>13, 5, 8, 1, 6, '2022-08-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>14, 5, 9, 1, 6, '2022-08-10'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>15, 6, 4, 1, 7, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>16, 6, 5, 1, 7, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>17, 6, 6, 1, 7, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>18, 7, 3, 1, 8, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>19, 7, 3, 1, 8, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>20, 7, 1, 1, 8, '2022-09-01'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>21, 8, 1, 2, 9, '2022-09-29'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>22, 8, 2, 1, 9, '2022-09-29'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>23, 8, 7, 1, 9, '2022-09-29'<span class="simbolo">)</span>,<br>
                <span class="simbolo">(</span>24, 9, 10, 1, 10, '2022-09-29'<span class="simbolo">)</span>;<br>
                <br>
            </code>
        </div>

        <h2>Estructura de ficheros</h2>
        <br>
        <figure class="mx-auto">
            <img src="assets/img/estructura_ficheros.png" alt="Estructura de ficheros">
            <figcaption>Estructura de ficheros.</figcaption>
        </figure>
        <p>Como se observa en la imagen, el proyecto está dividido en directorios donde vamos a crear todo el código relativo a Modelos, Vistas y Controladores.</p>
        <p>También se van a incluir las carpetas de assets, algunos scripts en js y un archivo config para reunir las constantes declaradas.</p>

        <h3>> Fichero config.php</h3>

    </div><a href="index.php?controller=inicio" class="home-button btn-dark">Volver a inicio</a>
    <a href='#' class='scroll-top'>
        <svg height='35' viewBox='0 0 24 24' width='35' xmlns='http://www.w3.org/2000/svg'>
            <path d='M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z' />
            <path d='M0 0h24v24H0z' fill='none' />
        </svg>
    </a>
</section>