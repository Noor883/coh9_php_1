<div class="  d-flex flex-column justify-content-center align-items-center gap-5">

    <h1> Welcome Login Page </h1> <!-- Form tag takes user to another page to process information -->
       

    <form class="w-50 mb-3 " method="POST" action="/authenticate">

        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='alert alert-danger mb-3' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>
    
    <div class="info-log">

        <div class="mb-3">
            <label for="admin-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin-username" name="username">
        </div>
        <div class="mb-3">
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="password">
        </div>
        <div class="RE  mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember-me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>

    
        <!-- Submit button-->  <!-- <input type="submit" value="submit"> -->
        <button type="submit" class="btn btn-primary"> Login</button>
    </div>
    </form>
    
    
</div>