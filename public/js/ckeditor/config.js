/**
 * @license Copyright (c) 2003-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.extraPlugins = 'cloudservices';
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'tools', groups: [ 'tools' ] },		
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'others', groups: [ 'others' ] }
	];

	config.removeButtons = 'Save,NewPage,Templates,Find,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Language,Flash,Smiley,Iframe,ShowBlocks,About';
	// config.height = 500;   

	config.contentsCss = site_url+'/css/customckeditor.css';
	//the next line add the new font to the combobox in CKEditor
	config.font_names = 'Preeti;'+'kalimati;' + config.font_names;
	config.removePlugins = '';
	config.extraPlugins = 'hcard,lineheight,htable,autogrow';
	config.autoGrow_minHeight = 400;
	config.fontSize_defaultLabel = '20px';
	config.line_height="1;;1.1;1.2;1.3;1.4;1.5;2;2.3;2.5;3;3.5;4" ;
	// config.font_defaultLabel = 'Kalimati';
	config.stylesSet = 'case_styles';
	config.extraAllowedContent = '*{*}';
	// config.allowedContent = true;
};
