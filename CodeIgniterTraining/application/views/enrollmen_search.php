<section class="content">
    <!-- Check if there's an error message -->
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <!-- Display the search form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Carian Pelajar</h3>
        </div>
        <form role="form" action="<?= base_url() ?>CodeIgniterTraining/index.php/enrollmen/search_student" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="box-body">
                    <div class="col-md-6" style="margin-bottom:10px">
                        <div class="form-group">
                            <label for="student_id">ID Pelajar</label>
                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Sila Masukkan ID Pelajar" value="<?= isset($_POST['student_id']) ? $_POST['student_id'] : '' ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    