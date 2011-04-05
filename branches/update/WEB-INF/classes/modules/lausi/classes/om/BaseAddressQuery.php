<?php


/**
 * Base class that represents a query for the 'lausi_address' table.
 *
 * Base de Direcciones
 *
 * @method     AddressQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AddressQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     AddressQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     AddressQuery orderByRating($order = Criteria::ASC) Order by the rating column
 * @method     AddressQuery orderByIntersection($order = Criteria::ASC) Order by the intersection column
 * @method     AddressQuery orderByOwner($order = Criteria::ASC) Order by the owner column
 * @method     AddressQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     AddressQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     AddressQuery orderByRegionid($order = Criteria::ASC) Order by the regionId column
 * @method     AddressQuery orderByOwnerphone($order = Criteria::ASC) Order by the ownerPhone column
 * @method     AddressQuery orderByOrdercircuit($order = Criteria::ASC) Order by the orderCircuit column
 * @method     AddressQuery orderByNickname($order = Criteria::ASC) Order by the nickname column
 * @method     AddressQuery orderByCircuitid($order = Criteria::ASC) Order by the circuitId column
 *
 * @method     AddressQuery groupById() Group by the id column
 * @method     AddressQuery groupByStreet() Group by the street column
 * @method     AddressQuery groupByNumber() Group by the number column
 * @method     AddressQuery groupByRating() Group by the rating column
 * @method     AddressQuery groupByIntersection() Group by the intersection column
 * @method     AddressQuery groupByOwner() Group by the owner column
 * @method     AddressQuery groupByLatitude() Group by the latitude column
 * @method     AddressQuery groupByLongitude() Group by the longitude column
 * @method     AddressQuery groupByRegionid() Group by the regionId column
 * @method     AddressQuery groupByOwnerphone() Group by the ownerPhone column
 * @method     AddressQuery groupByOrdercircuit() Group by the orderCircuit column
 * @method     AddressQuery groupByNickname() Group by the nickname column
 * @method     AddressQuery groupByCircuitid() Group by the circuitId column
 *
 * @method     AddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AddressQuery leftJoinCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Circuit relation
 * @method     AddressQuery rightJoinCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Circuit relation
 * @method     AddressQuery innerJoinCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the Circuit relation
 *
 * @method     AddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method     AddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method     AddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method     AddressQuery leftJoinBillboard($relationAlias = null) Adds a LEFT JOIN clause to the query using the Billboard relation
 * @method     AddressQuery rightJoinBillboard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Billboard relation
 * @method     AddressQuery innerJoinBillboard($relationAlias = null) Adds a INNER JOIN clause to the query using the Billboard relation
 *
 * @method     Address findOne(PropelPDO $con = null) Return the first Address matching the query
 * @method     Address findOneOrCreate(PropelPDO $con = null) Return the first Address matching the query, or a new Address object populated from the query conditions when no match is found
 *
 * @method     Address findOneById(int $id) Return the first Address filtered by the id column
 * @method     Address findOneByStreet(string $street) Return the first Address filtered by the street column
 * @method     Address findOneByNumber(int $number) Return the first Address filtered by the number column
 * @method     Address findOneByRating(int $rating) Return the first Address filtered by the rating column
 * @method     Address findOneByIntersection(string $intersection) Return the first Address filtered by the intersection column
 * @method     Address findOneByOwner(string $owner) Return the first Address filtered by the owner column
 * @method     Address findOneByLatitude(string $latitude) Return the first Address filtered by the latitude column
 * @method     Address findOneByLongitude(string $longitude) Return the first Address filtered by the longitude column
 * @method     Address findOneByRegionid(int $regionId) Return the first Address filtered by the regionId column
 * @method     Address findOneByOwnerphone(string $ownerPhone) Return the first Address filtered by the ownerPhone column
 * @method     Address findOneByOrdercircuit(int $orderCircuit) Return the first Address filtered by the orderCircuit column
 * @method     Address findOneByNickname(string $nickname) Return the first Address filtered by the nickname column
 * @method     Address findOneByCircuitid(int $circuitId) Return the first Address filtered by the circuitId column
 *
 * @method     array findById(int $id) Return Address objects filtered by the id column
 * @method     array findByStreet(string $street) Return Address objects filtered by the street column
 * @method     array findByNumber(int $number) Return Address objects filtered by the number column
 * @method     array findByRating(int $rating) Return Address objects filtered by the rating column
 * @method     array findByIntersection(string $intersection) Return Address objects filtered by the intersection column
 * @method     array findByOwner(string $owner) Return Address objects filtered by the owner column
 * @method     array findByLatitude(string $latitude) Return Address objects filtered by the latitude column
 * @method     array findByLongitude(string $longitude) Return Address objects filtered by the longitude column
 * @method     array findByRegionid(int $regionId) Return Address objects filtered by the regionId column
 * @method     array findByOwnerphone(string $ownerPhone) Return Address objects filtered by the ownerPhone column
 * @method     array findByOrdercircuit(int $orderCircuit) Return Address objects filtered by the orderCircuit column
 * @method     array findByNickname(string $nickname) Return Address objects filtered by the nickname column
 * @method     array findByCircuitid(int $circuitId) Return Address objects filtered by the circuitId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseAddressQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAddressQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Address', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AddressQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AddressQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AddressQuery) {
			return $criteria;
		}
		$query = new AddressQuery();
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
	 * @return    Address|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AddressPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AddressPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AddressPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AddressPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the street column
	 * 
	 * @param     string $street The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByStreet($street = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($street)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $street)) {
				$street = str_replace('*', '%', $street);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::STREET, $street, $comparison);
	}

	/**
	 * Filter the query on the number column
	 * 
	 * @param     int|array $number The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(AddressPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(AddressPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::NUMBER, $number, $comparison);
	}

	/**
	 * Filter the query on the rating column
	 * 
	 * @param     int|array $rating The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByRating($rating = null, $comparison = null)
	{
		if (is_array($rating)) {
			$useMinMax = false;
			if (isset($rating['min'])) {
				$this->addUsingAlias(AddressPeer::RATING, $rating['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rating['max'])) {
				$this->addUsingAlias(AddressPeer::RATING, $rating['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::RATING, $rating, $comparison);
	}

	/**
	 * Filter the query on the intersection column
	 * 
	 * @param     string $intersection The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByIntersection($intersection = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($intersection)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $intersection)) {
				$intersection = str_replace('*', '%', $intersection);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::INTERSECTION, $intersection, $comparison);
	}

	/**
	 * Filter the query on the owner column
	 * 
	 * @param     string $owner The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByOwner($owner = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($owner)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $owner)) {
				$owner = str_replace('*', '%', $owner);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::OWNER, $owner, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 * 
	 * @param     string|array $latitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(AddressPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(AddressPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 * 
	 * @param     string|array $longitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(AddressPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(AddressPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the regionId column
	 * 
	 * @param     int|array $regionid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByRegionid($regionid = null, $comparison = null)
	{
		if (is_array($regionid)) {
			$useMinMax = false;
			if (isset($regionid['min'])) {
				$this->addUsingAlias(AddressPeer::REGIONID, $regionid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($regionid['max'])) {
				$this->addUsingAlias(AddressPeer::REGIONID, $regionid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::REGIONID, $regionid, $comparison);
	}

	/**
	 * Filter the query on the ownerPhone column
	 * 
	 * @param     string $ownerphone The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByOwnerphone($ownerphone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ownerphone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ownerphone)) {
				$ownerphone = str_replace('*', '%', $ownerphone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::OWNERPHONE, $ownerphone, $comparison);
	}

	/**
	 * Filter the query on the orderCircuit column
	 * 
	 * @param     int|array $ordercircuit The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByOrdercircuit($ordercircuit = null, $comparison = null)
	{
		if (is_array($ordercircuit)) {
			$useMinMax = false;
			if (isset($ordercircuit['min'])) {
				$this->addUsingAlias(AddressPeer::ORDERCIRCUIT, $ordercircuit['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ordercircuit['max'])) {
				$this->addUsingAlias(AddressPeer::ORDERCIRCUIT, $ordercircuit['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::ORDERCIRCUIT, $ordercircuit, $comparison);
	}

	/**
	 * Filter the query on the nickname column
	 * 
	 * @param     string $nickname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByNickname($nickname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nickname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nickname)) {
				$nickname = str_replace('*', '%', $nickname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::NICKNAME, $nickname, $comparison);
	}

	/**
	 * Filter the query on the circuitId column
	 * 
	 * @param     int|array $circuitid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByCircuitid($circuitid = null, $comparison = null)
	{
		if (is_array($circuitid)) {
			$useMinMax = false;
			if (isset($circuitid['min'])) {
				$this->addUsingAlias(AddressPeer::CIRCUITID, $circuitid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($circuitid['max'])) {
				$this->addUsingAlias(AddressPeer::CIRCUITID, $circuitid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::CIRCUITID, $circuitid, $comparison);
	}

	/**
	 * Filter the query by a related Circuit object
	 *
	 * @param     Circuit|PropelCollection $circuit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByCircuit($circuit, $comparison = null)
	{
		if ($circuit instanceof Circuit) {
			return $this
				->addUsingAlias(AddressPeer::CIRCUITID, $circuit->getId(), $comparison);
		} elseif ($circuit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AddressPeer::CIRCUITID, $circuit->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function joinCircuit($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useCircuitQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCircuit($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Circuit', 'CircuitQuery');
	}

	/**
	 * Filter the query by a related Region object
	 *
	 * @param     Region|PropelCollection $region The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByRegion($region, $comparison = null)
	{
		if ($region instanceof Region) {
			return $this
				->addUsingAlias(AddressPeer::REGIONID, $region->getId(), $comparison);
		} elseif ($region instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AddressPeer::REGIONID, $region->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByRegion() only accepts arguments of type Region or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Region relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function joinRegion($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Region');
		
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
			$this->addJoinObject($join, 'Region');
		}
		
		return $this;
	}

	/**
	 * Use the Region relation Region object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RegionQuery A secondary query class using the current class as primary query
	 */
	public function useRegionQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRegion($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Region', 'RegionQuery');
	}

	/**
	 * Filter the query by a related Billboard object
	 *
	 * @param     Billboard $billboard  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByBillboard($billboard, $comparison = null)
	{
		if ($billboard instanceof Billboard) {
			return $this
				->addUsingAlias(AddressPeer::ID, $billboard->getAddressid(), $comparison);
		} elseif ($billboard instanceof PropelCollection) {
			return $this
				->useBillboardQuery()
					->filterByPrimaryKeys($billboard->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByBillboard() only accepts arguments of type Billboard or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Billboard relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function joinBillboard($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Billboard');
		
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
			$this->addJoinObject($join, 'Billboard');
		}
		
		return $this;
	}

	/**
	 * Use the Billboard relation Billboard object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    BillboardQuery A secondary query class using the current class as primary query
	 */
	public function useBillboardQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinBillboard($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Billboard', 'BillboardQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Address $address Object to remove from the list of results
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function prune($address = null)
	{
		if ($address) {
			$this->addUsingAlias(AddressPeer::ID, $address->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAddressQuery
