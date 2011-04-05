<?php


/**
 * Base class that represents a query for the 'lausi_clientAddress' table.
 *
 * Base de Direcciones de Clientes
 *
 * @method     ClientAddressQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientAddressQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ClientAddressQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     ClientAddressQuery orderByIntersection($order = Criteria::ASC) Order by the intersection column
 * @method     ClientAddressQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     ClientAddressQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     ClientAddressQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ClientAddressQuery orderByCircuitid($order = Criteria::ASC) Order by the circuitId column
 * @method     ClientAddressQuery orderByClientid($order = Criteria::ASC) Order by the clientId column
 * @method     ClientAddressQuery orderByRegionid($order = Criteria::ASC) Order by the regionId column
 *
 * @method     ClientAddressQuery groupById() Group by the id column
 * @method     ClientAddressQuery groupByStreet() Group by the street column
 * @method     ClientAddressQuery groupByNumber() Group by the number column
 * @method     ClientAddressQuery groupByIntersection() Group by the intersection column
 * @method     ClientAddressQuery groupByLatitude() Group by the latitude column
 * @method     ClientAddressQuery groupByLongitude() Group by the longitude column
 * @method     ClientAddressQuery groupByType() Group by the type column
 * @method     ClientAddressQuery groupByCircuitid() Group by the circuitId column
 * @method     ClientAddressQuery groupByClientid() Group by the clientId column
 * @method     ClientAddressQuery groupByRegionid() Group by the regionId column
 *
 * @method     ClientAddressQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientAddressQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientAddressQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientAddressQuery leftJoinCircuit($relationAlias = null) Adds a LEFT JOIN clause to the query using the Circuit relation
 * @method     ClientAddressQuery rightJoinCircuit($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Circuit relation
 * @method     ClientAddressQuery innerJoinCircuit($relationAlias = null) Adds a INNER JOIN clause to the query using the Circuit relation
 *
 * @method     ClientAddressQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     ClientAddressQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     ClientAddressQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     ClientAddressQuery leftJoinRegion($relationAlias = null) Adds a LEFT JOIN clause to the query using the Region relation
 * @method     ClientAddressQuery rightJoinRegion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Region relation
 * @method     ClientAddressQuery innerJoinRegion($relationAlias = null) Adds a INNER JOIN clause to the query using the Region relation
 *
 * @method     ClientAddress findOne(PropelPDO $con = null) Return the first ClientAddress matching the query
 * @method     ClientAddress findOneOrCreate(PropelPDO $con = null) Return the first ClientAddress matching the query, or a new ClientAddress object populated from the query conditions when no match is found
 *
 * @method     ClientAddress findOneById(int $id) Return the first ClientAddress filtered by the id column
 * @method     ClientAddress findOneByStreet(string $street) Return the first ClientAddress filtered by the street column
 * @method     ClientAddress findOneByNumber(int $number) Return the first ClientAddress filtered by the number column
 * @method     ClientAddress findOneByIntersection(string $intersection) Return the first ClientAddress filtered by the intersection column
 * @method     ClientAddress findOneByLatitude(string $latitude) Return the first ClientAddress filtered by the latitude column
 * @method     ClientAddress findOneByLongitude(string $longitude) Return the first ClientAddress filtered by the longitude column
 * @method     ClientAddress findOneByType(string $type) Return the first ClientAddress filtered by the type column
 * @method     ClientAddress findOneByCircuitid(int $circuitId) Return the first ClientAddress filtered by the circuitId column
 * @method     ClientAddress findOneByClientid(int $clientId) Return the first ClientAddress filtered by the clientId column
 * @method     ClientAddress findOneByRegionid(int $regionId) Return the first ClientAddress filtered by the regionId column
 *
 * @method     array findById(int $id) Return ClientAddress objects filtered by the id column
 * @method     array findByStreet(string $street) Return ClientAddress objects filtered by the street column
 * @method     array findByNumber(int $number) Return ClientAddress objects filtered by the number column
 * @method     array findByIntersection(string $intersection) Return ClientAddress objects filtered by the intersection column
 * @method     array findByLatitude(string $latitude) Return ClientAddress objects filtered by the latitude column
 * @method     array findByLongitude(string $longitude) Return ClientAddress objects filtered by the longitude column
 * @method     array findByType(string $type) Return ClientAddress objects filtered by the type column
 * @method     array findByCircuitid(int $circuitId) Return ClientAddress objects filtered by the circuitId column
 * @method     array findByClientid(int $clientId) Return ClientAddress objects filtered by the clientId column
 * @method     array findByRegionid(int $regionId) Return ClientAddress objects filtered by the regionId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseClientAddressQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientAddressQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ClientAddress', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientAddressQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientAddressQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientAddressQuery) {
			return $criteria;
		}
		$query = new ClientAddressQuery();
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
	 * @return    ClientAddress|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientAddressPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientAddressPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientAddressPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientAddressPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the street column
	 * 
	 * @param     string $street The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientAddressPeer::STREET, $street, $comparison);
	}

	/**
	 * Filter the query on the number column
	 * 
	 * @param     int|array $number The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(ClientAddressPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(ClientAddressPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::NUMBER, $number, $comparison);
	}

	/**
	 * Filter the query on the intersection column
	 * 
	 * @param     string $intersection The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientAddressPeer::INTERSECTION, $intersection, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 * 
	 * @param     string|array $latitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(ClientAddressPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(ClientAddressPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 * 
	 * @param     string|array $longitude The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(ClientAddressPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(ClientAddressPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     string $type The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($type)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $type)) {
				$type = str_replace('*', '%', $type);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the circuitId column
	 * 
	 * @param     int|array $circuitid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByCircuitid($circuitid = null, $comparison = null)
	{
		if (is_array($circuitid)) {
			$useMinMax = false;
			if (isset($circuitid['min'])) {
				$this->addUsingAlias(ClientAddressPeer::CIRCUITID, $circuitid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($circuitid['max'])) {
				$this->addUsingAlias(ClientAddressPeer::CIRCUITID, $circuitid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::CIRCUITID, $circuitid, $comparison);
	}

	/**
	 * Filter the query on the clientId column
	 * 
	 * @param     int|array $clientid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByClientid($clientid = null, $comparison = null)
	{
		if (is_array($clientid)) {
			$useMinMax = false;
			if (isset($clientid['min'])) {
				$this->addUsingAlias(ClientAddressPeer::CLIENTID, $clientid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientid['max'])) {
				$this->addUsingAlias(ClientAddressPeer::CLIENTID, $clientid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::CLIENTID, $clientid, $comparison);
	}

	/**
	 * Filter the query on the regionId column
	 * 
	 * @param     int|array $regionid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByRegionid($regionid = null, $comparison = null)
	{
		if (is_array($regionid)) {
			$useMinMax = false;
			if (isset($regionid['min'])) {
				$this->addUsingAlias(ClientAddressPeer::REGIONID, $regionid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($regionid['max'])) {
				$this->addUsingAlias(ClientAddressPeer::REGIONID, $regionid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientAddressPeer::REGIONID, $regionid, $comparison);
	}

	/**
	 * Filter the query by a related Circuit object
	 *
	 * @param     Circuit|PropelCollection $circuit The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByCircuit($circuit, $comparison = null)
	{
		if ($circuit instanceof Circuit) {
			return $this
				->addUsingAlias(ClientAddressPeer::CIRCUITID, $circuit->getId(), $comparison);
		} elseif ($circuit instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClientAddressPeer::CIRCUITID, $circuit->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClientAddressQuery The current query, for fluid interface
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
	 * Filter the query by a related Client object
	 *
	 * @param     Client|PropelCollection $client The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByClient($client, $comparison = null)
	{
		if ($client instanceof Client) {
			return $this
				->addUsingAlias(ClientAddressPeer::CLIENTID, $client->getId(), $comparison);
		} elseif ($client instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClientAddressPeer::CLIENTID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByClient() only accepts arguments of type Client or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Client relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function joinClient($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Client');
		
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
			$this->addJoinObject($join, 'Client');
		}
		
		return $this;
	}

	/**
	 * Use the Client relation Client object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuery A secondary query class using the current class as primary query
	 */
	public function useClientQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClient($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Client', 'ClientQuery');
	}

	/**
	 * Filter the query by a related Region object
	 *
	 * @param     Region|PropelCollection $region The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function filterByRegion($region, $comparison = null)
	{
		if ($region instanceof Region) {
			return $this
				->addUsingAlias(ClientAddressPeer::REGIONID, $region->getId(), $comparison);
		} elseif ($region instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClientAddressPeer::REGIONID, $region->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClientAddressQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     ClientAddress $clientAddress Object to remove from the list of results
	 *
	 * @return    ClientAddressQuery The current query, for fluid interface
	 */
	public function prune($clientAddress = null)
	{
		if ($clientAddress) {
			$this->addUsingAlias(ClientAddressPeer::ID, $clientAddress->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientAddressQuery
