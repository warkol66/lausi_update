<?php


/**
 * Base class that represents a query for the 'lausi_circuitPoint' table.
 *
 * Puntos que conforman el perimetro de los circuitos
 *
 * @method     CircuitPointQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CircuitPointQuery orderByCircuitid($order = Criteria::ASC) Order by the circuitId column
 * @method     CircuitPointQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     CircuitPointQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 *
 * @method     CircuitPointQuery groupById() Group by the id column
 * @method     CircuitPointQuery groupByCircuitid() Group by the circuitId column
 * @method     CircuitPointQuery groupByLatitude() Group by the latitude column
 * @method     CircuitPointQuery groupByLongitude() Group by the longitude column
 *
 * @method     CircuitPointQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CircuitPointQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CircuitPointQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CircuitPointQuery leftJoinCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Circuit relation
 * @method     CircuitPointQuery rightJoinCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Circuit relation
 * @method     CircuitPointQuery innerJoinCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the Circuit relation
 *
 * @method     CircuitPoint findOne(PropelPDO $con = null) Return the first CircuitPoint matching the query
 * @method     CircuitPoint findOneOrCreate(PropelPDO $con = null) Return the first CircuitPoint matching the query, or a new CircuitPoint object populated from the query conditions when no match is found
 *
 * @method     CircuitPoint findOneById(int $id) Return the first CircuitPoint filtered by the id column
 * @method     CircuitPoint findOneByCircuitid(int $circuitId) Return the first CircuitPoint filtered by the circuitId column
 * @method     CircuitPoint findOneByLatitude(string $latitude) Return the first CircuitPoint filtered by the latitude column
 * @method     CircuitPoint findOneByLongitude(string $longitude) Return the first CircuitPoint filtered by the longitude column
 *
 * @method     array findById(int $id) Return CircuitPoint objects filtered by the id column
 * @method     array findByCircuitid(int $circuitId) Return CircuitPoint objects filtered by the circuitId column
 * @method     array findByLatitude(string $latitude) Return CircuitPoint objects filtered by the latitude column
 * @method     array findByLongitude(string $longitude) Return CircuitPoint objects filtered by the longitude column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseCircuitPointQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseCircuitPointQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'CircuitPoint', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CircuitPointQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CircuitPointQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CircuitPointQuery) {
			return $criteria;
		}
		$query = new CircuitPointQuery();
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
	 * @return    CircuitPoint|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = CircuitPointPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CircuitPointPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CircuitPointPeer::ID, $keys, Criteria::IN);
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
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CircuitPointPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the circuitId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCircuitid(1234); // WHERE circuitId = 1234
	 * $query->filterByCircuitid(array(12, 34)); // WHERE circuitId IN (12, 34)
	 * $query->filterByCircuitid(array('min' => 12)); // WHERE circuitId > 12
	 * </code>
	 *
	 * @see       filterByCircuit()
	 *
	 * @param     mixed $circuitid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByCircuitid($circuitid = null, $comparison = null)
	{
		if (is_array($circuitid)) {
			$useMinMax = false;
			if (isset($circuitid['min'])) {
				$this->addUsingAlias(CircuitPointPeer::CIRCUITID, $circuitid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($circuitid['max'])) {
				$this->addUsingAlias(CircuitPointPeer::CIRCUITID, $circuitid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CircuitPointPeer::CIRCUITID, $circuitid, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLatitude(1234); // WHERE latitude = 1234
	 * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
	 * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
	 * </code>
	 *
	 * @param     mixed $latitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(CircuitPointPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(CircuitPointPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CircuitPointPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLongitude(1234); // WHERE longitude = 1234
	 * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
	 * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
	 * </code>
	 *
	 * @param     mixed $longitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(CircuitPointPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(CircuitPointPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CircuitPointPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query by a related Circuit object
	 *
	 * @param     Circuit|PropelCollection $circuit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function filterByCircuit($circuit, $comparison = null)
	{
		if ($circuit instanceof Circuit) {
			return $this
				->addUsingAlias(CircuitPointPeer::CIRCUITID, $circuit->getId(), $comparison);
		} elseif ($circuit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CircuitPointPeer::CIRCUITID, $circuit->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CircuitPointQuery The current query, for fluid interface
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
	 * @param     CircuitPoint $circuitPoint Object to remove from the list of results
	 *
	 * @return    CircuitPointQuery The current query, for fluid interface
	 */
	public function prune($circuitPoint = null)
	{
		if ($circuitPoint) {
			$this->addUsingAlias(CircuitPointPeer::ID, $circuitPoint->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseCircuitPointQuery
