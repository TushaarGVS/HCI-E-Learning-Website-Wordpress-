=== CC Child Pages ===

Plugin Name: CC Child Pages
Contributors: caterhamcomputing
Plugin URI: http://ccchildpages.ccplugins.co.uk/
Author URI: https://caterhamcomputing.net/
Donate Link: http://ccchildpages.ccplugins.co.uk/donate/
Requires at least: 4.0
Tested up to: 4.9
Stable tag: 1.36
Version: 1.36
Tags: child pages widget, child pages shortcode, child pages, child page, shortcode, widget, list, sub-pages, subpages, sub-page, subpage, sub page, responsive, child-page, child-pages, childpage, childpages, siblings, sibling pages, posts, custom posts

Adds a responsive shortcode to list child and sibling pages. Pre-styled or specify your own CSS class for custom styling. Includes child pages widget.

== Description ==

CC Child Pages is a simple plugin to show links to child pages via a shortcode.

Child Pages are displayed in responsive boxes, and include the page title, an excerpt and a "Read more..." link.

You can choose between 1, 2, 3 & 4 column layouts.

3 & 4 column layouts will resize to a 2 column layout on small devices to ensure that they remain readable.

= CC Child Pages editor button =

**CC Child Pages now adds a button to the WordPress text editor, allowing you to quickly insert the shortcode and select many common options**

= CC Child Pages widget =

CC Child Pages also includes a widget for displaying child pages within your sidebars.

The widget can be set to show the children of the current page or a specific page, or to show all pages.

Pages can be sorted by their menu order, title or ID. You can also select the depth of pages to be displayed.

You can now also tick the checkbox to show all pages, in which case the widget will behave much like the standard Pages widget but with additional options.

= Using the shortcode =

The simplest usage would be to use the shortcode with no parameters:

`[child_pages]`

This would show the Child Pages for the current page in 2 columns.

You can add the `cols` parameter to choose the number of columns:

`[child_pages cols="1"]`
`[child_pages cols="2"]`
`[child_pages cols="3"]`
`[child_pages cols="4"]`

... if `cols` is set to anything other than 1, 2, 3 or 4 the value will be ignored.

You can also show the child pages of a specific page by adding the `ID` of the page as follows:

`[child_pages id="42"]`

... or you can specify multiple IDs in a comma-separated list (does not work when using `list="true"`)

`[child_pages id="42,53,76"]`

To exclude pages, use the `exclude` parameter. This allows you to specify a comma separated list of Page IDs to be exclude from the output of the shortcode.

`[child_pages exclude="5,33,45"]`

To display only specific pages, you can use the `page_ids` paremeter. This accepts a comma separated list of IDs. If this parameter is used, the `id` and `exclude` parameters are ignored.

`[child_pages page_ids="3,7,10,35"]`

The above code will display only the listed pages.

If you want to prefer to use text other than the standard "Read more ..." to link to the pages, this can be specified with the `more` parameter:

`[child_pages more="More..."]`

You may also hide the "Read more ..." link altogether by setting the `hide_more` parameter to `"true"`:

`[child_pages hide_more="true"]`

Since there is no other way for the visitor to link to the child page, you can choose to make the page titles link to the child page by setting the `link_titles` parameter to `"true"`:

`[child_pages link_titles="true"]`

(This is mainly designed to be used with the `hide_more` parameter, but can be used independently if you want to have both the titles and "Read more ..." text link to the child page.)

When specifying `link_titles="true"`, you may wish to apply your own styling to the links. To do so, you can specify a style using the `title_link_class` parameter:

`[child_pages link_titles="true" title_link_class="my_title_link_class"]`

You can display a thumbnail of the featured image for each page (if set) by setting the `thumbs` parameter to `"true"`:

`[child_pages thumbs="true"]`

You can now also display thumbnails at different sizes to the default ('medium') size. Simply specify the thumbnail size in the `thumbs` parameter. You can even specify custom image sizes.

`[child_pages thumbs='large']`

