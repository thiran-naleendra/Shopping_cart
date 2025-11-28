



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<br>
<img src="https://miro.medium.com/v2/resize:fit:828/1*Q9rG-O16IswIzCtCVYX4nA.gif" class="rounded mx-auto d-block"
    alt="...">
<br>
<div class="d-flex justify-content-center  ">

    <form method="POST" action="{{ route('login') }}" class="p-3 mb-2 bg-info text-white">
        <h1>Admin Login</h1>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter email">

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        
        <div class="d-flex justify-content-center  ">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </form>
</div>
