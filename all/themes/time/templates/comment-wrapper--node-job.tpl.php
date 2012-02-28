<?php

/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 * @see theme_comment_wrapper()
 */
?>

<section id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php if ( FALSE ): // skip this block - hiding comments from other users ?>

    <?php if ($content['comments'] && $node->type != 'forum'): ?>
      <?php print render($title_prefix); ?>
      <h2 class="comment-title title"><?php print t('Job requests:'); ?></h2>
      <?php print render($title_suffix); ?>
    <?php endif; ?>

    <?php print render($content['comments']); ?>

  <?php endif; ?>


  <?php
    // Get all comments on this Job. This view is access controlled.
    $comments_all =
      views_embed_view( 'comments_current_node', 'default', $node->nid );
  ?>

  <?php if ( $comments_all ): // Does user have access to all comments ?>

    <?php print render($title_prefix); ?>
    <h2 class="comment-title title"><?php print t('Job requests:'); ?></h2>
    <?php print render($title_suffix); ?>

    <?php if ( strpos( $comments_all, 'views-row-first' ) !== FALSE ): ?>
      <?php print $comments_all; ?>
    <?php else: ?>
      <div class="view-no-results"><?php print t('No requests yet'); ?></div>
    <?php endif; ?>

  <?php else: ?>

    <?php
      // All-comments view not accessible. What about own comments?
      $comments_current_user =
        views_embed_view( 'my_comments_current_node', 'default', $node->nid );
    ?>

    <?php if ( strpos( $comments_current_user, 'views-row-first' ) !== FALSE ): ?>
      <?php print render($title_prefix); ?>
      <h2 class="comment-title title"><?php print t('Your notes:'); ?></h2>
      <?php print render($title_suffix); ?>
      <?php print $comments_current_user; ?>
    <?php endif; ?>

  <?php endif; ?>


  <?php if ($content['comment_form']): ?>
    <h2 class="comment-title title comment-form"><?php print t('Request this job...'); ?></h2>
    <?php print render($content['comment_form']); ?>
  <?php endif; ?>
</section>




