You can make thumbnails link to the related child page by setting the `link_thumbs` to `"true"`:

`[child_pages thumbs='large' link_thumbs="true"]`

... note that specifying the `link_thumbs` parameter will have no effect unless the `thumbs` parameter is set to either `true` or a thumbnail size.

You can specify a target for the links added by the plugin by setting the `link_target` parameter. This will work exactly the same as setting the `target` parameter for the HTML `<a>` tag:

`[child_pages link_target="_blank"]`

You can limit the length of the excerpt by specifying the `words` parameter:

`[child_pages words="10"]`

You can hide the excerpt altogether by setting the `hide_excerpt` parameter to `"true"`:

`[child_pages hide_excerpt="true"]`

You can stop Custom Excerpts from being truncated by setting the `truncate_excerpt` parameter to "false":

`[child_pages truncate_excerpt="false"]`

... this will display custom excerpts exactly as entered without being shortened. (Especially useful if using the Rich Text Excerpts plugin, in which case all styling will be preserved.)

When `truncate_excerpt` is set to `true`, excerpts will be truncated only if they exceed the specified word count (default 55). When custom excerpts are truncated, any HTML will be removed.

If you have inserted `more` tags into your posts/pages, you may find that the `Continue reading` message is included in the excerpt. To hide this, set the `hide_wp_more` parameter to `true`:

`[child_pages hide_wp_more="true"]`

IF you wish to display the full contents of the listed pages, you can set the `show_page_content` parameter to `true`:

`[child_pages show_page_content="true"]`

To change the order in which the child pages are listed, you can use the `orderby` and `order` parameters:

`[child_pages orderby="title" order="ASC"]`

The `orderby` parameter can have one of the following values:
`menu_order` (the default value) - shows the pages sorted by the order in which they appear within the WordPress admin

`id` sorts the pages according to the ID of the page
`title` sorts the pages alphabetically by the title
`slug` sorts the pages alphabetically according to the slug (page_name) of the page
`author` sorts the pages by author
`date` sorts the pages by the date they were created
`modified` sorts the pages by the date they were modified
`rand` shows the pages in a random order

The `order` parameter can be set to:

`ASC` shows the pages in ascending order, sorted by the value of `orderby`
`DESC` shows the pages in descending order, sorted by the value of `orderby`

You can now also use the `skin` parameter to choose a colour scheme for the Child Pages as follows:

`[child_pages skin="simple"]` (the default colour scheme)
`[child_pages skin="red"]`
`[child_pages skin="green"]`
`[child_pages skin="blue"]`

If you want to style the child page boxes yourself, you can also specify the `class` parameter. If used, this overrides the `span` parameter and adds the specified class name to the generated HTML:

`[child_pages class="myclass"]`

If you are not using the provided skins, you can prevent the CSS file for the skins from being loaded from the CC Child Pages options under the Settings menu.

Finally, you can also display just an unordered list (`<ul>`) of child pages by adding the `list` parameter. In this case, all other parameters are ignored **except for `class`, `cols`, `exclude`, `orderby`, `order` and `id`**.

`[child_pages list="true"]`

When using the `list` parameter, you can also specify the `depth` parameter to specify how many levels in the hierarchy of pages are to be included in the list.

The `depth` parameter accepts the following values:

* 0 (default) Displays pages at any depth and arranges them hierarchically in nested lists 
* -1 Displays pages at any depth and arranges them in a single, flat list 
* 1 Displays top-level Pages only 
* 2, 3 … Displays Pages to the given depth

`[child_pages list="true" depth="4"]`

Specifying the `cols` parameter with `list="true"` will show the child pages as an unordered list ordered into a number of columns (I would recommend avoiding the use of the `depth` parameter when listing child pages within columns - the results are likely to be fairly unreadable!).

`[child_pages list="true" cols="3"]`

The columns are responsive, and should adjust according to the browser being re-sized or the size of the screen being used.

**N.B. Because the shortcode uses the WordPress `wp_list_pages` function to output the list, columns are acheived by applying CSS styling to the functions standard output. This CSS should work fine in modern browsers, but in older browsers (such as Internet Explorer 8) the list will not be split into columns**

