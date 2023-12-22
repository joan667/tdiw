<form class="LoginRegister" action="/index.php?Accio=Realizar_Registro" method="post">

    <label for="Name">Nom</label><br>
    <input type="text" id="Name" name="name" pattern="[A-Za-z0-9 ]+" required><br>

    <label for="EMail">EMail</label><br>
    <input type="text" id="EMail" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required><br>

    <label for="lname">Contrasenya:</label><br>
    <input type="password" id="Password" name="password" required><br>

    <label for="Address">Adreça:</label><br>
    <input type="text" id="Address" name="address" pattern="[a-zA-Z0-9 ]{1,30}"><br>

    <label for="Pob">Població:</label><br>
    <input type="text" id="Pob" name="pob" pattern="[a-zA-Z0-9 ]{1,30}"><br>

    <label for="PostCod">Codi Postal:</label><br>
    <input type="text" id="PostCod" name="postcod"><br>

    <!--pattern="ˆ\d{5}$" no funciona-->

    <input type="submit" value="Register">
    
</form>