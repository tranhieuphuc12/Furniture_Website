<!-- <form action="../../../profile.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form> -->
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
    <div class="col-8">
      <div class="row">
        <div class="col-4">
          <div class="text-secondary mb-2">Username</div>
          <div class="text-secondary  mb-2">Phone Number</div>
          <div class="text-secondary  mb-2">Gender</div>
          <div class="text-secondary  mb-2">Password</div>
          <div class="text-secondary  mb-2 fs-3 "><button type="button" class="nav-link text-dark btn btn-warning"
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
                    <!-- <div class="mb-3">
                      <label class="form-label">New Password</label> <input type="password" class="form-control"
                        id="password" name="password" placeholder="Password" />
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Verify Password</label> <input type="password" class="form-control"
                        id="verify_password" name="verify_password" placeholder="Password" />
                    </div> -->
                    <div class="mb-3">
                      <label class="form-label">Phone Number</label>
                      <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="10"
                        placeholder="Phone Number" />
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

          <div class="mb-2 text-start block">
            <?php echo $username ?>
          </div>
          <div class=" mb-2 text-start">
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
          </div>
        </div>
      </div>

    </div>
    <div class="col-4">
      <div class="vr"></div>
      ab
    </div>
  </div>
</div>
<script type="text/javascript">

  const modalUpdatetForm = document.getElementById('modalUpdateForm')
  if (modalUpdatetForm) {
    modalUpdatetForm.addEventListener('show.bs.modal', event => {
      // Button that triggered the modal
      const button = event.relatedTarget
      const name = "<?php echo $username ?>"
      const phoneNumber = "<?php echo $phoneNumber ?>"

      const modalBodyName = modalUpdatetForm.querySelector('.modal-body #username')
      const modalBodyPhoneNumber = modalUpdatetForm.querySelector('.modal-body #phone_number')

      const password = modalUpdatetForm.querySelector('.modal-body #password')
      const verify_password = modalUpdatetForm.querySelector('.modal-body #verify_password')


      modalBodyName.value = name
      modalBodyPhoneNumber.value = phoneNumber

      <?php if (isset($_SESSION['alert'])) { ?>
        alert("<?php echo $_SESSION['alert'] ?>")
        <?php unset($_SESSION['alert']);
      } ?>

    });
  }

</script>