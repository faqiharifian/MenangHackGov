<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1><?=$permintaan->judul?></h1>
        <p>
            <?=$permintaan->deskripsi?>
        </p>
        <form class="" action="<?=current_url()?>" method="post">
            <button type="submit" name="terima" value="1">Terima</button>
        </form>
    </body>
</html>
