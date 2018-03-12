(function()
	{
		tinymce.create('tinymce.plugins.ccchildpages',
			{
				/**
				* Initializes the plugin, this will be executed after the plugin has been created.
				* This call is done before the editor instance has finished it's initialization so use the onInit event
				* of the editor instance to intercept that event.
				*
				* @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
				* @param {string} url Absolute URL to where the plugin is located.
				*/
				init : function(ed, url)
				{
					ed.addButton('ccchildpages', {
						title : 'CC Child Pages',
						cmd : 'ccchildpages',
						image : url + '/childpages.png'
					});
					
					ed.addCommand('ccchildpages', function() {
						var selected_text = ed.selection.getContent();

						ed.windowManager.open ({
							title: 'CC Child Pages',
							body: [
								{
									type: 'listbox',
									name: 'ccchildcols',
									label: 'Columns',
									'values': [
										{ text: '1', value: '1' },
										{ text: '2', value: '2' },
										{ text: '3', value: '3' },
										{ text: '4', value: '4' },
									],
									value: '2'
								},
								{
									type: 'textbox',
									name: 'ccchildid',
									label: 'Parent Page ID'					
								},
								{
									type: 'textbox',
									name: 'ccchildmore',
									label: 'Read More Text'					
								},
								{
									type: 'textbox',
									name: 'ccchildwords',
									label: 'Excerpt Length'					
								},
								{
									type: 'textbox',
									name: 'ccchildthumbs',
									label: 'Thumbnail Size'					
								},
								{
									type: 'textbox',
									name: 'ccchildclass',
									label: 'Custom Class'					
								},
								{
									type: 'listbox',
									name: 'ccchildskin',
									label: 'Skin',
									'values': [
										{ text: 'Simple (default)', value: 'simple' },
										{ text: 'Red', value: 'red' },
										{ text: 'Green', value: 'green' },
										{ text: 'Blue', value: 'blue' },
									],
									value: 'simple'
								},
								{
									type: 'textbox',
									name: 'ccchildexclude',
									label: 'Exclude (comma separated list of page IDs)'
								},
								{
									type: 'listbox',
									name: 'ccchildlist',
									label: 'Show as list',
									'values': [
										{ text: 'False (default)', value: 'false' },
										{ text: 'True', value: 'true' },
									],
									value: 'false'
								},
								{
									type: 'textbox',
									name: 'ccchilddepth',
									label: 'Depth (only for list mode)'
								},
							],
							onsubmit: function(e) {
								var return_text = '[child_pages cols="' + e.data.ccchildcols + '"';
								if ( e.data.ccchildid != '' )
									return_text = return_text + ' id="' + e.data.ccchildid + '"';
								if ( e.data.ccchildmore != '' )
									return_text = return_text + ' more="' + e.data.ccchildmore + '"';
								if ( e.data.ccchildwords != '' )
									return_text = return_text + ' words="' + e.data.ccchildwords + '"';
								if ( e.data.ccchildthumbs != '' )
									return_text = return_text + ' thumbs="' + e.data.ccchildthumbs + '"';
								if ( e.data.ccchildclass != '' )
									return_text = return_text + ' class="' + e.data.ccchildclass + '"';
								if ( e.data.ccchildskin != '' )
									return_text = return_text + ' skin="' + e.data.ccchildskin + '"';
								if ( e.data.ccchildexclude != '' )
									return_text = return_text + ' exclude="' + e.data.ccchildexclude + '"';
								if ( e.data.ccchildlist != '' )
									return_text = return_text + ' list="' + e.data.ccchildlist + '"';
								if ( e.data.ccchilddepth != '' )
									return_text = return_text + ' depth="' + e.data.ccchilddepth + '"';
								
								return_text = return_text + ']';
								
								
								
								ed.execCommand('mceInsertContent', 0, return_text);
							}
						});
					});

				},

				/**
				* Creates control instances based in the incomming name. This method is normally not
				* needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
				* but you sometimes need to create more complex controls like listboxes, split buttons etc then this
				* method can be used to create those.
				*
				* @param {String} n Name of the control to create.
				* @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
				* @return {tinymce.ui.Control} New control instance or null if no control was created.
				*/
				createControl : function(n, cm)
				{
					return null;
				},

				/**
				* Returns information about the plugin as a name/value array.
				* The current keys are longname, author, authorurl, infourl and version.
				*
				* @return {Object} Name/value array containing information about the plugin.
				*/
				getInfo : function()
				{
					return {
longname : 'CC Child Pages',
author : 'Tim Lomas',
authorurl : 'http://caterhamcomputing.net',
infourl : 'http://ccchildpages.ccplugins.co.uk',
version : "1.36"
};
				}
			});

		// Register plugin
		tinymce.PluginManager.add( 'ccchildpages', tinymce.plugins.ccchildpages );
	})();
