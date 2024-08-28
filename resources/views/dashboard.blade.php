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
            <div class="col-md-12 mt-5">
                <h3 class="text-center">Dashboard</h3>
                <form action="/dashboard" class="my-4" method="GET">
                    <div class="d-flex" style="gap: 10px">
                        <input type="text" name="search" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}" placeholder="Fullname , Email .." class="form-control">
                        <button type="submit" class="btn btn-sm btn-success">Search</button>
                    </div>
                </form>
                <table class="table table-striped w-100">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Social</th>
                        <th scope="col">Profile Image</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->firstname.' '.$user->lastname}}</th>
                            <td>{{ \Carbon\Carbon::parse($user->birth_date)->age }}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->gender == 0 ? 'Male' : 'Female'}}</td>
                            <td>
                                {{$user->social}}
                            </td>
                            <td>
                                <img src="{{url('storage/images/'.$user->cover_image)}}" width="50" alt="">
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
    })
</script>
</body>
</html>