<form name="userFrom" method="POST">
    <label for="attribute" class="form-control-label col-6">Attribute: </label>
    <input type="text" name="attribute" value="<?= $data->getAttribute();?>" required />

    <button type="submit" name="action" value="save" class="saveButton">save</button>
    <a href="index.php?controller=ExampleController&action=indexAction" class="cancelButton">Cancel</a>
</form>