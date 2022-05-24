<!-- L'action viene mandato nella pagina che richiede questo template -->
<form action="" method="post">

    <!-- chiedo a php di trattare questi campi come un array -->
    <!-- è importante che il nome dei campi del form coincida con il nome delle colonne nel database -->
    <input type="hidden" name="joke[id]" value="<?= $joke['id'] ?? '' ?>">
    <label for="joketext">Type your joke here:
    </label>
    <textarea id="joketext" name="joke[joketext]" row="3" cols="40">
        <?= $joke['joketext'] ?? '' ?>
    </textarea>
    <input type="submit" value="Save" name="submit">
</form>