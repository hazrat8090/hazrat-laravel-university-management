<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />



</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Registration page</span></div>
            <form action="">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" value="" placeholder="Enter The Name" required name="name">
                </div>
                <div class="row">
                    <i class="bi bi-envelope"></i>
                    <input type="email" value="" placeholder="Enter The Email" required name="email">
                </div>
                <div class="row">
                    <i class="fa fa-lock"></i>
                    <input type="password" value="" placeholder="Enter The Password" required name="password">
                </div>
                <div class="row">
                    <i class="fa fa-lock"></i>
                    <input type="password" value="" placeholder="Confirm The Password" required name="confirmation_password">
                </div>
                <div class="row">
                    <i class="bi bi-hash"></i>
                    <input type="text" value="" placeholder="Enter The University Id" required name="university_id">
                </div>
                <div class="row">
                    <!-- <label for="">User Role</label> -->
                    <select class="selectbox" name="roles[]" multiple>
                        <!-- <option value=""> Select Roles </option> -->
                        @foreach($roles as $role)
                        <option value="{{ $role }}">
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    @error('roles')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="pass"><a href="#">Forgot Password</a></div>
                <div class="row button">
                    <input type="submit" value="registration">
                </div>
                <div class="signup-link">sign In <a href="#">Login</a></div>
                <div class="signup-link">Welcome Page <a href="">Welcome Page</a></div>


            </form>
        </div>
    </div>


</body>

</html>