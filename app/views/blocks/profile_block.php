<?php $female = "";
$male = "";
if ($gender === "female") {
  $female = "checked";
} else {
  $male = "checked";
} ?>
<div class="container">
  <h5>My Pofile</h5>
  <p class="text-secondary">manage and protect your account</p>
  <hr class=" text-secondary">

  <div class="row">
    <div class="col-7">
      <div class="row">
        <div class="col-4">
          <div class="text-secondary mb-2 mt-5">Username</div>
          <div class="text-secondary  mb-2">Phone Number</div>
          <div class="text-secondary  mb-2">Gender</div>
          <div class="text-secondary  mb-2">Password</div>
          <div class="text-secondary  mb-2 fs-3 "><button type="button" class="p-1 nav-link text-dark btn btn-warning"
              data-bs-toggle="modal" data-bs-target="#modalUpdateForm">
              Edit</button></div>

          <div class="modal fade" id="modalUpdateForm" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="profile_update.php" method="post">
                    <div class="mb-3">
                      <label class="form-label">Email Address Or Username</label>
                      <input disabled type="text" class="form-control" id="username" name="username"
                        placeholder="Username" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Phone Number</label>
                      <input required type="text" class="form-control" id="phone_number" name="phone_number"
                        maxlength="10" placeholder="Phone Number" />
                    </div>
                    <div class="mb-3 form-check">
                      <input <?php echo $female ?> type="radio" class="form-check-input" id="female" name="gender"
                        value="female" />
                      <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="mb-3 form-check ">
                      <input <?php echo $male ?> type="radio" class="form-check-input" id="male" name="gender"
                        value="male" />
                      <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="modal-footer d-block">
                      <button type="submit" class="btn btn-warning float-end">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


        </div>
        <div class="col-8">

          <div class="mb-2 text-start mt-5" value="<?php echo $username ?>" name="username">
            <?php echo $username ?>
          </div>
          <div class=" mb-2 text-start" value="<?php echo $phoneNumber ?>" name="phone_number">
            <?php echo $phoneNumber ?>
          </div>
          <div class="form-check-inline me-3">
            <input disabled type="radio" class="form-check-input" id="female" name="gender" value="female" <?php echo $female ?> />
            <label class="form-check-label" for="female">Female</label>
          </div>
          <div class="mb-2 form-check-inline ">
            <input disabled type="radio" class="form-check-input" id="male" name="gender" value="male" <?php echo $male ?> />
            <label class="form-check-label" for="male">Male</label>
          </div><br>
          <div class="text-start">
            ****************
            <?php $modalName = "#modalOldPassword";
            if (isset($_SESSION['checkedPassword']) && $_SESSION['checkedPassword'] === "checked") {
              $modalName = "#modalChangePassword"; ?>
              <span class="text-success"><i class="bi bi-check2"></i></span>
            <?php unset($_SESSION['checkedPassword']);} else if (isset($_SESSION['checkedPassword']) && $_SESSION['checkedPassword'] === "fail") { ?>
                <span class="text-danger"><i class="bi bi-x-circle-fill"></i></span>
            <?php unset($_SESSION['checkedPassword']);} ?>
            <button type="button" class=" border border-none change-btn rounded" data-bs-toggle="modal"
              data-bs-target="<?php echo $modalName ?>">change</button>
            <!-- modal new password -->
            <div class="modal fade text-start" id="modalChangePassword" tabindex="-1"
              aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body mt-2 mb-2">
                    <form action="password_process.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label class="form-label">New Password</label> <input type="password" class="form-control"
                          id="new_password" name="new_password" placeholder="Password" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Verify Password</label> <input type="password" class="form-control"
                          id="verify_password" name="verify_password" placeholder="Password" />
                      </div>
                      <div class="modal-footer d-block">
                        <button type="submit" class="nav-link btn btn-warning p-1 float-end text-center"
                          id="change_password_btn">Change</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <!-- modal old password -->
            <div class="modal fade text-start" id="modalOldPassword" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body mt-2 mb-2">
                    <form action="password_process.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label class="form-label">Recent Password</label> <input type="password" class="form-control"
                          id="oldPassword" name="oldPassword" placeholder="Password" />
                      </div>
                      <div class="modal-footer d-block">
                        <button type="submit" class=" border border-none change-btn rounded float-end">Verify</button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-5 border-start">

      <div class="text-center">
        <img src="data:image/jpg;base64,<?php echo base64_encode($avatar) ?>" style="width:200px; "
          class="rounded-circle">
        <button type="button" class=" text-center nav-link btn btn-warning p-1" data-bs-toggle="modal"
          data-bs-target="#modalAvatar">
          Select Image</button>
        <!-- modal update profile -->
        <div class="modal fade text-start" id="modalAvatar" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body mt-2 mb-2">
                <form action="../../Project_BE1/profile_update.php" method="post" enctype="multipart/form-data">
                  Select image to upload:
                  <input type="file" name="avatar" id="avatar" accept="image/*">
                  <div class="modal-footer d-block">
                    <button type="submit" class="btn btn-warning float-end">Submit</button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<hr class="text-secondary mt-5">
<script type="text/javascript">

  <?php if (isset($_SESSION['alert'])) { ?>
    alert("<?php echo $_SESSION['alert'] ?>")
    <?php unset($_SESSION['alert']);
  } ?>

  const modalUpdatetForm = document.getElementById('modalUpdateForm')
  if (modalUpdatetForm) {
    modalUpdatetForm.addEventListener('show.bs.modal', event => {
      // Button that triggered the modal
      const button = event.relatedTarget
      const name = "<?php echo $username ?>"
      const phoneNumber = "<?php echo $phoneNumber ?>"

      const modalBodyName = modalUpdatetForm.querySelector('.modal-body #username')
      const modalBodyPhoneNumber = modalUpdatetForm.querySelector('.modal-body #phone_number')

      alert(modalBodyPhoneNumber)
      const password = modalUpdatetForm.querySelector('.modal-body #password')


      modalBodyName.value = name
      modalBodyPhoneNumber.value = phoneNumber

    });
  }

  const modalChangePassword = document.getElementById('modalChangePassword');
  const modalBodyNewPassword = document.getElementById('new_password')
  const modalBodyVerifyPassword = document.getElementById('verify_password')



  if (modalChangePassword) {
    modalChangePassword.addEventListener('show.bs.modal', function () {
      modalBodyVerifyPassword.addEventListener('input', function () {
        if ((modalBodyNewPassword.value === modalBodyVerifyPassword.value) && modalBodyVerifyPassword != "") {
          modalBodyNewPassword.classList.add("is-valid")
          modalBodyVerifyPassword.classList.add("is-valid")
          modalBodyVerifyPassword.classList.remove("is-invalid")
        } else if ((modalBodyNewPassword.value !== modalBodyVerifyPassword.value) && modalBodyVerifyPassword != "") {
          modalBodyVerifyPassword.classList.remove("is-valid")
          modalBodyVerifyPassword.classList.add("is-invalid")
        }
      });
    });



  }

</script>