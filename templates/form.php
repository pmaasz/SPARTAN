<div class="container">
    <div class="card shadow">
        <form name="userFrom" action="index.php?controller=UserController&action=createAction" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="attribute" class="form-control-label col-6">Attribute</label>
                    <div class="col-6">
                        <input type="text" name="attribute" value="">
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" name="action" value="speichern">Save</button>
                <a href="index.php?controller=UserController&action=indexAction">Cancel</a>
            </div>
        </form>
    </div>
</div>
