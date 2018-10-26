<table>
    <tbody>
    <?php foreach($result as $data){?>
        <tr>
            <td>
                #<?= $data['id']; ?>
            </td>
            <td>
                <?= $data['attribute']; ?>
            </td>
            <td>
                <a href="index.php?controller=ExampleController&action=updateAction&id=<?= $data['id']; ?>" class="updateButton">Update</a>
                <a href="index.php?controller=ExampleController&action=deleteAction&id=<?= $data['id']; ?>" class="deleteButton">Delete</a>
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
