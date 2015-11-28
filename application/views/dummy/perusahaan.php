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
                    <th>Nama</th>
                    <th>Tentang</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($users)){
                foreach ($users as $key => $user) {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$user->nama.'</td>
                        <td>'.$user->tentang.'</td>
                    </tr>';
                }
            }else{
                echo '<tr>
                    <td colspan="2">Empty</td>
                </tr>';
            }
            ?>
            </tbody>
        </table>

    </body>
</html>
