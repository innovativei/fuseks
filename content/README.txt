## content/

This directory holds the templates for displaying a post. Typically this will be the full post with title, meta information (date, categories, tags, author, etc.) and the full output of `the_content()`.


## Post Context

When choosing a template to use in the Post Context, the Carrington engine looks information (author, category, tags, custom fields, etc.) related to the post/page being shown.

Commonly these templates are included by templates in the _loop/_; but are also useful for bringing in an atomic post representation via AJAX or placing one within another template.

A "default" template is required, and will be used when there are no other templates that match a given post. This could be because no other templates have been created, or because the post in question doesn't match the templates that are available.

You can create templates to be used with posts/pages given various conditions. For example, you might want to give all posts in a certain category some specific styling rules. Or perhaps posts with a certain custom field or by a specific author. This is accomplished by creating templates with file names that match these conditions, then placing them in the _content/_ directory. All templates other than _{dirname}-default.php_ are optional.

The order in which these conditions are checked defaults to the following:

1. author
2. meta
3. format
4. category
5. taxonomy
6. type
7. role
8. tag
9. parent
10. page
11. default

however this order can be overridden with a plugin using the `cfct_single_match_order` hook.

Support for Carrington templates in feeds (RSS, Atom) was added in version 3.3. To use this, prefix any of the Post Context filenames with "feed-", and those templates will be used exclusively in RSS and Atom feeds.

Once a template match has been found, no other processing is done.


### Supported Templates (Post Context)

- *author-{username}.php* - Used when a user with that username authors a post/page. For example, a template with a file name of <code>author-jsmith.php</code> would be used for a poat/page by user <code>jsmith</code>. Any WordPres username can take the place of {username} in the file name.
- *meta-{key}-{value}.php* - Used when there is a custom field for the post/page matching the key and value listed in the file name. This is useful if you want to be able to flag posts as "featured" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "featured" with a value of "yes" to a post/page and it would use a template of <code>meta-featured-yes.php</code> if that template exists.
- *meta-{key}.php* - Used when there is a custom field for the post/page matching the key listed in the file name. This is useful if you want to be able to flag posts as "photo" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "photo" with a value of the URL of the image to a post/page and it would use a template of <code>meta-photo.php</code> if that template exists. The value does not matter in this match.
- *format-{slug}.php* - Used when a post has a given format. The format is matched by the "slug" - the lowercase version of the string in this situation ("video", "status", "link", etc.). Your theme must enable post formats to use this feature.
- *cat-{slug}.php* - Used when a post is in a given category. The category is matched by the "slug" - for example a post in category "General" (with a category slug of "general") could use a template of <code>cat-general.php</code>.
- *tax-{taxonomy-slug}-{term-slug}.php* - Used when a post has a specific term in a given custom taxonomy. The taxonomy term is matched by the "slug" - for example a custom taxonomy of "Colors" with a term of "Red" (with a slug of "colors" and "red" respectively) could use a template of <code>tax-colors-red.php</code>.
- *type-{post-type}.php* - Used when a post belongs to a specific custom post type.  The type is matched by the "post_type" property of the post.  For example if you had a custom post type of <code>news</code>, you could use a template with the name <code>type-news.php</code>.
- *role-{role}.php* - Used when a post/page is authored by a user with a particular role. The {role} is an all lowercase representation of the role string - for example, an author with an "Administrator" role might use a template of <code>role-administrator.php</code>. This is primarily useful if you have a set of authors that are given a Contributor role; or a Guest Columnist role or similar. Any WordPress role can take the place of {role} in the file name.
- *tag-{slug}.php* - Used when a post has a certain tag applied to it. The tag is matched by the "slug" - for example a post with tag "Reference" (with a tag slug of "reference") could use a template of <code>tag-reference.php</code>.
- *parent-{slug}.php* - Used when a page is a child page of a specific parent page. The page is matched by the "slug" - for example a page under a parent page with slug of "example" could use a template of <code>parent-example.php</code>.
- *page.php* - Used when the content is being displayed is a page (not a post).
- *{dirname}-default.php* - Used when there are no other templates that match for a given post/page.

If you wish to customize the output displayed in your feeds, you can create templates using the naming conventions above and prefix them with "feed-". These will only take effect in your feeds.

- *feed-{post context filenames}.php*
  - *feed-author-{author}.php*
  - *feed-meta-{key}-{value}.php*
  - *feed-meta-{key}.php*
  - *feed-format-{format}.php*
  - *feed-cat-{slug}.php*
  - *feed-tax-{taxonomy}-{term}.php*
  - *feed-type-{type}.php*
  - *feed-role-{role}.php*
  - *feed-tag-{tag}.php*
  - *feed-parent-{slug}.php*
  - *feed.php*




