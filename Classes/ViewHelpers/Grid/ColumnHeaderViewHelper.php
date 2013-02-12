<?php
namespace TYPO3\CMS\Media\ViewHelpers\Grid;
/***************************************************************
*  Copyright notice
*
*  (c) 2012
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * View helper for rendering configuration that will be consumed by Javascript
 *
 * @category    ViewHelpers
 * @package     TYPO3
 * @subpackage  media
 * @author      Fabien Udriot <fabien.udriot@typo3.org>
 */
class ColumnHeaderViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Render the columns of the grid
	 *
	 * @return string
	 */
	public function render() {

		$output = '';

		foreach(\TYPO3\CMS\Media\Utility\TcaGrid::getService()->getFields() as $fieldName => $configuration) {
			$output .= sprintf('Media._columns.push({ "mData": "%s", "bSortable": %s, "bVisible": %s, "sWidth": "%s" });' . PHP_EOL,
				$fieldName,
				\TYPO3\CMS\Media\Utility\TcaGrid::getService()->isSortable($fieldName) ? 'true' : 'false',
				\TYPO3\CMS\Media\Utility\TcaGrid::getService()->isVisible($fieldName) ? 'true' : 'false',
				empty($configuration['width']) ? 'auto' : $configuration['width']
			);
		}

		return $output;
	}

}

?>