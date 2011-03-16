<?php


/**
 * Base class that represents a query for the 'lausi_workforceCircuit' table.
 *
 * 
 *
 * @method     WorkforceCircuitQuery orderByWorkforceid($order = Criteria::ASC) Order by the workforceId column
 * @method     WorkforceCircuitQuery orderByCircuitid($order = Criteria::ASC) Order by the circuitId column
 *
 * @method     WorkforceCircuitQuery groupByWorkforceid() Group by the workforceId column
 * @method     WorkforceCircuitQuery groupByCircuitid() Group by the circuitId column
 *
 * @method     WorkforceCircuitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     WorkforceCircuitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     WorkforceCircuitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     WorkforceCircuitQuery leftJoinWorkforce($relationAlias = null) Adds a LEFT JOIN clause to the query using the Workforce relation
 * @method     WorkforceCircuitQuery rightJoinWorkforce($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Workforce relation
 * @method     WorkforceCircuitQuery innerJoinWorkforce($relationAlias = null) Adds a INNER JOIN clause to the query using the Workforce relation
 *
 * @method     WorkforceCircuitQuery leftJoinCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Circuit relation
 * @method     WorkforceCircuitQuery rightJoinCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Circuit relation
 * @method     WorkforceCircuitQuery innerJoinCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the Circuit relation
 *
 * @method     WorkforceCircuit findOne(PropelPDO $con = null) Return the first WorkforceCircuit matching the query
 * @method     WorkforceCircuit findOneOrCreate(PropelPDO $con = null) Return the first WorkforceCircuit matching the query, or a new WorkforceCircuit object populated from the query conditions when no match is found
 *
 * @method     WorkforceCircuit findOneByWorkforceid(int $workforceId) Return the first WorkforceCircuit filtered by the workforceId column
 * @method     WorkforceCircuit findOneByCircuitid(int $circuitId) Return the first WorkforceCircuit filtered by the circuitId column
 *
 * @method     array findByWorkforceid(int $workforceId) Return WorkforceCircuit objects filtered by the workforceId column
 * @method     array findByCircuitid(int $circuitId) Return WorkforceCircuit objects filtered by the circuitId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseWorkforceCircuitQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseWorkforceCircuitQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'WorkforceCircuit', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new WorkforceCircuitQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    WorkforceCircuitQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof WorkforceCircuitQuery) {
			return $criteria;
		}
		$query = new WorkforceCircuitQuery();
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
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$workforceId, $circuitId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    WorkforceCircuit|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = WorkforceCircuitPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(WorkforceCircuitPeer::WORKFORCEID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(WorkforceCircuitPeer::CIRCUITID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(WorkforceCircuitPeer::WORKFORCEID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(WorkforceCircuitPeer::CIRCUITID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the workforceId column
	 * 
	 * @param     int|array $workforceid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByWorkforceid($workforceid = null, $comparison = null)
	{
		if (is_array($workforceid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(WorkforceCircuitPeer::WORKFORCEID, $workforceid, $comparison);
	}

	/**
	 * Filter the query on the circuitId column
	 * 
	 * @param     int|array $circuitid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByCircuitid($circuitid = null, $comparison = null)
	{
		if (is_array($circuitid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(WorkforceCircuitPeer::CIRCUITID, $circuitid, $comparison);
	}

	/**
	 * Filter the query by a related Workforce object
	 *
	 * @param     Workforce|PropelCollection $workforce The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByWorkforce($workforce, $comparison = null)
	{
		if ($workforce instanceof Workforce) {
			return $this
				->addUsingAlias(WorkforceCircuitPeer::WORKFORCEID, $workforce->getId(), $comparison);
		} elseif ($workforce instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(WorkforceCircuitPeer::WORKFORCEID, $workforce->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByWorkforce() only accepts arguments of type Workforce or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Workforce relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function joinWorkforce($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Workforce');
		
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
			$this->addJoinObject($join, 'Workforce');
		}
		
		return $this;
	}

	/**
	 * Use the Workforce relation Workforce object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceQuery A secondary query class using the current class as primary query
	 */
	public function useWorkforceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinWorkforce($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Workforce', 'WorkforceQuery');
	}

	/**
	 * Filter the query by a related Circuit object
	 *
	 * @param     Circuit|PropelCollection $circuit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function filterByCircuit($circuit, $comparison = null)
	{
		if ($circuit instanceof Circuit) {
			return $this
				->addUsingAlias(WorkforceCircuitPeer::CIRCUITID, $circuit->getId(), $comparison);
		} elseif ($circuit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(WorkforceCircuitPeer::CIRCUITID, $circuit->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCircuit() only accepts arguments of type Circuit or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Circuit relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function joinCircuit($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Circuit');
		
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
			$this->addJoinObject($join, 'Circuit');
		}
		
		return $this;
	}

	/**
	 * Use the Circuit relation Circuit object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitQuery A secondary query class using the current class as primary query
	 */
	public function useCircuitQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCircuit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Circuit', 'CircuitQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     WorkforceCircuit $workforceCircuit Object to remove from the list of results
	 *
	 * @return    WorkforceCircuitQuery The current query, for fluid interface
	 */
	public function prune($workforceCircuit = null)
	{
		if ($workforceCircuit) {
			$this->addCond('pruneCond0', $this->getAliasedColName(WorkforceCircuitPeer::WORKFORCEID), $workforceCircuit->getWorkforceid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(WorkforceCircuitPeer::CIRCUITID), $workforceCircuit->getCircuitid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseWorkforceCircuitQuery
