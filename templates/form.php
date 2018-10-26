<form name="userFrom" action="index.php?controller=ExampleController&action=createAction" method="POST">
    <label for="attribute" class="form-control-label col-6">Attribute: </label>
    <input type="text" name="attribute" title="attribute" value="<?php if($data){$data->getAttribute();}?>">

    <button type="submit" name="action" value="speichern" class="saveButton">Save</button>
    <a href="index.php?controller=ExampleController&action=indexAction" class="cancelButton">Cancel</a>
</form>