## Post Context (old)

When choosing a template to use in the Post Context, the Carrington engine looks information (author, category, tags, custom fields, etc.) related to the post/page being shown.

Commonly these templates are included by templates in the _loop/_; but are also useful for bringing in an atomic post representation via AJAX or placing one within another template.

A "default" template is required, and will be used when there are no other templates that match a given post. This could be because no other templates have been created, or because the post in question doesn't match the templates that are available.

You can create templates to be used with posts/pages given various conditions. For example, you might want to give all posts in a certain category some specific styling rules. Or perhaps posts with a certain custom field or by a specific author. This is accomplished by creating templates with file names that match these conditions, then placing them in the _content/_ directory. All templates other than _{dirname}-default.php_ are optional.

The order in which these conditions are checked defaults to the following:

1. author
2. meta
3. format
4. category
5. taxonomy
6. type
7. role
8. tag
9. parent
10. page
11. default

however this order can be overridden with a plugin using the `cfct_single_match_order` hook.

Support for Carrington templates in feeds (RSS, Atom) was added in version 3.3. To use this, prefix any of the Post Context filenames with "feed-", and those templates will be used exclusively in RSS and Atom feeds.

Once a template match has been found, no other processing is done.


### Supported Templates (Post Context)

- *author-{username}.php* - Used when a user with that username authors a post/page. For example, a template with a file name of <code>author-jsmith.php</code> would be used for a poat/page by user <code>jsmith</code>. Any WordPres username can take the place of {username} in the file name.
- *meta-{key}-{value}.php* - Used when there is a custom field for the post/page matching the key and value listed in the file name. This is useful if you want to be able to flag posts as "featured" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "featured" with a value of "yes" to a post/page and it would use a template of <code>meta-featured-yes.php</code> if that template exists.
- *meta-{key}.php* - Used when there is a custom field for the post/page matching the key listed in the file name. This is useful if you want to be able to flag posts as "photo" or similar, and give those posts some custom treatment. In this example, you could add a custom field of "photo" with a value of the URL of the image to a post/page and it would use a template of <code>meta-photo.php</code> if that template exists. The value does not matter in this match.
- *format-{slug}.php* - Used when a post has a given format. The format is matched by the "slug" - the lowercase version of the string in this situation ("video", "status", "link", etc.). Your theme must enable post formats to use this feature.
- *cat-{slug}.php* - Used when a post is in a given category. The category is matched by the "slug" - for example a post in category "General" (with a category slug of "general") could use a template of <code>cat-general.php</code>.
- *tax-{taxonomy-slug}-{term-slug}.php* - Used when a post has a specific term in a given custom taxonomy. The taxonomy term is matched by the "slug" - for example a custom taxonomy of "Colors" with a term of "Red" (with a slug of "colors" and "red" respectively) could use a template of <code>tax-colors-red.php</code>.
- *type-{post-type}.php* - Used when a post belongs to a specific custom post type.  The type is matched by the "post_type" property of the post.  For example if you had a custom post type of <code>news</code>, you could use a template with the name <code>type-news.php</code>.
- *role-{role}.php* - Used when a post/page is authored by a user with a particular role. The {role} is an all lowercase representation of the role string - for example, an author with an "Administrator" role might use a template of <code>role-administrator.php</code>. This is primarily useful if you have a set of authors that are given a Contributor role; or a Guest Columnist role or similar. Any WordPress role can take the place of {role} in the file name.
- *tag-{slug}.php* - Used when a post has a certain tag applied to it. The tag is matched by the "slug" - for example a post with tag "Reference" (with a tag slug of "reference") could use a template of <code>tag-reference.php</code>.
- *parent-{slug}.php* - Used when a page is a child page of a specific parent page. The page is matched by the "slug" - for example a page under a parent page with slug of "example" could use a template of <code>parent-example.php</code>.
- *page.php* - Used when the content is being displayed is a page (not a post).
- *{dirname}-default.php* - Used when there are no other templates that match for a given post/page.

If you wish to customize the output displayed in your feeds, you can create templates using the naming conventions above and prefix them with "feed-". These will only take effect in your feeds.

- *feed-{post context filenames}.php*
  - *feed-author-{author}.php*
  - *feed-meta-{key}-{value}.php*
  - *feed-meta-{key}.php*
  - *feed-format-{format}.php*
  - *feed-cat-{slug}.php*
  - *feed-tax-{taxonomy}-{term}.php*
  - *feed-type-{type}.php*
  - *feed-role-{role}.php*
  - *feed-tag-{tag}.php*
  - *feed-parent-{slug}.php*
  - *feed.php*
