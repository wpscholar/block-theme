# Block Theme

## Questions
- How are translations handled when text is in an HTML file?
- How do I add links to post entries?
- How does pagination work?
- Why are we hard-coding navigation links?
- Am I going to be able to nest my block template parts in subdirectories?
- What is the best way to handle class names on the parent element when that class name is dependent on whether or not there is a featured image as a child element?
- How would I create a custom template?

## Missing Blocks
- Site Description
- Query (https://github.com/WordPress/gutenberg/pull/20106)
- Pagination
- Permalink

## Gotchas
- Don't worry about adding foundational HTML like <head> or <body>, those are already taken care of. All blocks are also wrapped in a 'wp-site-blocks' div.
- Make sure to update your permalinks not to be 'Plain' or testing contexts won't work as expected.

## Resources
- https://themeshaper.com/2020/01/21/creating-a-block-based-theme-using-block-templates/
- https://developer.wordpress.org/reference/functions/add_theme_support/
- https://developer.wordpress.org/block-editor/developers/themes/theme-support/
- https://github.com/WordPress/theme-experiments
- https://developer.wordpress.org/reference/functions/register_block_type/
- http://wptest.io/