The `depth` parameter can now also be used with the shortcode when `list` is not set or is is set to `"false"`.

If `depth` is set, the sub-pages for each child page will be shown as an ordered list. You can specify a title for this element by setting the `subpage_title` parameter:

`[child_pages depth="3" subpage_title="Sub-pages"]`

= Private Pages =

By default the shortcode (as of verion 1.36) will show pages that have their visibility set to `publish`, with pages with a visibility of `private` added for logged in users that have access to these pages.

You can specify which pages to show by using the `post_status` parameter, which can take the following values:

* `publish` - published, publicly viewable pages
* `pending` - pages which are pending review
* `draft` - pages which have not yet been published and have the draft status
* `auto-draft` - newly created pages with no content
* `future` - pages with the publish date set in the future
* `private` - pages which are not visible to users who are not logged in
* `inherit` - revisions
* `trash` - pages which have been moved to the trash awaiting deletion
* `any` - pages with  any status except those from post statuses with 'exclude_from_search' set to true (i.e. `trash` and `auto-draft`)

Some of these values are unlikely to be helpful in everyday use.

For example:

`[child_pages post_status="publish"]`

To specify a number of statuses, provide a comma-separated list:

`[child_pages post_status="publish,private"]`

= Post Meta =

You can show the author, date created and/or date modified for a post by using `show_author`, `show_date_created` and `show_date_modified` parameters. If set to `true`, they will show the corresponding information:

`[child_pages show_author="true" show_date_created="true"]`

= Sibling Pages =

The shortcode also allows you to display sibling pages (those at the same level as the current page within the hierarchy).

To do this, set the `siblings` parameter to `true`.

This will override the `id` parameter and will append the current page to the `exclude` parameter.

`[child_pages siblings="true"]`

This can also be used with the `list` parameter

`[child_pages siblings="true" list="true"]`

By default, the shortcode will not display the current page when `siblings` is set to `true`. If you wish to include the current page, set the `show_current_page` parameter to `true`:

`[child_pages siblings="true" show_current_page="true"]`

`[child_pages siblings="true" list="true" show_current_page="true"]`

= Limits =

You can limit the number of child pages displayed using the `limit` parameter (unless the `list` parameter has been set to `"true"`).

For example: 

`[child_pages limit="5"]` will display only the first 5 child pages.

= Offset =

When not using `list="true"`, you can specify a value for `offset` to skip a set number of results. For example:

`[child_pages offset="2"]`

... will skip the first 2 pages.

= Custom Fields =

You may wish to show a different title, excerpt, "Read more..." message or thumbnail on certain pages. To achieve this, you can set values in custom fields on specific pages - to tell the shortcode to use the custom value, set the `use_custom_excerpt`, `use_custom_title`, `use_custom_more` or `use_custom_thumbs` parameter to the name of the custom field to be used.

If the field used is set for a page, its value will be used instead of the default excerpt/title/"Read more...". Pages on which the custom field is not populated will use the default value.

`[child_pages use_custom_excerpt="custom_cc_excerpt"]`

... will replace the standard excerpt with the value of the custom field `custom_cc_excerpt` (if it is set)

`[child_pages use_custom_title="custom_cc_title"]`

... will replace the standard title with the value of the custom field `custom_cc_title` (if it is set)

`[child_pages use_custom_thumbs="custom_cc_thumnail"]`

... will replace the standard thumbnail with one specified in the value of the custom field `custom_cc_thumnail` (if it is set). The value of the `custom_cc_thumnail` custom field can either be set to the ID of the image attachment (using the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) plugin can make this much easier to use) or to the full URL of the image.

`[child_pages use_custom_more="custom_cc_more"]`

... will replace the standard "Read more..." message with the value of the custom field `custom_cc_more` (if it is set)

`[child_pages use_custom_link="custom_cc_link"]`

