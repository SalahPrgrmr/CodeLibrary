<?php ob_start(); ?>
<div class="well pgui-login">
    <div class="page-header">
        <h3><?php echo $this->_tpl_vars['Captions']->GetMessageString('PasswordRecovery'); ?>
</h3>
    </div>
    <div class="js-form-container">
        <div class="js-form-collection">
            <form id="recoveringPasswordForm" method="post">
                <div class="alert alert-info">
                    <?php echo $this->_tpl_vars['Captions']->GetMessageString('RecoveringPasswordInfo'); ?>

                </div>

                <div class="form-group">
                    <input required="true" placeholder="<?php echo $this->_tpl_vars['Captions']->GetMessageString('UsernameOrEmail'); ?>
" type="text" name="account-name" class="form-control" id="account-name"
                           data-validation="required" data-required-error-message="Username is required">
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
" data-callback='onReCaptchaFormSubmit' data-expired-callback='onReCaptchaExpired' <?php if ($this->_tpl_vars['ReCaptcha']->getUseDarkColorTheme()): ?> data-theme="dark"<?php endif; ?>><?php echo $this->_tpl_vars['Captions']->GetMessageString('SendPasswordResetLink'); ?>
</button>
                        <button id="submit-form" class="btn btn-primary js-save" data-action="open" data-url="login.php" style="display: none"><?php echo $this->_tpl_vars['Captions']->GetMessageString('SendPasswordResetLink'); ?>
</button>
                    <?php else: ?>
                        <button class="btn btn-primary js-save" data-action="open" data-url="login.php"><?php echo $this->_tpl_vars['Captions']->GetMessageString('SendPasswordResetLink'); ?>
</button>
                    <?php endif; ?>
                    &nbsp;
                    <a href="login.php" class="btn btn-default"><?php echo $this->_tpl_vars['Captions']->GetMessageString('Cancel'); ?>
</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ContentBlock', ob_get_contents());ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['layoutTemplate'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>