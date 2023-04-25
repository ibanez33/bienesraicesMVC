<main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>
        <?php  if($mensaje) { ?>
                 <p class='alerta exito'> <?php echo  $mensaje;  ?> </p>;
        <?php  } ?>
        
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>
        <h2>Llena el formulario de Contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend >Informacion Personal</legend>

                <label for="nombre">Nombre: </label>
                <input placeholder="Tu Nombre" type="text" id="nombre" name="contacto[nombre]" required>

               

                

                <label for="mensaje">Mensaje: </label>
                <textarea  id="mensaje" name="contacto[mensaje]" required></textarea>
                
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la Propiedad</legend>

                <label for="">Vende o compra:</label>
                <select name="contacto[tipo]" id="opciones" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto: </label>
                <input placeholder="Tu Precio o Presupuesto" type="number" id="presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Contacto </legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label> 
                    <input  type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">E-mail</label>
                    <input  type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>   
                
                <div id="contacto"></div>

                

            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde" >
        </form>
    </main>