... will replace URL link for the page with the URL specified in the value of the custom field `custom_cc_link` (if it is set). (The default value of `use_custom_link` is `"cc_child_pages_link"`, so that this field can be set without the need to specify the parameter. To disable this functionality, set `use_custom_link=""`.)

`[child_pages use_custom_link_target="custom_cc_link_target"]`

... will replace the link target for titles, thumbnails and the "Read more..." text with the value specified in the custom field `custom_cc_link_target` (if it is set). (The default value of `use_custom_link_target` is `"cc_child_pages_link_target"`, so that this field can be set without the need to specify the parameter. To disable this functionality, set `use_custom_link_target=""`.)


**N.B.** `use_custom_excerpt`, `use_custom_title`, `use_custom_more`, `use_custom_link` `use_custom_link_target` and `use_custom_thumbs` will not work when `list="true"`

= Pagination =

CC Child Pages now includes basic support for pagination.

You can set the number of child pages to be displayed on each page by specifying the `posts_per_page` parameter, e.g.:

`[child_pages posts_per_page="6"]`

The above code will display 6 child pages on each page, and if there are more than 6 child pages found navigation links will be displayed.

You can also specify the `page` parameter to display a specific page. For example:

`[child_pages posts_per_page="3" page="2"]`

The above code will show the second page of results (item 4 onwards, up to 3 items). **N.B.** when the `page` parameter is specified, no pagination links are displayed.

The `page` parameter has no effect unless `posts_per_page` is specified.

**Pagination functionality is limited on a static front page**

**N.B.** The pagination parameters are ignored when `list="true"`

= Sticky Posts =

By default, sticky posts are not shown ... however, if you want them to be displayed you can set the `ignore_sticky_posts` parameter to be `false`:

`[child_pages ignore_sticky_posts="false"]`


== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. One column: `[child_pages cols="1"]`
2. Two columns (default): `[child_pages]` or `[child_pages cols="2"]`
3. Three columns: `[child_pages cols="3"]`
4. Four columns: `[child_pages cols="4"]`
5. Skin for Red colour schemes: `[child_pages skin="red"]`
6. Skin for Green colour schemes: `[child_pages skin="green"]`
7. Skin for Blue colour schemes: `[child_pages skin="blue"]`
8. Custom class defined for custom styling: `[child_pages class="myclass"]`
9. Show child pages as a list: `[child_pages list="true"]`
10. Using featured images as thumbnails: `[child_pages thumbs="true"]`
11. Limit word count of excerpt: `[child_pages words="10"]`
12. CC Child Pages widget options

== Changelog ==

= 1.36 =
* Bug fix - by default private pages will be visible or hidden depending on whether the user is logged in
* Added `post_status` parameter to show child pages with specific statuses
* Added button to the settings page to disable loading of Skins CSS file if not being used (for performance)
* Added additional classes to child page elements to allow styling of elements with parent pages (and even specific parent pages)
* Added `use_custom_thumbs` parameter - specify the name of a custom field that will specify the ID or URL of an image to use as a thumbnail

= 1.35 =
* Bug fix - implemented code to remove `[child_pages]` shortcode from pages before generating excerpts to avoid getting stuck in an infinite loop under some circumstances
* Added `show_page_content` parameter to show complete page content
* Added `link_target` and `use_custom_link_target` parameters to allow control of how links open
* `depth` now works with the shortcode when not using `list` mode. Added `subpage_title` parameter to display a title for sub-pages whe `depth` is greater than 1 and `list="true"` is NOT specified
* Added `show_author`, `show_date_created` and `show_date_modified` parameters to allow display of post information
* `order` can now be set to `rand` to show items in a random order

= 1.34 =
* Added `ignore_sticky_posts` parameter
* Added `limit` parameter to limit the number of pages displayed
* Added `offset` parameter to allow skipping a number of pages

= 1.33 =
* Added `posts_per_page` and `page` parameters for basic pagination
* Added `page_ids` parameter to allow display of specific pages
* Added `use_custom_link` parameter to allow the over-riding of the link target on a per page basis
* Added new CSS IDs to help make styling more flexible

