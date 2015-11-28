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
        <form action="<?=site_url('masalah/'.$masalah->id)?>" method="post">
            <button type="submit" name="proposal" value="<?=$this->session->id?>">Kirim Proposal</button>
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
