<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title;?></title>
    </head>
    <body>
        <form action="<?=site_url('masalah/create')?>" method="post">
            <input type="text" name="judul" value="<?=set_value('judul')?>" placeholder="Judul"><br>
            <textarea name="deskripsi" rows="8" cols="40" placeholder="Berisi penjelasan"></textarea>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