= 1.32 =
* Bug fix - widget was displaying sibling pages instead of child pages under certain circumstances

= 1.31 =
* Added `siblings` option to the widget
* Added `show_current_page` option for use with the shortcode when `siblings` is set to `true`
* Added `hide_wp_more` to remove the standard "Continue reading..." message from excerpts
* Added `use_custom_excerpt`, `use_custom_title` and `use_custom_more` to the shortcode
* Added more filters and actions to widget and shortcode to allow extension of plugin

= 1.30 =
* Bug fix - internationalization now works correctly (translations need work though - currently only French, which is known to be poor)
* Added more filters to widget, list and shortcode to allow extension of plugin

= 1.29 =
* Bug fix - widget will now show on all pages/posts if "All Pages" or a specific parent page is selected
* Bug fix - shortcode now closes query correctly (was causing issues with some themes)
* The shortcode will now work with custom post types
* You can now specify multiple parent page IDs (when using `list="true"`, only a single parent ID can be specified)

= 1.28 =
* Further improvements to integration when used with Video Thumbnails plugin

= 1.27 =
* Added the `siblings` parameter to show siblings of current page
* Improved integration when used with Video Thumbnails plugin
* Minor bug fixes for CC Child Pages Widget

= 1.26 =
* The CSS for displaying child pages has been re-written to allow for custom CSS to be more easily written - for example, specifying a border should no longer cause problems in the responsive layout. Fallbacks have been put in place for older versions of Internet Explorer.
* The handling of Custom CSS from the settings page has been improved.
* The loading of the plugin CSS has been returned to the default manner. While this means that CSS is loaded on pages where the shortcode is not used, it means that the CSS can be correctly minified by other plugins and ensures that valid HTML is generated.

= 1.25 =
* New option added to widget to show all top-level pages and their children. This can now be used as a complete replacement for the standard Pages widget
* New option added to the plugins settings page allowing custom CSS code to be specified from within the plugin. This feature has been requested several times. This functionality will be expanded on in the future.

= 1.24 =
* Further enhancements to CSS when using both the `list` and `cols` parameters

= 1.23 =
* Minor fix for CSS when using both the `list` and `cols` parameters

= 1.22 =
* Changes to how excerpts are generated from content when no custom excerpt is specified.
* Changed how CSS is queued - the CSS file will now only be included in the page if the shortcode is specified, helping to keep page sizes to a minimum.

= 1.21 =
* Change to allow `cols` parameter to be used when `list` parameter is set to `true`.
* Changed `.ccpages_excerpt` container to `<div>` (was `<p>`) to avoid potentially invalid HTML when HTML excerpts are used.

= 1.20 =
* Change to improve efficiency when the plugin attempts to force thumbnail creation via Video Thumbnails plugin
* Minor change to avoid output of empty links when applying links to thumbnails and no thumbnail is present
* Minor change to escaping special characters in `more` parameter

= 1.19 =
* Small change to how the plugin works with thumbnails. It will now use thumbnails generated by the Video Thumbnails plugin if it is installed.
* Added `link_thumbs` parameter. If set to `"true"`, thumbnails will link to the child page.
* CSS is no longer minified, in order to make it easier to view existing CSS when defining your own custom styles. The CSS can be minified by other plugins if required. 

= 1.18 =
* Added settings page to allow disabing of button in Visual Editor (TinyMCE)
* Added the `truncate_excerpt` parameter to the shortcode, defaults to `true` but setting to `false` stops custom excerpts from being shortened (where no custom excerpt exists, page content will still be truncated)

= 1.17 =
* Small change to how custom excerpts are handled for interoperability with Rich Text Excerpts plugin. 

= 1.16 =
* Added the `hide_excerpt` parameter

= 1.15 =
* Added `hide_more` parameter to hide "Read more ..." links.
* Added `link_titles` parameter to make titles link to pages.
* Added `title_link_class` parameter for styling links in page titles.

