<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
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
            if(!empty($permintaan)){
                foreach ($permintaan as $key => $item) {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td><a href="'.site_url('permintaan/'.$item->id.'/'.$item->id_pengunjung).'">'.$item->judul.'</a></td>
                        <td>'.$item->deskripsi.'</td>
                    </tr>';
                }
            }else{
                echo '<tr>
                    <td colspan="3">Empty</td>
                </tr>';
            }
            ?>
            </tbody>
        </table>
    </body>
</html>
