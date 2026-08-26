<?php include 'header.php' ?>

<div class="container-fluid">
    <div class="row">
        <?php if (isset($_SESSION['status'], $_SESSION['message'])): ?>

            <script>
                $(document).ready(function() {

                    <?php if ($_SESSION['status'] === 'success'): ?>

                        toastr.success(
                            <?= json_encode($_SESSION['message']) ?>
                        );

                    <?php else: ?>

                        toastr.error(
                            <?= json_encode($_SESSION['message']) ?>
                        );

                    <?php endif; ?>

                });
            </script>

        <?php
            unset($_SESSION['status']);
            unset($_SESSION['message']);
        endif;
        ?>
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h2 class="fs-4">Create New User</h2>
                </div>
                <div class="card-body">
                    <form action="actions/store_user" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Name </label>
                            <input type="text" name="user_name" class="form-control" value=""
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Email </label>
                            <input type="email" name="email" class="form-control" value=""
                                required>
                        </div>

                        <hr>

                        <h5>Password</h5>
                        <div class="mb-3">
                            <label class="form-label"> New Password</label>
                            <input type="password" name="password" id="new_password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Confirm New Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                        </div>
                        <div class="form-check mt-2 mb-3">
                            <input class="form-check-input" type="checkbox" id="showPasswords">
                            <label class="form-check-label" for="showPasswords">
                                Show passwords
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary"> Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('showPasswords').addEventListener('change', function() {

        const passwordFields = document.querySelectorAll(
            '#current_password, #new_password, #confirm_password'
        );

        passwordFields.forEach(function(field) {

            field.type = this.checked ? 'text' : 'password';

        }, this);

    });
</script>
<?php include 'footer.php'; ?>