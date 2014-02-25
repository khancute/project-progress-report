<?php echo $this->Session->flash(); ?>
<form class="form-horizontal" method="post">
    <div class="control-group">
        <label class="control-label" for="username">Username</label>
        <div class="controls">
            <input type="text" id="username" placeholder="Username" name='data[username]'>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="password" id="password" placeholder="Password" name='data[password]'>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
        </div>
    </div>
</form>
