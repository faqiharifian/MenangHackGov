<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title;?></title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($masalah)){
                foreach ($masalah as $key => $item) {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td><a href="'.site_url('masalah/'.$item->id).'">'.$item->judul.'</a></td>
                        <td>'.$item->deskripsi.'</td>
                    </tr>';
                }
            }else{
                echo '<tr>
                    <td colspan="3">Empty</td>
                </tr>';
            }
            ?>
            <tr>
                <td></td>
                <td><a href="<?=site_url('masalah/create')?>">Buat baru</a></td>
            </tr>
            </tbody>
        </table>

    </body>
</html>
