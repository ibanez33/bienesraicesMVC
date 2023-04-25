<main class="contenedor seccion">
        <section class="contenedor seccion">
            <h1>Mas sobre Nosotros</h1>
    
            <?php include 'iconos.php'; ?>
        </section>
</main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <?php 

            $limite = 3;
            include 'listado.php';
        
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">   
        <h2>Encuentra la casa de tus suenos</h2>
        <p>Llena el formulario de contacto y un aseso se pondra en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contactanos</a>
    </section>
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>

                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada de blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                        
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atencion y la casa que em ofrecieron cumple con todas mis expectativs.
                </blockquote>
                <p>- Miguel Ibanez</p>
            </div>
        </section>
    </div>