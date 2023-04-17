<div class="well pgui-login">
    <div class="page-header">
        <h3><?php echo $this->_tpl_vars['Captions']->GetMessageString('Registration form'); ?>
</h3>
    </div>
    <div class="js-form-container">
        <div class="js-form-collection">
            <form id="registrationForm" method="post">

                <div class="form-group">
                    <input placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('Username'); ?>
" type="text" name="username" class="form-control" id="username" data-field-name="username"
                           data-validation="required" data-required-error-message="Username is required">
                </div>

                <div class="form-group">
                    <input placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('Email'); ?>
" type="text" name="email" class="form-control" id="email" data-field-name="email"
                           data-validation="required email" data-required-error-message="Email is required" data-email-error-message="Please enter a valid email address">
                </div>

                <div class="form-group">
                    <input placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('Password'); ?>
" type="password" name="password" class="form-control" id="password"
                           data-editor="text" data-pgui-legacy-validate="true" data-legacy-field-name="password"
                           data-validation="required" data-required-error-message="Password is required">
                </div>

                <div class="form-group">
                    <input placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('ConfirmPassword'); ?>
" type="password" name="confirmed-password" class="form-control" id="confirmed-password" data-field-name="confirmed-password"
                           data-editor="text" data-pgui-legacy-validate="true" data-legacy-field-name="confirmedpassword"
                           data-validation="required" data-required-error-message="Confirmed password is required">
                </div>

                <?php if ($this->_tpl_vars['ReCaptcha'] && $this->_tpl_vars['ReCaptcha']->isCheckboxCaptcha()): ?>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="<?php echo $this->_tpl_vars['ReCaptcha']->getSiteKey(); ?>
"<?php if ($this->_tpl_vars['ReCaptcha']->getUseDarkColorTheme()): ?> data-theme="dark"<?php endif; ?>></div>
                    </div>
                <?php endif; ?>

                <div class="form-error-container">
                </div>

                <div class="form-group text-center">
                    <?php if ($this->_tpl_vars['ReCaptcha'] && $this->_tpl_vars['ReCaptcha']->isInvisibleCaptcha()): ?>
                        <button id="submit-recaptcha" class="btn btn-primary js-recaptcha g-recaptcha" data-sitekey="<?php echo $this->_tpl_vars['ReCaptcha']->getSiteKey(); ?>
" data-callback='onReCaptchaFormSubmit' data-expired-callback='onReCaptchaExpired'<?php if ($this->_tpl_vars['ReCaptcha']->getUseDarkColorTheme()): ?> data-theme="dark"<?php endif; ?>><?php echo $this->_tpl_vars['Captions']->GetMessageString('Register'); ?>
</button>
                        <button id="submit-form" class="btn btn-primary js-save" data-action="open" data-url="login.php" style="display: none"><?php echo $this->_tpl_vars['Captions']->GetMessageString('Register'); ?>
</button>
                    <?php else: ?>
                        <button class="btn btn-primary js-save" data-action="open" data-url="login.php"><?php echo $this->_tpl_vars['Captions']->GetMessageString('Register'); ?>
</button>
                    <?php endif; ?>
                </div>

            </form>
        </div>
    </div>

    <div class="pgui-login-footer">
        <p class="text-center">
        <?php echo $this->_tpl_vars['Captions']->GetMessageString('SignInHere'); ?>

        </p>
    </div>

</div>