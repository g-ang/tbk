<?php
/**
 * Created by PhpStorm.
 * User: lixuegang
 * Date: 19/2/2
 * Time: 上午6:58
 */

require_once 'util.php';
$res=Util::Get("favlist");
$data=$res['tbk_uatm_favorites_get_response']['results']['tbk_favorites'];
?>
<table>
<thead>
    <tr>
        <td>favorites ID</td>
        <td>favorites Title</td>
        <td>favorites Type</td>
    </tr>
</thead>
<tbody>
<?php foreach ($data as $row):?>
    <tr>
        <td><?php echo $row['favorites_id']?></td>
        <td><a href="favorites.php?favid=<?php echo $row['favorites_id']?>"><?php echo $row['favorites_title']?></a></td>
        <td><?php echo $row['type']?></td>

    </tr>
<?php endforeach;?>
</tbody>
</table>

