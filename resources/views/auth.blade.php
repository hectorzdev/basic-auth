<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Basic Auth</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav login-nav nav-tabs">
                            <li class="active nav-login-btn bt-1"><a data-toggle="tab" href="#login">Login</a></li>
                            <li class="nav-login-btn bt-2"><a data-toggle="tab" href="#register">Register</a></li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <form id="login" class="tab-pane show active fade in ">
                            @csrf
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success w-100">Login</button>
                        </form>
                        <form id="register" class="tab-pane fade in ">
                            @csrf
                            <div class="form-group">
                                <label for="">Firstname <span class="text-danger">*</span></label>
                                <input type="text" name="firstname" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Lastname <span class="text-danger">*</span></label>
                                <input type="text" name="lastname" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Date of Birth <span class="text-danger">*</span></label>
                                <input type="date" name="birth_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Profile Image <span class="text-danger">*</span></label>
                                <input type="file" name="cover_image" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <img src="https://placehold.co/300x300" width="150" id="display-image" alt="">
                            </div>
                            <div class="form-inline form-group " style="gap: 20px">
                                <label for="">Gender <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="0" checked>
                                    <label class="form-check-label" for="male">
                                      Male
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                                    <label class="form-check-label" for="female">
                                      Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-inline form-group " style="gap: 20px">
                                <label for="">Social </label>
                                <div class="form-inline" style="gap: 20px">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="social[]" id="facebook" value="facebook">
                                        <label class="form-check-label" for="facebook">
                                          Facebook
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="social[]" id="twitter" value="twitter">
                                        <label class="form-check-label" for="twitter">
                                          Twitter
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="social[]" id="instagram" value="instagram">
                                        <label class="form-check-label" for="instagram">
                                            Instagram
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="social[]" id="line" value="line">
                                        <label class="form-check-label" for="line">
                                          Line
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="social[]" id="tiktok" value="tiktok">
                                        <label class="form-check-label" for="tiktok">
                                          Tiktok
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password<span class="text-danger">*</span></label>
                                <input type="password" name="password" id="reg_password" class="form-control" required>
                            </div>
                            <ul id="password_validate" class="pl-2">
                                <li id="va-1">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>Minimun 8 characters</span>
                                </li>
                                <li id="va-2">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>one uppercase</span>
                                </li>
                                <li id="va-3">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>one lowercase</span>
                                </li>
                                <li id="va-4">
                                    <i class="fas fa-times text-danger"></i>
                                    <span>one special character</span>
                                </li>
                            </ul>
                            <div class="form-group">
                                <label for="">Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" name="confirm_password" id="" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $(".nav-login-btn").on('click' , function(){
            $(".nav-login-btn").removeClass('active')
            $(this).addClass('active')
        })

        $(document).ready(function() {
            $('input[name="cover_image"]').on('change', function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#display-image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#display-image').attr('src', 'https://placehold.co/300x300');
                }
            });
        });


        $('#reg_password').on('input', function() {
            var password = $(this).val();

            if (password.length >= 8) {
                $('#va-1 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            } else {
                $('#va-1 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
            }

            if (/[A-Z]/.test(password)) {
                $('#va-2 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            } else {
                $('#va-2 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
            }

            if (/[a-z]/.test(password)) {
                $('#va-3 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            } else {
                $('#va-3 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
            }

            if (/[\W_]/.test(password)) {
                $('#va-4 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            } else {
                $('#va-4 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
            }
        });

        $('#register').on('submit' , function(e){
            e.preventDefault()

            const password = $('#reg_password').val();
            let password_valid = true;

            if (password.length < 8) {
                $('#va-1 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
                password_valid = false;
            } else {
                $('#va-1 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            }

            if (!/[A-Z]/.test(password)) {
                $('#va-2 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
                password_valid = false;
            } else {
                $('#va-2 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            }

            if (!/[a-z]/.test(password)) {
                $('#va-3 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
                password_valid = false;
            } else {
                $('#va-3 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            }

            if (!/[\W_]/.test(password)) {
                $('#va-4 i').removeClass('fa-check-circle text-success').addClass('fa-times text-danger');
                password_valid = false;
            } else {
                $('#va-4 i').removeClass('fa-times text-danger').addClass('fa-check-circle text-success');
            }
            
            if(!password_valid){
                alert("Password does not meet the requirements.");
                return;
            }

            const formData = new FormData(this)
            $.ajax({
                url:'/register',
                method:'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.success){
                        alert("Registration successful!");
                        $("#login").addClass('active show');
                        $("#register").removeClass('active show');
                        $(".bt-1").addClass('active')
                        $(".bt-2").removeClass('active')
                    }else{
                        alert(data.msg)
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            })
        })

        $("#login").on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: '/login',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert('เข้าสู่ระบบสำเร็จ');
                        window.location.href = '/profile';
                    } else {
                        alert(response.msg); 
                    }
                },
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });

    })
</script>
</body>
</html>