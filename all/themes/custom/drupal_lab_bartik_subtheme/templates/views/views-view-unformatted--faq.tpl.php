<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="ziehharmonika">
    <?php if (!empty($title)): ?>
      <h3><?php print $title; ?></h3>
    <?php endif; ?>
    <?php foreach ($rows as $id => $row): ?>
        <?php
        // Checks the class is set for rows
        if ($classes_array[$id]): ?>
          <div class="<?php print $classes_array[$id]; ?>">
              <?php print $row; ?>
          </div>
        <?php
        // Other ways
        else: ?>
            <?php print $row; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
