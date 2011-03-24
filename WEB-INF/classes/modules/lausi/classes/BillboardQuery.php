<?php



/**
 * Skeleton subclass for performing query and update operations on the 'lausi_billboard' table.
 *
 * Base de Activos (Carteleras)
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lausi.classes
 */
class BillboardQuery extends BaseBillboardQuery {

	public function filterByAvailable($fromDate,$duration) {
		//hacemos un ordenamiento random de los resultados de la consulta
		$this->addAscendingOrderByColumn('RAND()');
		$this->join('Address', Criteria::INNER_JOIN);
		
		$this->join('Advertisement');
		$this->useQuery('Advertisement')->filterByAvailable($fromDate,$duration)->endUse();
		$this->distinct();
		
		return $this;
	}
} // BillboardQuery
