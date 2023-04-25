<h1>Login</h1>
<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach($errores as $error): ?>

            <div class="alerta error">
                <?php  echo $error; ?>
            </div>

        <?php endforeach; ?>    
    
        <form method="POST" class="formulario" action="/login" novalidate>
                <fieldset>
                    <legend >Email y Password</legend>

                    <label for="email">E-mail</label>
                    <input placeholder="Tu email" name="email" type="email" id="email" >

                    <label for="password">Password </label>
                    <input placeholder="Tu password" name="password" type="password" id="password" >
                    
                </fieldset>
                <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>
    </main>