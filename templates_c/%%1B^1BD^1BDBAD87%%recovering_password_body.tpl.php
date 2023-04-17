<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escapeurl', 'mail/recovering_password_body.tpl', 13, false),)), $this); ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
    <tbody>
    <tr>
        <td>
            Hello <?php echo $this->_tpl_vars['UserName']; ?>
,
        </td>
    </tr>
    <tr>
        <td height="14" style="line-height:14px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            We received a request to reset your password for <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['SiteURL'])) ? $this->_run_mod_handler('escapeurl', true, $_tmp) : smarty_modifier_escapeurl($_tmp)); ?>
" target="_blank" rel="noopener"><?php echo ((is_array($_tmp=$this->_tpl_vars['SiteURL'])) ? $this->_run_mod_handler('escapeurl', true, $_tmp) : smarty_modifier_escapeurl($_tmp)); ?>
</a>.
        </td>
    </tr>
    <tr>
        <td height="14" style="line-height:14px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            If you made this request, please click the button below to continue:
        </td>
    </tr>
    <tr>
        <td height="14" style="line-height:14px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['ResetPasswordLink'])) ? $this->_run_mod_handler('escapeurl', true, $_tmp) : smarty_modifier_escapeurl($_tmp)); ?>
" target="_blank" rel="noopener" style="border-radius: 4px;font-size: 15px;color: white;text-decoration: none;padding: 7px 7px 7px 7px;width: 180px;max-width: 180px;margin: 0;display: block;background-color: #178acc;text-align: center;">
                Reset&nbsp;Your&nbsp;Password
            </a>
        </td>
    </tr>
    <tr>
        <td height="14" style="line-height:14px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            If you did not request to change your password, please ignore this message.
        </td>
    </tr>
    </tbody>
</table>