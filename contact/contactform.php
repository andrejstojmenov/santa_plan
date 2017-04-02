<?PHP

//error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING);

/*
    Contact Form from HTML Form Guide
    This program is free software published under the
    terms of the GNU Lesser General Public License.
    See this page for more info:
    http://www.html-form-guide.com/contact-form/contact-form-attachment.html
*/
require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('santaplan@yahoo.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('jlDZMq1hw9bQaKh');

$formproc->AddFileUploadField('photo','jpg,jpeg,gif,png,bmp',2024);
$formproc->AddFileUploadField('resume','doc,docx,pdf,txt',2024);

if(isset($_POST['submitted']))
{
	
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact us</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
</head>
<body>

<!-- Form Code Start -->
<form id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' enctype="multipart/form-data" accept-charset='UTF-8'>

<fieldset style="overflow: auto; margin: 0 auto">
<legend>Контактирајте не</legend>

<div style="float:left">
	<input type='hidden' name='submitted' id='submitted' value='1'/>
	<input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
	<input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

	<div class='short_explanation'>* задолжителни полиња</div>

	<div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
	<div class='container'>
		<label for='name' >Вашето име*: </label><br/>
		<input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
		<span id='contactus_name_errorloc' class='error'></span>
	</div>
	<div class='container'>
		<label for='email' >Вашиот e-mail*:</label><br/>
		<input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
		<span id='contactus_email_errorloc' class='error'></span>
	</div>
	<div class='container'>
		<label for='photo' >Прикачи слика:</label><br/>
		<input type="file" name='photo' id='photo' /><br/>
		<span id='contactus_photo_errorloc' class='error'></span>
	</div>
	<div class='container'>
		<label for='photo' >Прикачи документ:</label><br/>
		<input type="file" name='resume' id='resume' /><br/>
		<span id='contactus_resume_errorloc' class='error'></span>
	</div>

</div>

<div style="float:right;">
	<div class='container' style="display:inline">
		<label for='message' >Порака:</label><br/>
		<span id='contactus_message_errorloc' class='error'></span>
		<textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
	</div>
	
	<div class='container'>
		<div><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
		<label for='scaptcha' >Внесете го кодот:</label>
		<input type='text' name='scaptcha' id='scaptcha' maxlength="10" /><br/>
		<span id='contactus_scaptcha_errorloc' class='error'></span>
		<div class='short_explanation'>Неможете да го прочитате кодот?
		<a href='javascript: refresh_captcha_img();'>Кликнете овде</a>.</div>
	</div>
</div>

<div  style="clear:both; text-align: center; padding-top: 40px">
	<input type='submit' name='submitBtn' value='Прати' />
</div>

</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("name","req","Ве молиме внесете име");

    frmvalidator.addValidation("email","req","Ве молиме внесете емаил адреса");

    frmvalidator.addValidation("email","email","Ве молиме внесете точна емаил адреса");

    frmvalidator.addValidation("message","maxlen=2048","Пораката е преголема!(поголема од 2KB!)");

    frmvalidator.addValidation("photo","file_extn=jpg;jpeg;gif;png;bmp","Прикачете само слика. Подржувани формати: jpg,gif,png,bmp");

    frmvalidator.addValidation("scaptcha","req","Ве молиме внесете го кодот");

    document.forms['contactus'].scaptcha.validator
      = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
                    document.images['scaptcha_img']);

    function SCaptcha_Validate()
    {
        return document.forms['contactus'].scaptcha.validator.validate();
    }

    frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

    function refresh_captcha_img()
    {
        var img = document.images['scaptcha_img'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
    }

// ]]>
</script>


</body>
</html>