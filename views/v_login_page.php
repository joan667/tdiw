<form class="LoginRegister" action="/index.php?Accio=Realizar_Login" method="post">

    <label for="NameMail">Correu:</label><br>
    <input type="text" id="NameMail" name="namemail" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required><br>


    <label for="Password">Contrasenya:</label><br>
    <input type="password" id="Password" name="password" required>

    <input type="submit" value="Login">
    
</form>