<?php

include_once dirname(__FILE__) . '/components/startup.php';
include_once dirname(__FILE__) . '/authorization.php';
include_once dirname(__FILE__) . '/components/application.php';
include_once dirname(__FILE__) . '/components/page/resend_verification_page.php';

$page = new ResendVerificationPage(CreateTableBasedUserManager(), GetMailer(), GetReCaptcha('resend_verification_email'));
$page->BeginRender();
$page->EndRender();
