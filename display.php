<!DOCTYPE HTML>
<?php
//error_reporting(0);
include_once 'dao.php';
include_once 'model.php';
$d = new Dao();
$m = new Model();
$result = $d->select('product', "");
$count= mysqli_num_rows($result);
?>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>Display</title>
    </head>
    <body>
        <table border="1">
            <form name="delete" method="post">
                <tr>
                    <th>PRODUCT ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRODUCT PRICE</</th>
                    <th>PRODUCT DESCRIPTION</th>
                    <th>PRODUCT CATEGORY</th>
                    <th>PRODUCT QUANTITY</th>
                    <th>PRODUCT IMAGE</th>
                    <th colspan="2">ACTION</th></tr>
                <?php
                $i=1;
                while ($row = mysqli_fetch_row($result)) {
                  ?>
                    <tr>
                        <td><?php echo $row[1]; ?> </td>
                        <td><?php echo $row[2]; ?> </td>
                        <td><?php echo $row[3]; ?> </td>
                        <td><?php echo $row[4]; ?> </td>
                        <td><?php echo $row[5]; ?> </td>
                        <td><?php echo $row[6]; ?> </td>
                        <td><img src="img/<?php echo $row[7]; ?>" width="50" height="50"/> </td>
                        <td><a href="edit.php?id=<?php echo $row[0] ?>">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row[0] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
                     
                    <tr>
						<td><input type="submit" value="ADD NEW" name="add" /></td>
						<td><input type="submit" value="ADD CATEGORY" name="add_category" /></td>
					</tr>
            </form>

        </table>
    </body>
</html>
<?php
if (isset($_POST['delete'])) {
    for ($i = 0; $i < $count; $i++) {
        $checkbox = $_REQUEST['checkbox'];
        $id = $checkbox[$i];
        $delete=$d->delete("registration", "reg_id='$id'");
        if ($delete) {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=display.php\">";
        }
    }
}
if(isset($_POST['add']))
   echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
if(isset($_POST['add_category']))
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=addcategory.php\">";
?>