<?php


/**
 * Base class that represents a query for the 'lausi_workforce' table.
 *
 * Base de Fuerza de Trabajo
 *
 * @method     WorkforceQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     WorkforceQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     WorkforceQuery orderByTelephone($order = Criteria::ASC) Order by the telephone column
 * @method     WorkforceQuery orderByWorkinheight($order = Criteria::ASC) Order by the workInHeight column
 * @method     WorkforceQuery orderByDeletedAt($order = Criteria::ASC) Order by the deleted_at column
 *
 * @method     WorkforceQuery groupById() Group by the id column
 * @method     WorkforceQuery groupByName() Group by the name column
 * @method     WorkforceQuery groupByTelephone() Group by the telephone column
 * @method     WorkforceQuery groupByWorkinheight() Group by the workInHeight column
 * @method     WorkforceQuery groupByDeletedAt() Group by the deleted_at column
 *
 * @method     WorkforceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WorkforceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WorkforceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WorkforceQuery leftJoinWorkforceCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the WorkforceCircuit relation
 * @method     WorkforceQuery rightJoinWorkforceCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WorkforceCircuit relation
 * @method     WorkforceQuery innerJoinWorkforceCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the WorkforceCircuit relation
 *
 * @method     WorkforceQuery leftJoinAdvertisement($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advertisement relation
 * @method     WorkforceQuery rightJoinAdvertisement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advertisement relation
 * @method     WorkforceQuery innerJoinAdvertisement($relationAlias = null) Adds a INNER JOIN clause to the query using the Advertisement relation
 *
 * @method     Workforce findOne(PropelPDO $con = null) Return the first Workforce matching the query
 * @method     Workforce findOneOrCreate(PropelPDO $con = null) Return the first Workforce matching the query, or a new Workforce object populated from the query conditions when no match is found
 *
 * @method     Workforce findOneById(int $id) Return the first Workforce filtered by the id column
 * @method     Workforce findOneByName(string $name) Return the first Workforce filtered by the name column
 * @method     Workforce findOneByTelephone(string $telephone) Return the first Workforce filtered by the telephone column
 * @method     Workforce findOneByWorkinheight(boolean $workInHeight) Return the first Workforce filtered by the workInHeight column
 * @method     Workforce findOneByDeletedAt(string $deleted_at) Return the first Workforce filtered by the deleted_at column
 *
 * @method     array findById(int $id) Return Workforce objects filtered by the id column
 * @method     array findByName(string $name) Return Workforce objects filtered by the name column
 * @method     array findByTelephone(string $telephone) Return Workforce objects filtered by the telephone column
 * @method     array findByWorkinheight(boolean $workInHeight) Return Workforce objects filtered by the workInHeight column
 * @method     array findByDeletedAt(string $deleted_at) Return Workforce objects filtered by the deleted_at column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseWorkforceQuery extends ModelCriteria
{

	// soft_delete behavior
	protected static $softDelete = true;
	protected $localSoftDelete = true;

	/**
	 * Initializes internal state of BaseWorkforceQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Workforce', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WorkforceQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WorkforceQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WorkforceQuery) {
			return $criteria;
		}
		$query = new WorkforceQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Workforce|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WorkforcePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(WorkforcePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(WorkforcePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(WorkforcePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WorkforcePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the telephone column
	 * 
	 * @param     string $telephone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByTelephone($telephone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telephone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telephone)) {
				$telephone = str_replace('*', '%', $telephone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(WorkforcePeer::TELEPHONE, $telephone, $comparison);
	}

	/**
	 * Filter the query on the workInHeight column
	 * 
	 * @param     boolean|string $workinheight The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByWorkinheight($workinheight = null, $comparison = null)
	{
		if (is_string($workinheight)) {
			$workInHeight = in_array(strtolower($workinheight), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(WorkforcePeer::WORKINHEIGHT, $workinheight, $comparison);
	}

	/**
	 * Filter the query on the deleted_at column
	 * 
	 * @param     string|array $deletedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByDeletedAt($deletedAt = null, $comparison = null)
	{
		if (is_array($deletedAt)) {
			$useMinMax = false;
			if (isset($deletedAt['min'])) {
				$this->addUsingAlias(WorkforcePeer::DELETED_AT, $deletedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletedAt['max'])) {
				$this->addUsingAlias(WorkforcePeer::DELETED_AT, $deletedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(WorkforcePeer::DELETED_AT, $deletedAt, $comparison);
	}

	/**
	 * Filter the query by a related WorkforceCircuit object
	 *
	 * @param     WorkforceCircuit $workforceCircuit  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByWorkforceCircuit($workforceCircuit, $comparison = null)
	{
		if ($workforceCircuit instanceof WorkforceCircuit) {
			return $this
				->addUsingAlias(WorkforcePeer::ID, $workforceCircuit->getWorkforceid(), $comparison);
		} elseif ($workforceCircuit instanceof PropelCollection) {
			return $this
				->useWorkforceCircuitQuery()
					->filterByPrimaryKeys($workforceCircuit->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByWorkforceCircuit() only accepts arguments of type WorkforceCircuit or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the WorkforceCircuit relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function joinWorkforceCircuit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('WorkforceCircuit');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'WorkforceCircuit');
		}
		
		return $this;
	}

	/**
	 * Use the WorkforceCircuit relation WorkforceCircuit object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceCircuitQuery A secondary query class using the current class as primary query
	 */
	public function useWorkforceCircuitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWorkforceCircuit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'WorkforceCircuit', 'WorkforceCircuitQuery');
	}

	/**
	 * Filter the query by a related Advertisement object
	 *
	 * @param     Advertisement $advertisement  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function filterByAdvertisement($advertisement, $comparison = null)
	{
		if ($advertisement instanceof Advertisement) {
			return $this
				->addUsingAlias(WorkforcePeer::ID, $advertisement->getWorkforceid(), $comparison);
		} elseif ($advertisement instanceof PropelCollection) {
			return $this
				->useAdvertisementQuery()
					->filterByPrimaryKeys($advertisement->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdvertisement() only accepts arguments of type Advertisement or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Advertisement relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function joinAdvertisement($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Advertisement');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Advertisement');
		}
		
		return $this;
	}

	/**
	 * Use the Advertisement relation Advertisement object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvertisementQuery A secondary query class using the current class as primary query
	 */
	public function useAdvertisementQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdvertisement($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Advertisement', 'AdvertisementQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Workforce $workforce Object to remove from the list of results
	 *
	 * @return    WorkforceQuery The current query, for fluid interface
	 */
	public function prune($workforce = null)
	{
		if ($workforce) {
			$this->addUsingAlias(WorkforcePeer::ID, $workforce->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	/**
	 * Code to execute before every SELECT statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreSelect(PropelPDO $con)
	{
		// soft_delete behavior
		if (WorkforceQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			$this->addUsingAlias(WorkforcePeer::DELETED_AT, null, Criteria::ISNULL);
		} else {
			WorkforcePeer::enableSoftDelete();
		}
		
		return $this->preSelect($con);
	}

	/**
	 * Code to execute before every DELETE statement
	 * 
	 * @param     PropelPDO $con The connection object used by the query
	 */
	protected function basePreDelete(PropelPDO $con)
	{
		// soft_delete behavior
		if (WorkforceQuery::isSoftDeleteEnabled() && $this->localSoftDelete) {
			return $this->softDelete($con);
		} else {
			return $this->hasWhereClause() ? $this->forceDelete($con) : $this->forceDeleteAll($con);
		}
		
		return $this->preDelete($con);
	}

	// soft_delete behavior
	
	/**
	 * Temporarily disable the filter on deleted rows
	 * Valid only for the current query
	 * 
	 * @see WorkforceQuery::disableSoftDelete() to disable the filter for more than one query
	 *
	 * @return WorkforceQuery The current query, for fluid interface
	 */
	public function includeDeleted()
	{
		$this->localSoftDelete = false;
		return $this;
	}
	
	/**
	 * Soft delete the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of updated rows
	 */
	public function softDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => time()), $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		return WorkforcePeer::doForceDelete($this, $con);
	}
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of all the rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int Number of deleted rows
	 */
	public function forceDeleteAll(PropelPDO $con = null)
	{
		return WorkforcePeer::doForceDeleteAll($con);}
	
	/**
	 * Undelete selected rows
	 *
	 * @param			PropelPDO $con an optional connection object
	 *
	 * @return		int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		return $this->update(array('DeletedAt' => null), $con);
	}
		
	/**
	 * Enable the soft_delete behavior for this model
	 */
	public static function enableSoftDelete()
	{
		self::$softDelete = true;
	}
	
	/**
	 * Disable the soft_delete behavior for this model
	 */
	public static function disableSoftDelete()
	{
		self::$softDelete = false;
	}
	
	/**
	 * Check the soft_delete behavior for this model
	 *
	 * @return boolean true if the soft_delete behavior is enabled
	 */
	public static function isSoftDeleteEnabled()
	{
		return self::$softDelete;
	}

} // BaseWorkforceQuery
