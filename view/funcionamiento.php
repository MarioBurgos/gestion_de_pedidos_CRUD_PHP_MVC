<section class="section-three w-100" id="funcionamiento">
    <div class="container text-light">
        <h1 class="h1">Arquitectura de la aplicación:</h1>
        <hr>
        <h2>Modelo vista controlador:</h2>
        <p>Con MVC los desarrollos se realizan estructurada y ordenadamente, aportando escalabilidad, aunque también algo de complejidad. A primera vista, especialmente para los recién iniciados, puede resultar intimidante pero si se mantiene la calma y se analiza <a href="https://github.com/MarioBurgos/gestion_de_pedidos_CRUD_PHP_MVC">el código</a>, uno descubre que la dificultad no es tanta.</p>
        <p>A continuación se explica cómo se ha desarrollado esta aplicación web.</p>

        <h2>¿Qué es MVC?</h2>
        <p>Antes de empezar, es importante que se conozca el significado de estas siglas. <a href="https://developer.mozilla.org/es/docs/Glossary/MVC">MVC</a>, o Modelo Vista Controlador es un patrón de diseño de software utilizado para implementar interfaces de usuario (vistas) con los datos y lógica (modelo) siguiendo unas instrucciones escritas en un controlador, que gobierna las operaciones.</p>
        <p>Entonces, en esta aplicación de Pedidos,</p>
        <ul>
            <li>el <strong>Modelo</strong> se encarga de cargar y realizar operaciones con el back end o base de datos.</li>
            <li>la <strong>Vista</strong> corresponde al front end o interfaz gráfica.</li>
            <li>el <strong>Controlador</strong> solicita los datos mediante los métodos del modelo y los plasma en la vista. Es el enlace entre el front end y el back end.</li>
        </ul>
        <p>Es un patrón de diseño aceptado por desarrolladores desde hace muchísimos años, porque permite dividir el trabajo de front y back end en un grupo de trabajo; y además por la escalabilidad del código resultante.</p>

        <div class="code-box bg-light text-center">
            <a href="https://github.com/MarioBurgos/gestion_de_pedidos_CRUD_PHP_MVC">
                <h3>Clona el proyecto de Github o échale un vistazo</h3>
            </a>
        </div>

        <h2>Base de datos</h2>
        <div class="code-box bg-dark">
        <p class="text-light m-0">productos.sql</p><hr>
            <code>
                <span class="palabra-reservada">CREATE TABLE</span> `productos` <span class="simbolo">(</span> <br>
                `id` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>11<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `codigo` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>11<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `nombre` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `descripcion` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>256<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `precio` <span class="palabra-reservada">float</span> <span class="palabra-reservada">NOT NULL</span><br>
                <span class="simbolo">)</span> ENGINE=InnoDB <span class="palabra-reservada">DEFAULT</span> CHARSET=utf8;
                <br><hr>

                <span class="palabra-reservada">ALTER TABLE</span> `productos`
                <span class="palabra-reservada">ADD PRIMARY KEY</span> <span class="simbolo">(</span>`id`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD UNIQUE KEY</span> `codigo` <span class="simbolo">(</span>`codigo`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">MODIFY</span> `id` int<span class="simbolo">(</span>11<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span> AUTO_INCREMENT, AUTO_INCREMENT=113;
                <br><hr>

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
        <p class="text-light m-0">clientes.sql</p>
        <hr>
            <code>
                <span class="palabra-reservada">CREATE TABLE</span> `clientes` <span class="simbolo">(</span> <br>
                `id` <span class="palabra-reservada">int</span> <span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span>,<br>
                `dni` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>9<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `nombre` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `apellido1` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                `apellido2` <span class="palabra-reservada">varchar</span> <span class="simbolo">(</span>50<span class="simbolo">)</span><span class="palabra-reservada">NOT NULL</span>,<br>
                <span class="simbolo">)</span> ENGINE=InnoDB <span class="palabra-reservada">DEFAULT</span> CHARSET=utf8;
                <br><hr>

                <span class="palabra-reservada">ALTER TABLE</span> `clientes`
                <span class="palabra-reservada">ADD PRIMARY KEY</span> <span class="simbolo">(</span>`id`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">ADD UNIQUE KEY</span> `dni` <span class="simbolo">(</span>`dni`<span class="simbolo">)</span>,<br>
                <span class="palabra-reservada">MODIFY</span> `id` int<span class="simbolo">(</span>6<span class="simbolo">)</span> <span class="palabra-reservada">NOT NULL</span> AUTO_INCREMENT, AUTO_INCREMENT=113;
                <br><hr>

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

    </div><a href="index.php?controller=inicio" class="home-button btn-dark">Volver a inicio</a>
</section>