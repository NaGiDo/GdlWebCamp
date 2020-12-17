<?php include_once'includes/templates/header.php'; ?>
    <section class="seccion contenedor">

        <h2>La mejor conferencia de diseño web en español</h2>
        <p>uspendisse gravida malesuada dignissim. Suspendisse posuere nulla eu ornare blandit. Vivamus quis lorem bibendum, tristique nisl sed, rutrum orci. Sed lorem magna, vestibulum ac gravida eget, placerat sit amet erat. Fusce ac rhoncus orci, eu blandit
            libero.
        </p>

    </section>
    <!--seccion-->
    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop muted poster="bg-talleres.jpg">
            <source src="video/video.mp4" type="video/mp4">
            <source src="video/video.webm" type="video/webm">
            <source src="video/video.ogv" type="video/ogg">
            </video>
        </div>
        <!--.contenedor-video-->
        <div class="contenido-programa">
            <div class="contenedor">
            <div class="programa-evento">
                <h2>Programa del Evento</h2>
        
                <?php
                try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT * FROM `categoria_evento` ";
                $resultado = $conn->query($sql);
                } catch (Exception $e) {
                $error = $e->getMessage();
                }
                ?>
                <nav class="menu-programa">
                <?php while ($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <?php $categoria = $cat['cat_evento']; ?>
                    <a href="#<?php echo strtolower($categoria) ?>">
                    <i class="fa <?php echo $cat['icono'] ?>" aria-hidden="true"></i> <?php echo $categoria ?>
                    </a>
                <?php } ?>
                </nav>
        
                <?php
                try {
                require_once('includes/funciones/bd_conexion.php');
        
                $sql = "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= "FROM `eventos` ";
                $sql .= "INNER JOIN `categoria_evento` ";
                $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .= "INNER JOIN `invitados` ";
                $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 1 ";
                $sql .= "ORDER BY `evento_id` LIMIT 2;";
                $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= "FROM `eventos` ";
                $sql .= "INNER JOIN `categoria_evento` ";
                $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .= "INNER JOIN `invitados` ";
                $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 2 ";
                $sql .= "ORDER BY `evento_id` LIMIT 2;";
                $sql .= "SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `nombre_invitado`, `apellido_invitado` ";
                $sql .= "FROM `eventos` ";
                $sql .= "INNER JOIN `categoria_evento` ";
                $sql .= "ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                $sql .= "INNER JOIN `invitados` ";
                $sql .= "ON eventos.id_inv=invitados.invitado_id ";
                $sql .= "AND eventos.id_cat_evento = 3 ";
                $sql .= "ORDER BY `evento_id` LIMIT 2;";
                } catch (Exception $e) {
                $error = $e->getMessage();
                }
                ?>
        
                <?php $conn->multi_query($sql); ?>
        
                <?php
                do {
                $resultado = $conn->store_result();
                $row = $resultado->fetch_all(MYSQLI_ASSOC);    ?>
        
                <?php $i = 0; ?>
                <?php foreach ($row as $evento) : ?>
                    <?php if ($i % 2 == 0) { ?>
                    <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                    <?php } ?>
                    <div class="detalle-evento">
                        <h3><?php echo html_entity_decode($evento['nombre_evento']) ?></h3>
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $evento['hora_evento']; ?></p>
                        <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $evento['fecha_evento']; ?></p>
                        <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $evento['nombre_invitado'] . " " .  $evento['apellido_invitado']; ?></p>
                    </div>
                    <?php if ($i % 2 == 1) : ?>
                        <a href="calendario.php" class="button float-right">Ver todos</a>
                    </div>
                    <!--#talleres-->
                    <?php endif; ?>
                    <?php $i++; ?>
                <?php endforeach; ?>
                <?php $resultado->free(); ?>
                <?php  } while ($conn->more_results() && $conn->next_result()); ?>
        
        
        
            </div>
            <!--.programa-evento-->
            </div>
            <!--.contenedor-->
        </div>
        <!--.contenido-programa-->
    </section>
<!--.programa-->

    <?php include_once'includes/templates/invitados.php'; ?>

    <div class="contador parallax ">
        <div class="contenedor">
            <ul class="resumen-evento">
                <li>
                    <p class="numero"></p>Invitados</li>
                <li>
                    <p class="numero"></p>Talleres</li>
                <li>
                    <p class="numero"></p>Dias</li>
                <li>
                    <p class="numero"></p>Conferencias</li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>Pase Por dia</h3>
                        <p class="numero">30$</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas Las Conferecnias</li>
                            <li><i class="fas fa-check"></i>Todos Los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Todos Los Dias</h3>
                        <p class="numero">50$</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas Las Conferecnias</li>
                            <li><i class="fas fa-check"></i>Todos Los Talleres</li>
                        </ul>
                        <a href="#" class="button">Comprar</a>
                    </div>
                </li>
                <li>
                    <div class="tabla-precio">
                        <h3>Pase por 2 Dias</h3>
                        <p class="numero">45$</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                            <li><i class="fas fa-check"></i>Todas Las Conferecnias</li>
                            <li><i class="fas fa-check"></i>Todos Los Talleres</li>
                        </ul>
                        <a href="#" class="button hollow">Comprar</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--Precios-->

    <div class="mapa" id="mapa"></div>
    <!--Mapa-->

    <section class="seccion">
        <h2>Testimoniales</h2>
        <div class="testimoniales contenedor clearfix">
            <div class="testimonial">
                <blockquote>
                    <p>vitae iaculis sem dui a dui. Quisque odio odio, sollicitudin a vulputate ac, euismod ut nisl. In placerat consequat hendrerit.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobar <span>Diseñador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial">
                <blockquote>
                    <p>vitae iaculis sem dui a dui. Quisque odio odio, sollicitudin a vulputate ac, euismod ut nisl. In placerat consequat hendrerit.</p>
                    <footer class="info-testimonial clearfix">
                        <img src=" img/testimonial.jpg " alt="imagen testimonial ">
                        <cite>Oswaldo Aponte Escobar <span>Diseñador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
            <div class="testimonial ">
                <blockquote>
                    <p>vitae iaculis sem dui a dui. Quisque odio odio, sollicitudin a vulputate ac, euismod ut nisl. In placerat consequat hendrerit.</p>
                    <footer class="info-testimonial clearfix">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo Aponte Escobar <span>Diseñador en @Prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <!--Testimonial-->
        </div>
    </section>

    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Registrate en Newsletter:</p>
            <h3>GdlWebCamp</h3>
            <a href="#" class="button transparente">Registro</a>
        </div>
    </div>
    <!--Newsletter-->
    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-regresiva contenedor">
            <ul class="clearfix">
                <li>
                    <p id='dias' class="numero"></p>Días</li>
                <li>
                    <p id="horas" class="numero"></p>Horas</li>
                <li>
                    <p id="minutos" class="numero"></p>Minutos</li>
                <li>
                    <p id="segundos" class="numero"></p>Segundos</li>
            </ul>
        </div>
    </section>
    <!--Cuenta Regresiva-->

<?php include_once'includes/templates/footer.php'; ?>