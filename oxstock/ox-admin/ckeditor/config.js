/**
 * @license Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
 	 config.filebrowserBrowseUrl = 'ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = 'ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = 'ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = 'ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = 'ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = 'ckeditor/kcfinder/upload.php?type=flash';
	 config.enterMode = CKEDITOR.ENTER_BR;
	 config.shiftEnterMode = CKEDITOR.ENTER_BR;		
   config.scayt_autoStartup = true;
	 
	 config.toolbar_MyToolbar =
	 [
		{ name: 'sourcehtml', items : [ 'Source' ] },
		{ name: 'document', items : [ 'NewPage','Preview' ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
		'/',
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'tools', items : [ 'Maximize', 'Scayt' ] }
	 ];
	 config.toolbar_Basic =
	 [
		{ name: 'sourcehtml', items : [ 'Source' ] },
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
		{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'tools', items : [ 'Maximize', 'Scayt' ] }
	 ];
};
