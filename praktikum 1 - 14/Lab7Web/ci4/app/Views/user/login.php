<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="login-wrapper" style="max-width: 400px; margin: 50px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h1 style="text-align: center; margin-bottom: 20px; color: #1e3a8a;">Sign In</h1>
        <?php if(session()->getFlashdata('flash_msg')):?>
            <div class="alert alert-danger" style="background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif;?>
        <form action="" method="post">
            <div class="mb-3" style="margin-bottom: 15px;">
                <label for="InputForEmail" class="form-label" style="display: block; margin-bottom: 5px; font-weight: 600;">Email address</label>
                <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px;">
            </div>
            <div class="mb-3" style="margin-bottom: 20px;">
                <label for="InputForPassword" class="form-label" style="display: block; margin-bottom: 5px; font-weight: 600;">Password</label>
                <input type="password" name="password" class="form-control" id="InputForPassword" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px;">
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; background: #3b82f6; color: white; border: none; border-radius: 4px; cursor: pointer;">Login</button>
        </form>
    </div>
</body>
</html>
