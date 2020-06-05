    <h4>Шаблон: view/account/register.php</h4>

    <h2><?php echo $title; ?></h2>

      <form method="POST" action="/account/register">
      <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="login">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
      <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="enter">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
