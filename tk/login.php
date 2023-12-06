
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../tk/css/login1.css">
  </head>

<div class="section">
    <div class="container">
        <div class="row full-height justify-content-center">
            <div class=" text-center align-self-center py-5">
                <div class="section pb-5 pt-5 pt-sm-2 text-center">
                    <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
                      <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
                      <label for="reg-log"></label>
                    <div class="card-3d-wrap mx-auto">
                        <div class="card-3d-wrapper">
                            <div class="card-front">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="">Log In</h4>

                                        <div class="form-group">
                                          <form action="proses_login.php" method="post">
                                            <input type="text" name="usernamee"  class="form-style" placeholder="Your Email">
                                            <br><br>
                                            <input type="password" name="passwordd"  class="form-style" placeholder="Your Password">
                                        </div>
                                        <input type="submit" name="login" class="btn mt-4" value="LOGIN">
                                        </form>
                                      </div>

                                  </div>
                              </div>
                            <div class="card-back">
                                <div class="center-wrap">
                                    <div class="section text-center">
                                        <h4 class="mb-4 pb-3">Sign Up</h4>
                                        <div class="form-group">
                                          <form action="proses_tambah_member.php" method="post">
                                            <div class="form-group mt-2">
                                            <input type="text" name="nama_pembeli"  class="form-style" placeholder="Your Full Name">
                                            <i class="input-icon uil uil-user"></i>
                                            <span id="error-nama_pembeli">
                                            <?php
                                            echo !empty($errors['nama_pembeli']) ? $errors['nama_pembeli'] : '' 
                                            ?>
                                            </div>
                                            <div class="form-group mt-2">
                                            <input type="date" name="tanggal_lahir" class="form-style" placeholder= "Your Full Name">
                                            <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                            <select id="gender" name="gender" class="form-style" placehoder="Gender">
                                                <option lang="id" value="L">Laki-laki</option>
                                                <option lang="id" value="P">Perempuan</option>
                                            </select>
                                            <i class="input-icon uil uil-user"></i>
                                            </div>
                                            <div class="form-group mt-2">
                                          <textarea id="alamat" name="alamat" class="form-style" rows="2" placeholder="alamat"></textarea>
                                          <i class="input-icon uil uil-user"></i>
                                          </div>
                                          <div class="form-group mt-2">
                                          <input type="text" name="usernamee"  class="form-style"s placeholder="Your Email">
                                          <i class="input-icon uil uil-user"></i>
                                          </div>
                                          <div class="form-group mt-2">
                                            <i class="input-icon uil uil-user"></i>
                                            </div>
                                          <input type="password" name="passwordd"  class="form-style" placeholder="Your Password">
                                          <i class="input-icon uil uil-user"></i>
                                          <input type="submit" name="login" class="btn mt-4" value="Submit">
                                          <i class="input-icon uil uil-user"></i>
                                          </form>
                                          </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
    </div>
</div>
</div>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
