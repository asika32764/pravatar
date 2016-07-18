<?php
/**
 * Part of pavatar project.
 *
 * @copyright  Copyright (C) 2016 {ORGANIZATION}. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

?>

<?php foreach (range(1, 100) as $i): ?>
	<img src="http://i.pravatar.cc/150?u=<?php echo md5($i); ?>" alt="Avatar">
<?php endforeach; ?>

