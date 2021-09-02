<div class="overlay login-check"></div>
<header>
    <div>
        <a class="logo" href="/pelix"> PELIX</a>
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-v" class="svg-inline--fa fa-ellipsis-v fa-w-6 dropdown-menu" role="img" viewBox="0 0 192 512">
            <path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z" />
        </svg>
    </div>

    <div class="division menu-items">
        <form autocomplete="off" id="searchForm">
            <input type="search" class="search" placeholder="Buscar...">
        </form>
        <?php
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            echo '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-circle" class="svg-inline--fa fa-user-circle fa-w-16 already-logged" role="img" viewBox="0 0 496 512"><path fill="currentColor" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"/></svg>';
        } else {
            echo '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16 login-logo login-check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path></svg>';
        }
        ?>
    </div>
</header>
<div class="login-parent">
    <div class="login-window">
        <div class="close-window login-check"></div>
        <h2>Ingresar</h2>
        <form method="POST" id="loginForm" action="login.php">
            <label for="user_name">Correo o Usuario</label><input name="user_name" type="name" id="user_name" required>
            <label for="user_pass">Contraseña</label><input name="user_pass" type="password" id="user_pass" required>
            <div class="check-container">
                <input type="checkbox" id="remember"><label for="remember" id="remember-pass">Recordar Contraseña</label>
            </div>
            <button class="form-btn" type="submit" id="submit">Entrar</button>
            <hr>
            <div class="login-extra">
                <a href="#" class="forgot-pass" name="login" onclick="registerWindow()">¿Aún no tienes cuenta?</a><a href="#" class="forgot-pass"> ¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
</div>
<div class="img-main">
    <h1>Bienvenido a <span>PELIX</span></h1>
    <h2>Te ayudamos a encontrar la película adecuada</h2>
</div>
<main id="main">
</main>
<footer>
    <p>Powered by <a href="https://github.com/Krb0" target="_blank" rel="noopener">Krb</a></p>
</footer>
<script src="script.js?version=<? echo time() ?>"></script>