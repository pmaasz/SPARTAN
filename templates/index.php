<div class="card">
    <div class="card-body">
        <?php foreach($result as $data){?>
            <div class="row">
                <div class="col-sm-9">
                    <?= $data->getAttribute(); ?>
                </div>

                <div class="col-sm-3">
                    <a href="index.php?controller=UserController&action=updateAction">Update</a>
                    <a href="index.php?controller=UserController&action=deleteAction">Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="card-footer">
        <a href="index.php?controller=UserController&action=createAction">New Entry</a>
    </div>
</div>