= 1.14 =
* Bug fix: Corrected missing `<ul>` tags in widget
* Minor CSS changes to improve compatibility with certain themes

= 1.13 =
* Bug fix: Corrected problem with titles including special characters
* Added orderby and order parameters to control the display order of child pages

= 1.12 =
* Bug fix: Corrected problem when automatic excerpt returns value including a shortcode

= 1.11 =
* Bug fix: Corrected small bug introduced in version 1.10 when using `list="true"`

= 1.10 =
* Added `exclude` parameter
* Added `depth` parameter (only used if `list` is set to `"true"`)

= 1.9 =
* Added editor button
* Added custom excerpt capability to pages by default
* Refined generation of page excerpt where no custom excerpt exists
* Enhanced functionality of the `thumbs` option - you can now set this to the desired thumbnail size e.g. `thumbs="large"`, `thumbs="full"`, `thumbs="my-custom-size"`, etc.

= 1.8 =
* CC Child Pages widget enhanced to allow display of children of current page or a specific page
* CC Child Pages widget enhanced to allow depth to be specified

= 1.7 =
* Changed plugin author to show business name (Caterham Computing)
* Added CC Child Pages widget
* Added various new classes to help with custom CSS styling

= 1.6 =
* Added the `words` parameter. When set to a value greater than 0, the number of words in the excerpt will be trimmed if greater than the specified value.

= 1.5 =
* Added the `thumbs` parameter. If set to `"true"`, the featured image (if set) of a page will be shown.

= 1.4 =
* Added `more` parameter to override standard "Read more ..." text
* Internationalisation ...

= 1.3 =
* Corrected small error when using `list` parameter

= 1.2 =
* Added the `list` parameter

= 1.1 =
* Added the `skin` parameter
* Added the `class` parameter

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.36 =
* Bug fix - by default private pages will be visible or hidden depending on whether the user is logged in
* Added `post_status` parameter to show child pages with specific statuses
* Added button to the settings page to disable loading of Skins CSS file if not being used (for performance)
* Added additional classes to child page elements to allow styling of elements with parent pages (and even specific parent pages)
* Added `use_custom_thumbs` parameter - specify the name of a custom field that will specify the ID or URL of an image to use as a thumbnail

= 1.35 =
* Bug fix - implemented code to remove `[child_pages]` shortcode from pages before generating excerpts to avoid getting stuck in an infinite loop under some circumstances
* Added `show_page_content` parameter to show complete page content
* Added `link_target` and `use_custom_link_target` parameters to allow control of how links open
* `depth` now works with the shortcode when not using `list` mode. Added `subpage_title` parameter to display a title for sub-pages whe `depth` is greater than 1 and `list="true"` is NOT specified
* Added `show_author`, `show_date_created` and `show_date_modified` parameters to allow display of post information
* `order` can now be set to `rand` to show items in a random order

= 1.34 =
* Added `ignore_sticky_posts` parameter
* Added `limit` parameter to limit the number of pages displayed
* Added `offset` parameter to allow skipping a number of pages

= 1.33 =
* Added `posts_per_page` and `page` parameters for basic pagination
* Added `page_ids` parameter to allow display of specific pages
* Added `use_custom_link` parameter to allow the over-riding of the link target on a per page basis
* Added new CSS IDs to help make styling more flexible

= 1.32 =
* Bug fix - widget was displaying sibling pages instead of child pages under certain circumstances

= 1.31 =
* Added `siblings` option to the widget
* Added `show_current_page` option for use with the shortcode when `siblings` is set to `true`
* Added `hide_wp_more` to remove the standard "Continue reading..." message from excerpts
* Added `use_custom_excerpt`, `use_custom_title` and `use_custom_more` to the shortcode
* Added more filters and actions to widget and shortcode to allow extension of plugin

= 1.30 =
* Bug fix - internationalization now works correctly (translations need work though - currently only French, which is known to be poor)
* Added more filters to widget, list and shortcode to allow extension of plugin

