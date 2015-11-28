<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title;?></title>
    </head>
    <body>
        <h2><?=$masalah->judul?></h2>
        <p>
            <?=$masalah->deskripsi?>
        </p>
        <form action="<?=site_url('solusi/'.$masalah->id)?>" method="post">
            <button type="submit" name="permintaan" value="<?=$this->session->id?>">Kirim Permintaan</button>
        </form>
        <ul>
            <?php
                foreach($solusi as $key => $item){
                    echo '<li>'.$item->deskripsi.'</li>';
                }
            ?>
        </ul>
    </body>
</html>
