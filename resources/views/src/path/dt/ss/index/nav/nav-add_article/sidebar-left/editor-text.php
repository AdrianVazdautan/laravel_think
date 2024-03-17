<?php
	require "src/editor-text/language_editor-text.php";
?>
<!--START-->
	<div class="mt20 mb10 f14 fw">
		<?= $languagesLET[$selectedLanguage]['editor_text'];?>
	</div>
	<div class="content">
	    <form name="frm">
	        <textarea id="editor"></textarea>
	    </form>
	</div>
	<script>SUNEDITOR.create('editor');</script>
	<div class="error_textjs w100 cr f14 mt10 none"></div>
<!--END-->