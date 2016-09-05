<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_tags
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.framework');
JHtml::_('formbehavior.chosen', 'select');

$n			= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

?>

<?php foreach ($this->items as $i => $item) : ?>

	<h1><?php echo $this->escape($item->core_title); ?></h1>
	<?php echo $item->core_body; ?>

<?php endforeach; ?>