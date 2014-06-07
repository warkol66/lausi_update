<?php


/**
 * Base class that represents a query for the 'lausi_circuit' table.
 *
 * Base de Circuitos
 *
 * @method     CircuitQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CircuitQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     CircuitQuery orderByAbbreviation($order = Criteria::ASC) Order by the abbreviation column
 * @method     CircuitQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     CircuitQuery orderByLimitsdescription($order = Criteria::ASC) Order by the limitsDescription column
 * @method     CircuitQuery orderByOrderby($order = Criteria::ASC) Order by the orderBy column
 * @method     CircuitQuery orderByColor($order = Criteria::ASC) Order by the color column
 *
 * @method     CircuitQuery groupById() Group by the id column
 * @method     CircuitQuery groupByName() Group by the name column
 * @method     CircuitQuery groupByAbbreviation() Group by the abbreviation column
 * @method     CircuitQuery groupByDescription() Group by the description column
 * @method     CircuitQuery groupByLimitsdescription() Group by the limitsDescription column
 * @method     CircuitQuery groupByOrderby() Group by the orderBy column
 * @method     CircuitQuery groupByColor() Group by the color column
 *
 * @method     CircuitQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CircuitQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CircuitQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CircuitQuery leftJoinCircuitPoint($relationAlias = null) Adds a LEFT JOIN clause to the query using the CircuitPoint relation
 * @method     CircuitQuery rightJoinCircuitPoint($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CircuitPoint relation
 * @method     CircuitQuery innerJoinCircuitPoint($relationAlias = null) Adds a INNER JOIN clause to the query using the CircuitPoint relation
 *
 * @method     CircuitQuery leftJoinWorkforceCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the WorkforceCircuit relation
 * @method     CircuitQuery rightJoinWorkforceCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WorkforceCircuit relation
 * @method     CircuitQuery innerJoinWorkforceCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the WorkforceCircuit relation
 *
 * @method     CircuitQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method     CircuitQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method     CircuitQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method     CircuitQuery leftJoinDeletedAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the DeletedAddress relation
 * @method     CircuitQuery rightJoinDeletedAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DeletedAddress relation
 * @method     CircuitQuery innerJoinDeletedAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the DeletedAddress relation
 *
 * @method     CircuitQuery leftJoinClientAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientAddress relation
 * @method     CircuitQuery rightJoinClientAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientAddress relation
 * @method     CircuitQuery innerJoinClientAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientAddress relation
 *
 * @method     Circuit findOne(PropelPDO $con = null) Return the first Circuit matching the query
 * @method     Circuit findOneOrCreate(PropelPDO $con = null) Return the first Circuit matching the query, or a new Circuit object populated from the query conditions when no match is found
 *
 * @method     Circuit findOneById(int $id) Return the first Circuit filtered by the id column
 * @method     Circuit findOneByName(string $name) Return the first Circuit filtered by the name column
 * @method     Circuit findOneByAbbreviation(string $abbreviation) Return the first Circuit filtered by the abbreviation column
 * @method     Circuit findOneByDescription(string $description) Return the first Circuit filtered by the description column
 * @method     Circuit findOneByLimitsdescription(string $limitsDescription) Return the first Circuit filtered by the limitsDescription column
 * @method     Circuit findOneByOrderby(int $orderBy) Return the first Circuit filtered by the orderBy column
 * @method     Circuit findOneByColor(string $color) Return the first Circuit filtered by the color column
 *
 * @method     array findById(int $id) Return Circuit objects filtered by the id column
 * @method     array findByName(string $name) Return Circuit objects filtered by the name column
 * @method     array findByAbbreviation(string $abbreviation) Return Circuit objects filtered by the abbreviation column
 * @method     array findByDescription(string $description) Return Circuit objects filtered by the description column
 * @method     array findByLimitsdescription(string $limitsDescription) Return Circuit objects filtered by the limitsDescription column
 * @method     array findByOrderby(int $orderBy) Return Circuit objects filtered by the orderBy column
 * @method     array findByColor(string $color) Return Circuit objects filtered by the color column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseCircuitQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCircuitQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Circuit', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CircuitQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CircuitQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CircuitQuery) {
			return $criteria;
		}
		$query = new CircuitQuery();
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
	 * @return    Circuit|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CircuitPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CircuitPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CircuitPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CircuitPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CircuitPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the abbreviation column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAbbreviation('fooValue');   // WHERE abbreviation = 'fooValue'
	 * $query->filterByAbbreviation('%fooValue%'); // WHERE abbreviation LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $abbreviation The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByAbbreviation($abbreviation = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($abbreviation)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $abbreviation)) {
				$abbreviation = str_replace('*', '%', $abbreviation);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CircuitPeer::ABBREVIATION, $abbreviation, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $description The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CircuitPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the limitsDescription column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLimitsdescription('fooValue');   // WHERE limitsDescription = 'fooValue'
	 * $query->filterByLimitsdescription('%fooValue%'); // WHERE limitsDescription LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $limitsdescription The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByLimitsdescription($limitsdescription = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($limitsdescription)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $limitsdescription)) {
				$limitsdescription = str_replace('*', '%', $limitsdescription);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CircuitPeer::LIMITSDESCRIPTION, $limitsdescription, $comparison);
	}

	/**
	 * Filter the query on the orderBy column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByOrderby(1234); // WHERE orderBy = 1234
	 * $query->filterByOrderby(array(12, 34)); // WHERE orderBy IN (12, 34)
	 * $query->filterByOrderby(array('min' => 12)); // WHERE orderBy > 12
	 * </code>
	 *
	 * @param     mixed $orderby The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByOrderby($orderby = null, $comparison = null)
	{
		if (is_array($orderby)) {
			$useMinMax = false;
			if (isset($orderby['min'])) {
				$this->addUsingAlias(CircuitPeer::ORDERBY, $orderby['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($orderby['max'])) {
				$this->addUsingAlias(CircuitPeer::ORDERBY, $orderby['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CircuitPeer::ORDERBY, $orderby, $comparison);
	}

	/**
	 * Filter the query on the color column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByColor('fooValue');   // WHERE color = 'fooValue'
	 * $query->filterByColor('%fooValue%'); // WHERE color LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $color The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByColor($color = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($color)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $color)) {
				$color = str_replace('*', '%', $color);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CircuitPeer::COLOR, $color, $comparison);
	}

	/**
	 * Filter the query by a related CircuitPoint object
	 *
	 * @param     CircuitPoint $circuitPoint  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByCircuitPoint($circuitPoint, $comparison = null)
	{
		if ($circuitPoint instanceof CircuitPoint) {
			return $this
				->addUsingAlias(CircuitPeer::ID, $circuitPoint->getCircuitid(), $comparison);
		} elseif ($circuitPoint instanceof PropelCollection) {
			return $this
				->useCircuitPointQuery()
					->filterByPrimaryKeys($circuitPoint->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCircuitPoint() only accepts arguments of type CircuitPoint or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CircuitPoint relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function joinCircuitPoint($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CircuitPoint');
		
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
			$this->addJoinObject($join, 'CircuitPoint');
		}
		
		return $this;
	}

	/**
	 * Use the CircuitPoint relation CircuitPoint object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitPointQuery A secondary query class using the current class as primary query
	 */
	public function useCircuitPointQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCircuitPoint($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CircuitPoint', 'CircuitPointQuery');
	}

	/**
	 * Filter the query by a related WorkforceCircuit object
	 *
	 * @param     WorkforceCircuit $workforceCircuit  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByWorkforceCircuit($workforceCircuit, $comparison = null)
	{
		if ($workforceCircuit instanceof WorkforceCircuit) {
			return $this
				->addUsingAlias(CircuitPeer::ID, $workforceCircuit->getCircuitid(), $comparison);
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
	 * @return    CircuitQuery The current query, for fluid interface
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
	 * Filter the query by a related Address object
	 *
	 * @param     Address $address  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByAddress($address, $comparison = null)
	{
		if ($address instanceof Address) {
			return $this
				->addUsingAlias(CircuitPeer::ID, $address->getCircuitid(), $comparison);
		} elseif ($address instanceof PropelCollection) {
			return $this
				->useAddressQuery()
					->filterByPrimaryKeys($address->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAddress() only accepts arguments of type Address or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Address relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function joinAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Address');
		
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
			$this->addJoinObject($join, 'Address');
		}
		
		return $this;
	}

	/**
	 * Use the Address relation Address object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressQuery A secondary query class using the current class as primary query
	 */
	public function useAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAddress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Address', 'AddressQuery');
	}

	/**
	 * Filter the query by a related DeletedAddress object
	 *
	 * @param     DeletedAddress $deletedAddress  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByDeletedAddress($deletedAddress, $comparison = null)
	{
		if ($deletedAddress instanceof DeletedAddress) {
			return $this
				->addUsingAlias(CircuitPeer::ID, $deletedAddress->getCircuitid(), $comparison);
		} elseif ($deletedAddress instanceof PropelCollection) {
			return $this
				->useDeletedAddressQuery()
					->filterByPrimaryKeys($deletedAddress->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByDeletedAddress() only accepts arguments of type DeletedAddress or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the DeletedAddress relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function joinDeletedAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DeletedAddress');
		
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
			$this->addJoinObject($join, 'DeletedAddress');
		}
		
		return $this;
	}

	/**
	 * Use the DeletedAddress relation DeletedAddress object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DeletedAddressQuery A secondary query class using the current class as primary query
	 */
	public function useDeletedAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDeletedAddress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DeletedAddress', 'DeletedAddressQuery');
	}

	/**
	 * Filter the query by a related ClientAddress object
	 *
	 * @param     ClientAddress $clientAddress  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByClientAddress($clientAddress, $comparison = null)
	{
		if ($clientAddress instanceof ClientAddress) {
			return $this
				->addUsingAlias(CircuitPeer::ID, $clientAddress->getCircuitid(), $comparison);
		} elseif ($clientAddress instanceof PropelCollection) {
			return $this
				->useClientAddressQuery()
					->filterByPrimaryKeys($clientAddress->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByClientAddress() only accepts arguments of type ClientAddress or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ClientAddress relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function joinClientAddress($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientAddress');
		
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
			$this->addJoinObject($join, 'ClientAddress');
		}
		
		return $this;
	}

	/**
	 * Use the ClientAddress relation ClientAddress object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientAddressQuery A secondary query class using the current class as primary query
	 */
	public function useClientAddressQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinClientAddress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientAddress', 'ClientAddressQuery');
	}

	/**
	 * Filter the query by a related Workforce object
	 * using the lausi_workforceCircuit table as cross reference
	 *
	 * @param     Workforce $workforce the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function filterByWorkforce($workforce, $comparison = Criteria::EQUAL)
	{
		return $this
			->useWorkforceCircuitQuery()
				->filterByWorkforce($workforce, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Circuit $circuit Object to remove from the list of results
	 *
	 * @return    CircuitQuery The current query, for fluid interface
	 */
	public function prune($circuit = null)
	{
		if ($circuit) {
			$this->addUsingAlias(CircuitPeer::ID, $circuit->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCircuitQuery
