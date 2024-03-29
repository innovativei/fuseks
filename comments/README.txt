## comments/

This directory holds templates for displaying the comment loop and the comment form - what is typically called in by WordPress's `comment_template()` function.

This level of abstraction us useful to be able to load in the comments and new comment form for a post/page via AJAX if desired.


## General Context

When choosing a template to use in the General Context, the Carrington engine looks at the type of request is being fulfilled. It will identify the request as the home page, a category archive, and individual post, etc.

There is additional checking done for single post requests. All options in the Content Context are supported here with a 'single-' prefix added to the file. See specifics below.

A "default" template is required, and will be used when there are no other templates that match a given comment. This could be because no other templates have been created, or because the comment in question doesn't match the templates that are available.

By default, supported template conditions are checked in this order:

1. author
2. category
3. taxonomy
4. tag
5. type
6. role
7. single
8. default (home, search, archive, 404, etc.)

This can be altered using the `cfct_general_match_order` hook.


### Supported Templates (General Context)

- *author-{username}.php* - Used when the post/page is authored by a specific user. For example, a template with a file name of _author-jsmith.php_ would be used for a post/page by user _jsmith_. Any WordPress username can take the place of {username} in the file name.
- *author.php* - Used for author archive lists.
- *cat-{slug}.php* - Used for displaying a given category. The category is matched by the "slug" - for example a post in category "General" (with a category slug of "general") could use a template of _cat-general.php_.
- *category.php* - Used for category archive lists.
- *tax-{taxonomy-slug}-{term-slug}.php* - Used to display the archives of a specific term in a given taxonomy. The slugs of both taxonomy and term are used.
- *tax-{taxonomy-slug}.php* - Use to display the archives of all terms in a given taxonomy. The slug of the taxonomy is used.
- *tag-{slug}.php* - Used for displaying the archives of a given tag. The tag is matched by the "slug" - for example a post in tag "News" (with a tag slug of "news") could use a template of _tag-news.php_.
- *tag.php* - Used for tag archives.
- *type-{post-type}.php* - Used to target a given custom post type. Replace {type} with the custom post type's WordPress reference.
- *role-{rolename}.php - Used on the post archives of a author when they have a particular role. This might be the role of _contributor_, _author_, _editor_, etc. and use a file of _role-contributor.php_, _role-author.php_, etc. where the role name takes the place of the {rolename} in the file name.
- *single-{post context filenames}.php* - Templates used for single posts.
  - *single-author-{author}.php* - Used to target a post by a given author.
  - *single-meta-{key}-{value}.php* - Used when there is a custom field for the post/page matching the key and value listed in the file name.
  - *single-meta-{key}.php* - Used when there is a custom field for the post matching just the key listed in the file name.
  - *single-format-{format}.php* - The format is matched by the "slug" - the lowercase version of the string in this situation ("video", "status", "link", etc.). Your theme must enable post formats to use this feature.
  - *single-cat-{slug}.php* - Used to target a post in a given category.
  - *single-tax-{taxonomy-slug}-{term-slug}.php* - Used to target a post with a given term within a specific taxonomy.
  - *single-type-{post-type}.php* - Used to display the custom content for a given post type.
  - *single-role-{rolename}.php* - Used to display single posts written by an author with a given WordPress role. This might be the role of _contributor_, _author_, _editor_, etc. and use a file of _role-contributor.php_, _role-author.php_, etc. where the role name takes the place of the {rolename} in the file name.
  - *single-tag-{tag}.php* - Used for displaying custom content for a single post containing a given tag.
  - *single-parent-{slug}.php - For single posts with a given parent's slug.
  - *single.php* - Used for single posts.
- *archive.php* - Used for date archives or if there are no specific category, author, taxonomy or tag templates.
- *search.php* - Used when displaying search results.
- *404.php* - Used when displaying search results.
- *home.php* - Used when on the home page.
- *page.php* - Used for pages that do not match any other contextual templates.
- *{dirname}-default.php* (or default.php) - Used when there are no other templates that match for a given page/post.





## General Context (old)

When choosing a template to use in the General Context, the Carrington engine looks at the type of request is being fulfilled. It will identify the request as the home page, a category archive, and individual post, etc.

There is additional checking done for single post requests. All options in the Content Context are supported here with a 'single-' prefix added to the file. See specifics below.

A "default" template is required, and will be used when there are no other templates that match a given comment. This could be because no other templates have been created, or because the comment in question doesn't match the templates that are available.

By default, conditions are checked in this order:

1. author
2. role
3. category
4. tag
5. single
6. default (home, search, archive, 404, etc.)

This can be altered using the `cfct_general_match_order` hook.


### Supported Templates (General Context)

- *{dirname}-default.php* (or default.php) - Used when there are no other templates that match for a given page/post.
- *archive.php* - Used for date archives or if there are no specific category, author or tag templates.
- *author.php* - Used for author archive lists.
- *author-{username}.php* - Used when the post/page is authored by a specific user. For example, a template with a file name of _author-jsmith.php_ would be used for a post/page by user _jsmith_. Any WordPress username can take the place of {username} in the file name.
- *role-{rolename}.php - Used when the post author has a particular role. This might be the role of _contributor_, _author_, _editor_, etc. and use a file of _role-contributor.php_, _role_author.php_, etc. where the role name takes the place of the {rolename} in the file name.
- *category.php* - Used for category archive lists.
- *cat-{slug}.php* - Used fr displaying a given category. The category is matched by the "slug" - for example a post in category "General" (with a category slug of "general") could use a template of _cat-general.php_.
- *home.php* - Used when on the home page.
- *page.php* - Used for pages that do not match any other contextual templates.
- *search.php* - Used when displaying search results.
- *single.php* - Used for single post pages.
- *single-{content context filenames}.php* - Used for single post pages.
- *tag.php* - Used for tag archive lists.
- *tag-{slug}.php* - Used for displaying a given tag. The tag is matched by the "slug" - for example a post in tag "News" (with a tag slug of "news") could use a template of _tag-news.php_.

