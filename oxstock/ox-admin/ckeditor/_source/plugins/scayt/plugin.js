/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @fileOverview Spell Check As You Type (SCAYT).
 * Button name : Scayt.
 */

(function()
{
	var commandName 	= 'scaytcheck',
		openPage		= '';

	// Checks if a value exists in an array
	function in_array(needle, haystack)
	{
		var found = false, key;
		for (key in haystack)
		{
			if ((haystack[key] === needle) || ( haystack[key] == needle))
			{
				found = true;
				break;
			}
		}
		return found;
	}

	var onEngineLoad = function()
	{
		var editor = this;

		var createInstance = function()	// Create new instance every time Document is created.
		{
			// Initialise Scayt instance.
			var oParams = {};
			// Get the iframe.
			oParams.srcNodeRef = editor.document.getWindow().$.frameElement;
			// syntax : AppName.AppVersion@AppRevision
			oParams.assocApp  = 'CKEDITOR.' + CKEDITOR.version + '@' + CKEDITOR.revision;
			oParams.customerid = editor.config.scayt_customerid  || '1:WvF0D4-UtPqN1-43nkD4-NKvUm2-daQqk3-LmNiI-z7Ysb4-mwry24-T8YrS3-Q2tpq2';
			oParams.customDictionaryIds = editor.config.scayt_customDictionaryIds || '';
			oParams.userDictionaryName = editor.config.scayt_userDictionaryName || '';
			oParams.sLang = editor.config.scayt_sLang || 'en_US';

			// Introduce SCAYT onLoad callback. (#5632)
			oParams.onLoad = function()
				{
					// Draw down word marker to avoid being covered by background-color style.(#5466)
					if ( !( CKEDITOR.env.ie && CKEDITOR.env.version < 8 ) )
						this.addStyle( this.selectorCss(), 'padding-bottom: 2px !important;' );

					// Call scayt_control.focus when SCAYT loaded
					// and only if editor has focus and scayt control creates at first time (#5720)
					if ( editor.focusManager.hasFocus && !plugin.isControlRestored( editor ) )
						this.focus();

				};

			oParams.onBeforeChange = function()
			{
				if ( plugin.getScayt( editor ) && !editor.checkDirty() )
					setTimeout( function(){ editor.resetDirty(); }, 0 );
			};

			var scayt_custom_params = window.scayt_custom_params;
			if ( typeof scayt_custom_params == 'object')
			{
				for ( var k in scayt_custom_params )
				{
					oParams[ k ] = scayt_custom_params[ k ];
				}
			}
			// needs for restoring a specific scayt control settings
			if ( plugin.getControlId(editor) )
				oParams.id = plugin.getControlId(editor);

			var scayt_control = new window.scayt( oParams );

			scayt_control.afterMarkupRemove.push( function( node )
			{
				( new CKEDITOR.dom.element( node, scayt_control.document ) ).mergeSiblings();
			} );

			// Copy config.
			var	lastInstance = plugin.instances[ editor.name ];
			if ( lastInstance )
			{
				scayt_control.sLang = lastInstance.sLang;
				scayt_control.option( lastInstance.option() );
				scayt_control.paused = lastInstance.paused;
			}

			plugin.instances[ editor.name ] = scayt_control;

			//window.scayt.uiTags
			var menuGroup = 'scaytButton';
			var uiTabs = window.scayt.uiTags;
			var fTabs  = [];

			for (var i = 0,l=4; i<l; i++)
			    fTabs.push( uiTabs[i] && plugin.uiTabs[i] );

			plugin.uiTabs = fTabs;
			try {
				scayt_control.setDisabled( plugin.isPaused( editor ) === false );
			} catch (e) {}

			editor.fire( 'showScaytState' );
		};

		editor.on( 'contentDom', createInstance );
		editor.on( 'contentDomUnload', function()
			{
				// Remove scripts.
				var scripts = CKEDITOR.document.getElementsByTag( 'script' ),
					scaytIdRegex =  /^dojoIoScript(\d+)$/i,
					scaytSrcRegex =  /^https?:\/\/svc\.spellchecker\.net\/spellcheck\/script\/ssrv\.cgi/i;

				for ( var i=0; i < scripts.count(); i++ )
				{
					var script = scripts.getItem( i ),
						id = script.getId(),
						src = script.getAttribute( 'src' );

					if ( id && src && id.match( scaytIdRegex ) && src.match( scaytSrcRegex ))
						script.remove();
				}
			});

		editor.on( 'beforeCommandExec', function( ev )		// Disable SCAYT before Source command execution.
			{
				if ( (ev.data.name == 'source' ||  ev.data.name == 'newpage') && editor.mode == 'wysiwyg' )
				{
					var scayt_instance = plugin.getScayt( editor );
					if ( scayt_instance )
					{
						plugin.setPaused( editor, !scayt_instance.disabled );
						// store a control id for restore a specific scayt control settings
						plugin.setControlId( editor, scayt_instance.id );
						scayt_instance.destroy( true );
						delete plugin.instances[ editor.name ];
					}
				}
				// Catch on source mode switch off (#5720)
				else if ( ev.data.name == 'source'  && editor.mode == 'source' )
					plugin.markControlRestore( editor );
			});

		editor.on( 'afterCommandExec', function( ev )
			{
				if ( !plugin.isScaytEnabled( editor ) )
					return;

				if ( editor.mode == 'wysiwyg' && ( ev.data.name == 'undo' || ev.data.name == 'redo' ) )
					window.setTimeout( function() { plugin.getScayt( editor ).refresh(); }, 10 );
			});

		editor.on( 'destroy', function( ev )
			{
				var editor = ev.editor,
					scayt_instance = plugin.getScayt( editor );

				// SCAYT instance might already get destroyed by mode switch (#5744).
				if ( !scayt_instance )
					return;

				delete plugin.instances[ editor.name ];
				// store a control id for restore a specific scayt control settings
				plugin.setControlId( editor, scayt_instance.id );
				scayt_instance.destroy( true );
			});

		// Listen to data manipulation to reflect scayt markup.
		editor.on( 'afterSetData', function()
			{
				if ( plugin.isScaytEnabled( editor ) ) {
					window.setTimeout( function()
						{
							var instance = plugin.getScayt( editor );
							instance && instance.refresh();
						}, 10 );
				}
			});

		// Reload spell-checking for current word after insertion completed.
		editor.on( 'insertElement', function()
			{
				var scayt_instance = plugin.getScayt( editor );
				if ( plugin.isScaytEnabled( editor ) )
				{
					// Unlock the selection before reload, SCAYT will take
					// care selection update.
					if ( CKEDITOR.env.ie )
						editor.getSelection().unlock( true );

					// Return focus to the editor and refresh SCAYT markup (#5573).
					window.setTimeout( function()
					{
						scayt_instance.focus();
						scayt_instance.refresh();
					}, 10 );
				}
			}, this, null, 50 );

		editor.on( 'insertHtml', function()
			{
				var scayt_instance = plugin.getScayt( editor );
				if ( plugin.isScaytEnabled( editor ) )
				{
					// Unlock the selection before reload, SCAYT will take
					// care selection update.
					if ( CKEDITOR.env.ie )
						editor.getSelection().unlock( true );

					// Return focus to the editor (#5573)
					// Refresh SCAYT markup
					window.setTimeout( function()
					{
						scayt_instance.focus();
						scayt_instance.refresh();
					}, 10 );
				}
			}, this, null, 50 );

		editor.on( 'scaytDialog', function( ev )	// Communication with dialog.
			{
				ev.data.djConfig = window.djConfig;
				ev.data.scayt_control = plugin.getScayt( editor );
				ev.data.tab = openPage;
				ev.data.scayt = window.scayt;
			});

		var dataProcessor = editor.dataProcessor,
			htmlFilter = dataProcessor && dataProcessor.htmlFilter;

		if ( htmlFilter )
		{
			htmlFilter.addRules(
				{
					elements :
					{
						span : function( element )
						{
							if ( element.attributes.scayt_word && element.attributes.scaytid )
							{
								delete element.name;	// Write children, but don't write this node.
								return element;
							}
						}
					}
				}
			);
		}

		// Override Image.equals method avoid CK snapshot module to add SCAYT markup to snapshots. (#5546)
		var undoImagePrototype = CKEDITOR.plugins.undo.Image.prototype;
		undoImagePrototype.equals =	 CKEDITOR.tools.override( undoImagePrototype.equals, function( org )
		{
			return function( otherImage )
			{
				var thisContents = this.contents,
					otherContents = otherImage.contents;
				var scayt_instance = plugin.getScayt( this.editor );
				// Making the comparison based on content without SCAYT word markers.
				if ( scayt_instance && plugin.isScaytReady( this.editor ) )
				{
					// scayt::reset might return value undefined. (#5742)
					this.contents = scayt_instance.reset( thisContents ) || '';
					otherImage.contents = scayt_instance.reset( otherContents ) || '';
				}

				var retval = org.apply( this, arguments );

				this.contents = thisContents;
				otherImage.contents = otherContents;
				return retval;
			};
		});

		if ( editor.document )
			createInstance();
	};

CKEDITOR.plugins.scayt =
	{
		engineLoaded : false,
		instances : {},
		// Data storage for SCAYT control, based on editor instances
		controlInfo : {},
		setControlInfo : function( editor, o )
		{
			if ( editor && editor.name && typeof ( this.controlInfo[ editor.name ] ) != 'object' )
				this.controlInfo[ editor.name ] = {};

			for ( var infoOpt in o )
				this.controlInfo[ editor.name ][ infoOpt ] = o[ infoOpt ];
		},
		isControlRestored : function ( editor )
		{
			if ( editor &&
					editor.name &&
					this.controlInfo[ editor.name ] )
			{
				return this.controlInfo[ editor.name ].restored ;
			}
			return false;
		},
		markControlRestore : function ( editor )
		{
			this.setControlInfo( editor,{ restored:true } );
		},
		setControlId: function (editor, id)
		{
			this.setControlInfo( editor,{ id:id } );
		},
		getControlId: function (editor)
		{
			if ( editor &&
					editor.name &&
					this.controlInfo[ editor.name ] &&
					this.controlInfo[ editor.name ].id )
			{
				return this.controlInfo[ editor.name ].id;
			}
			return null;
		},
		setPaused: function ( editor , bool )
		{
			this.setControlInfo( editor,{ paused:bool } );
		},
		isPaused: function (editor)
		{
			if ( editor &&
					editor.name &&
					this.controlInfo[editor.name] )
			{
				return this.controlInfo[editor.name].paused ;
			}
			return undefined;
		},
		getScayt : function( editor )
		{
			return this.instances[ editor.name ];
		},
		isScaytReady : function( editor )
		{
			return this.engineLoaded === true &&
				'undefined' !== typeof window.scayt && this.getScayt( editor );
		},
		isScaytEnabled : function( editor )
		{
			var scayt_instance = this.getScayt( editor );
			return ( scayt_instance ) ? scayt_instance.disabled === false : false;
		},
		loadEngine : function( editor )
		{
			// SCAYT doesn't work with Firefox2, Opera.
			if ( CKEDITOR.env.gecko && CKEDITOR.env.version < 10900 || CKEDITOR.env.opera )
				return editor.fire( 'showScaytState' );

			if ( this.engineLoaded === true )
				return onEngineLoad.apply( editor );	// Add new instance.
			else if ( this.engineLoaded == -1 )			// We are waiting.
				return CKEDITOR.on( 'scaytReady', function(){ onEngineLoad.apply( editor ); } );	// Use function(){} to avoid rejection as duplicate.

			CKEDITOR.on( 'scaytReady', onEngineLoad, editor );
			CKEDITOR.on( 'scaytReady', function()
				{
					this.engineLoaded = true;
				},
				this,
				null,
				0
			);	// First to run.

			this.engineLoaded = -1;	// Loading in progress.

			// compose scayt url
			var protocol = document.location.protocol;
			// Default to 'http' for unknown.
			protocol = protocol.search( /https?:/) != -1? protocol : 'http:';
			var baseUrl  = 'svc.spellchecker.net/scayt25/loader__base.js';

			var scaytUrl  =  editor.config.scayt_srcUrl || ( protocol + '//' + baseUrl );
			var scaytConfigBaseUrl =  plugin.parseUrl( scaytUrl ).path +  '/';

			if( window.scayt == undefined )
			{
				CKEDITOR._djScaytConfig =
				{
					baseUrl: scaytConfigBaseUrl,
					addOnLoad:
					[
						function()
						{
							CKEDITOR.fireOnce( 'scaytReady' );
						}
					],
					isDebug: false
				};
				// Append javascript code.
				CKEDITOR.document.getHead().append(
					CKEDITOR.document.createElement( 'script',
						{
							attributes :
								{
									type : 'text/javascript',
									async : 'true',
									src : scaytUrl
								}
						})
				);
			}
			else
				CKEDITOR.fireOnce( 'scaytReady' );

			return null;
		},
		parseUrl : function ( data )
		{
			var match;
			if ( data.match && ( match = data.match(/(.*)[\/\\](.*?\.\w+)$/) ) )
				return { path: match[1], file: match[2] };
			else
				return data;
		}
	};

	var plugin = CKEDITOR.plugins.scayt;

	// Context menu constructing.
	var addButtonCommand = function( editor, buttonName, buttonLabel, commandName, command, menugroup, menuOrder )
	{
		editor.addCommand( commandName, command );

		// If the "menu" plugin is loaded, register the menu item.
		editor.addMenuItem( commandName,
			{
				label : buttonLabel,
				command : commandName,
				group : menugroup,
				order : menuOrder
			});
	};

	var commandDefinition =
	{
		preserveState : true,
		editorFocus : false,

		exec: function( editor )
		{
			if ( plugin.isScaytReady( editor ) )
			{
				var isEnabled = plugin.isScaytEnabled( editor );

				this.setState( isEnabled ? CKEDITOR.TRISTATE_OFF : CKEDITOR.TRISTATE_ON );

				var scayt_control = plugin.getScayt( editor );
				// the place where the status of editor focus should be restored
				// after there will be ability to store its state before SCAYT button click
				// if (storedFocusState is focused )
				//   scayt_control.focus();
				//
				// now focus is set certainly
				scayt_control.focus( );
				scayt_control.setDisabled( isEnabled );
			}
			else if ( !editor.config.scayt_autoStartup && plugin.engineLoaded >= 0 )	// Load first time
			{
				this.setState( CKEDITOR.TRISTATE_DISABLED );
				plugin.loadEngine( editor );
			}
		}
	};

	// Add scayt plugin.
	CKEDITOR.plugins.add( 'scayt',
	{
		requires : [ 'menubutton' ],

		beforeInit : function( editor )
		{
			var items_order = editor.config.scayt_contextMenuItemsOrder
					|| 'suggest|moresuggest|control',
				items_order_str = "";

			items_order = items_order.split( '|' );

			if ( items_order && items_order.length )
			{
				for ( var pos in items_order )
					items_order_str += 'scayt_' + items_order[ pos ] + ( items_orde