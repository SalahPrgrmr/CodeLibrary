<?php

include_once dirname(__FILE__) . '/components/startup.php';
include_once dirname(__FILE__) . '/authorization.php';
include_once dirname(__FILE__) . '/components/application.php';
include_once dirname(__FILE__) . '/components/page/registration_page.php';

$page = new RegistrationPage(CreateTableBasedUserManager(), GetMailer(), GetReCaptcha('registration'));
$page->OnBeforeUserRegistration->AddListener('BeforeUserRegistration');
$page->OnAfterUserRegistration->AddListener('AfterUserRegistration');
$page->BeginRender();
$page->EndRender();
