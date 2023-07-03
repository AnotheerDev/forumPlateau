<div>
    <h1> S'inscrire </h1>

    <form action="index.php?ctrl=security&action=register" method="POST">
        <div>
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="nickname" required>
        </div>

        <div>
            <label><b>Email</b></label>
            <input type="email" placeholder="Entrer l'email" name="email" required>
        </div>

        <div>
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        </div>

        <div>
            <label><b>Confirmation Mot de passe</b></label>
            <input type="password" placeholder="Confirmer le mot de passe" name="confirmPassword" required>
        </div>

        <div>
            <input type="submit" id='submit' value="S'inscrire" name="submitRegisteration">
        </div>
    </form>
</div>