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
 * @method     AddressQuery orderByEnumeration($order = Criteria::ASC) Order by the enumeration column
 * @method     AddressQuery orderByCreationdate($order = Criteria::ASC) Order by the creationDate column
 * @method     AddressQuery orderByDeletiondate($order = Criteria::ASC) Order by the deletionDate column
 * @method     AddressQuery orderByHasgrille($order = Criteria::ASC) Order by the hasGrille column
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
 * @method     AddressQuery groupByEnumeration() Group by the enumeration column
 * @method     AddressQuery groupByCreationdate() Group by the creationDate column
 * @method     AddressQuery groupByDeletiondate() Group by the deletionDate column
 * @method     AddressQuery groupByHasgrille() Group by the hasGrille column
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
 * @method     AddressQuery leftJoinAddressPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the AddressPhoto relation
 * @method     AddressQuery rightJoinAddressPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AddressPhoto relation
 * @method     AddressQuery innerJoinAddressPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the AddressPhoto relation
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
 * @method     Address findOneByEnumeration(string $enumeration) Return the first Address filtered by the enumeration column
 * @method     Address findOneByCreationdate(string $creationDate) Return the first Address filtered by the creationDate column
 * @method     Address findOneByDeletiondate(string $deletionDate) Return the first Address filtered by the deletionDate column
 * @method     Address findOneByHasgrille(boolean $hasGrille) Return the first Address filtered by the hasGrille column
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
 * @method     array findByEnumeration(string $enumeration) Return Address objects filtered by the enumeration column
 * @method     array findByCreationdate(string $creationDate) Return Address objects filtered by the creationDate column
 * @method     array findByDeletiondate(string $deletionDate) Return Address objects filtered by the deletionDate column
 * @method     array findByHasgrille(boolean $hasGrille) Return Address objects filtered by the hasGrille column
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
	 * Example usage:
	 * <code>
	 * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
	 * $query->filterByStreet('%fooValue%'); // WHERE street LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $street The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Example usage:
	 * <code>
	 * $query->filterByNumber(1234); // WHERE number = 1234
	 * $query->filterByNumber(array(12, 34)); // WHERE number IN (12, 34)
	 * $query->filterByNumber(array('min' => 12)); // WHERE number > 12
	 * </code>
	 *
	 * @param     mixed $number The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByRating(1234); // WHERE rating = 1234
	 * $query->filterByRating(array(12, 34)); // WHERE rating IN (12, 34)
	 * $query->filterByRating(array('min' => 12)); // WHERE rating > 12
	 * </code>
	 *
	 * @param     mixed $rating The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByIntersection('fooValue');   // WHERE intersection = 'fooValue'
	 * $query->filterByIntersection('%fooValue%'); // WHERE intersection LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $intersection The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Example usage:
	 * <code>
	 * $query->filterByOwner('fooValue');   // WHERE owner = 'fooValue'
	 * $query->filterByOwner('%fooValue%'); // WHERE owner LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $owner The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Example usage:
	 * <code>
	 * $query->filterByRegionid(1234); // WHERE regionId = 1234
	 * $query->filterByRegionid(array(12, 34)); // WHERE regionId IN (12, 34)
	 * $query->filterByRegionid(array('min' => 12)); // WHERE regionId > 12
	 * </code>
	 *
	 * @see       filterByRegion()
	 *
	 * @param     mixed $regionid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByOwnerphone('fooValue');   // WHERE ownerPhone = 'fooValue'
	 * $query->filterByOwnerphone('%fooValue%'); // WHERE ownerPhone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ownerphone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Example usage:
	 * <code>
	 * $query->filterByOrdercircuit(1234); // WHERE orderCircuit = 1234
	 * $query->filterByOrdercircuit(array(12, 34)); // WHERE orderCircuit IN (12, 34)
	 * $query->filterByOrdercircuit(array('min' => 12)); // WHERE orderCircuit > 12
	 * </code>
	 *
	 * @param     mixed $ordercircuit The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByNickname('fooValue');   // WHERE nickname = 'fooValue'
	 * $query->filterByNickname('%fooValue%'); // WHERE nickname LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nickname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
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
	 * Filter the query on the enumeration column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEnumeration('fooValue');   // WHERE enumeration = 'fooValue'
	 * $query->filterByEnumeration('%fooValue%'); // WHERE enumeration LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $enumeration The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByEnumeration($enumeration = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($enumeration)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $enumeration)) {
				$enumeration = str_replace('*', '%', $enumeration);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AddressPeer::ENUMERATION, $enumeration, $comparison);
	}

	/**
	 * Filter the query on the creationDate column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByCreationdate('2011-03-14'); // WHERE creationDate = '2011-03-14'
	 * $query->filterByCreationdate('now'); // WHERE creationDate = '2011-03-14'
	 * $query->filterByCreationdate(array('max' => 'yesterday')); // WHERE creationDate > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $creationdate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByCreationdate($creationdate = null, $comparison = null)
	{
		if (is_array($creationdate)) {
			$useMinMax = false;
			if (isset($creationdate['min'])) {
				$this->addUsingAlias(AddressPeer::CREATIONDATE, $creationdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($creationdate['max'])) {
				$this->addUsingAlias(AddressPeer::CREATIONDATE, $creationdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::CREATIONDATE, $creationdate, $comparison);
	}

	/**
	 * Filter the query on the deletionDate column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByDeletiondate('2011-03-14'); // WHERE deletionDate = '2011-03-14'
	 * $query->filterByDeletiondate('now'); // WHERE deletionDate = '2011-03-14'
	 * $query->filterByDeletiondate(array('max' => 'yesterday')); // WHERE deletionDate > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $deletiondate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByDeletiondate($deletiondate = null, $comparison = null)
	{
		if (is_array($deletiondate)) {
			$useMinMax = false;
			if (isset($deletiondate['min'])) {
				$this->addUsingAlias(AddressPeer::DELETIONDATE, $deletiondate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($deletiondate['max'])) {
				$this->addUsingAlias(AddressPeer::DELETIONDATE, $deletiondate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AddressPeer::DELETIONDATE, $deletiondate, $comparison);
	}

	/**
	 * Filter the query on the hasGrille column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByHasgrille(true); // WHERE hasGrille = true
	 * $query->filterByHasgrille('yes'); // WHERE hasGrille = true
	 * </code>
	 *
	 * @param     boolean|string $hasgrille The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByHasgrille($hasgrille = null, $comparison = null)
	{
		if (is_string($hasgrille)) {
			$hasGrille = in_array(strtolower($hasgrille), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(AddressPeer::HASGRILLE, $hasgrille, $comparison);
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
	 * Filter the query by a related AddressPhoto object
	 *
	 * @param     AddressPhoto $addressPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByAddressPhoto($addressPhoto, $comparison = null)
	{
		if ($addressPhoto instanceof AddressPhoto) {
			return $this
				->addUsingAlias(AddressPeer::ID, $addressPhoto->getAddressid(), $comparison);
		} elseif ($addressPhoto instanceof PropelCollection) {
			return $this
				->useAddressPhotoQuery()
					->filterByPrimaryKeys($addressPhoto->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAddressPhoto() only accepts arguments of type AddressPhoto or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AddressPhoto relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function joinAddressPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AddressPhoto');
		
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
			$this->addJoinObject($join, 'AddressPhoto');
		}
		
		return $this;
	}

	/**
	 * Use the AddressPhoto relation AddressPhoto object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressPhotoQuery A secondary query class using the current class as primary query
	 */
	public function useAddressPhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAddressPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AddressPhoto', 'AddressPhotoQuery');
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
	 * Filter the query by a related Photo object
	 * using the lausi_addressPhotos table as cross reference
	 *
	 * @param     Photo $photo the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAddressPhotoQuery()
				->filterByPhoto($photo, $comparison)
			->endUse();
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