= 1.29 =
* Bug fix - widget will now show on all pages/posts if "All Pages" or a specific parent page is selected
* Bug fix - shortcode now closes query correctly (was causing issues with some themes)
* The shortcode will now work with custom post types
* You can now specify multiple parent page IDs (when using `list="true"`, only a single parent ID can be specified)

= 1.28 =
* Further improvements to integration when used with Video Thumbnails plugin

= 1.27 =
* Added the `siblings` parameter to show siblings of current page
* Improved integration when used with Video Thumbnails plugin
* Minor bug fixes for CC Child Pages Widget

= 1.26 =
* The CSS for displaying child pages has been re-written to allow for custom CSS to be more easily written - for example, specifying a border should no longer cause problems in the responsive layout. Fallbacks have been put in place for older versions of Internet Explorer.
* The handling of Custom CSS from the settings page has been improved.
* The loading of the plugin CSS has been returned to the default manner. While this means that CSS is loaded on pages where the shortcode is not used, it means that the CSS can be correctly minified by other plugins and ensures that valid HTML is generated.

= 1.25 =
* New option added to widget to show all top-level pages and their children. This can now be used as a complete replacement for the standard Pages widget
* New option added to the plugins settings page allowing custom CSS code to be specified from within the plugin. This feature has been requested several times. This functionality will be expanded on in the future.

= 1.23 =
* Minor fix for CSS when using both the `list` and `cols` parameters

= 1.22 =
* Changes to how excerpts are generated from content when no custom excerpt is specified.
* Changed how CSS is queued - the CSS file will now only be included in the page if the shortcode is specified, helping to keep page sizes to a minimum.

= 1.21 =
* Change to allow `cols` parameter to be used when `list` parameter is set to `true`.
* Changed `.ccpages_excerpt` container to `<div>` (was `<p>`) to avoid potentially invalid HTML when HTML excerpts are used.

= 1.20 =
* Change to improve efficiency when the plugin attempts to force thumbnail creation via Video Thumbnails plugin
* Minor change to avoid output of empty links when applying links to thumbnails and no thumbnail is present
* Minor change to escaping special characters in `more` parameter

= 1.19 =
* Small change to how the plugin works with thumbnails. It will now use thumbnails generated by the Video Thumbnails plugin if it is installed.
* Added `link_thumbs` parameter. If set to `"true"`, thumbnails will link to the child page.
* CSS is no longer minified, in order to make it easier to view existing CSS when defining your own custom styles. The CSS can be minified by other plugins if required.

= 1.18 =
* Added settings page to allow disabing of button in Visual Editor (TinyMCE)
* Added the `truncate_excerpt` parameter to the shortcode, defaults to `true` but setting to `false` stops custom excerpts from being shortened (where no custom excerpt exists, page content will still be truncated)

= 1.17 =
* Small change to how custom excerpts are handled for interoperability with Rich Text Excerpts plugin. 

= 1.16 =
* Added the `hide_excerpt` parameter

= 1.15 =
* Added `hide_more` parameter to hide "Read more ..." links.
* Added `link_titles` parameter to make titles link to pages.
* Added `title_link_class` parameter for styling links in page titles.

= 1.14 =
* Bug fix: Corrected missing `<ul>` tags in widget
* Minor CSS changes to improve compatibility with certain themes

= 1.13 =
Bug fix: Corrected problem with titles including special characters
Added orderby and order parameters to control the display order of child pages

= 1.12 =
Bug fix: Corrected problem when automatic excerpt returns value including a shortcode

= 1.11 =
Bug fix: Corrected small bug introduced in version 1.10 when using `list="true"`

= 1.10 =
Added exclude parameter for shortcode, and depth parameter for shortcode when list output is selected.

= 1.9 =
Added editor button, added custom excerpt capability to pages, enhanced thumbnail options and refined excerpt generation from page content

= 1.8 =
CC Child Pages widget enhanced to allow display of children of current page or a specific page. Depth can also be specified.

= 1.7 =
Added new CC Child Pages Widget. Added lots of new classes to help with custom CSS styling.

