<div class="card">
    <div class="card-body">
        <?php foreach($result as $data){?>
            <div class="row">
                <div class="col-sm-9">
                    <?= $data['attribute']; ?>
                </div>

                <div class="col-sm-3">
                    <a href="index.php?controller=ExampleController&action=updateAction&id=<?= $data['id']; ?>" class="updateButton">Update</a>
                    <a href="index.php?controller=ExampleController&action=deleteAction&id=<?= $data['id']; ?>" class="deleteButton">Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="card-footer">
        <a href="index.php?controller=ExampleController&action=createAction" class="createButton">New Entry</a>
    </div>
</div>