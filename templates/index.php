<table>
    <tbody>
    <?php foreach($result as $data){?>
        <tr>
            <td>
                #<?= $data->getId(); ?>
            </td>
            <td>
                <?= $data->getAttribute(); ?>
            </td>
            <td>
                <a href="index.php?controller=ExampleController&action=updateAction&id=<?= $data->getId(); ?>" class="updateButton">Update</a>
                <a href="index.php?controller=ExampleController&action=deleteAction&id=<?= $data->getId(); ?>" class="deleteButton">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>

    <tfoot>
        <tr>
            <td>
                <a href="index.php?controller=ExampleController&action=createAction" class="createButton">New Entry</a>
            </td>
        </tr>
    </tfoot>
</table>
