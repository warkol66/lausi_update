<?php



/**
 * Skeleton subclass for performing query and update operations on the 'lausi_theme' table.
 *
 * Base de Motivos
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lausi.classes
 */
class ThemeQuery extends BaseThemeQuery {
	public function filterByAddress($address) {
		return $this->join('Advertisement')
					->useQuery('Advertisement')
						->filterByAddress($address)
					->endUse()
					->distinct();
	}
	
	public function filterByCurrent() {
		return $this->join('Advertisement')
					->where('(CURDATE() >= lausi_advertisement.publishDate) AND (CURDATE() <= DATE_ADD(lausi_advertisement.publishDate,INTERVAL lausi_advertisement.duration DAY))');
	}
} // ThemeQuery
