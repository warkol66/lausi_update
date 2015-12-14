<?php


/**
 * Base class that represents a query for the 'lausi_photo' table.
 *
 * Base de Fotos
 *
 * @method     PhotoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PhotoQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     PhotoQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     PhotoQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 *
 * @method     PhotoQuery groupById() Group by the id column
 * @method     PhotoQuery groupByName() Group by the name column
 * @method     PhotoQuery groupByType() Group by the type column
 * @method     PhotoQuery groupByFilename() Group by the filename column
 *
 * @method     PhotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PhotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PhotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PhotoQuery leftJoinAddressPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the AddressPhoto relation
 * @method     PhotoQuery rightJoinAddressPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AddressPhoto relation
 * @method     PhotoQuery innerJoinAddressPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the AddressPhoto relation
 *
 * @method     Photo findOne(PropelPDO $con = null) Return the first Photo matching the query
 * @method     Photo findOneOrCreate(PropelPDO $con = null) Return the first Photo matching the query, or a new Photo object populated from the query conditions when no match is found
 *
 * @method     Photo findOneById(int $id) Return the first Photo filtered by the id column
 * @method     Photo findOneByName(string $name) Return the first Photo filtered by the name column
 * @method     Photo findOneByType(string $type) Return the first Photo filtered by the type column
 * @method     Photo findOneByFilename(string $filename) Return the first Photo filtered by the filename column
 *
 * @method     array findById(int $id) Return Photo objects filtered by the id column
 * @method     array findByName(string $name) Return Photo objects filtered by the name column
 * @method     array findByType(string $type) Return Photo objects filtered by the type column
 * @method     array findByFilename(string $filename) Return Photo objects filtered by the filename column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BasePhotoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePhotoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Photo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PhotoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhotoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhotoQuery) {
			return $criteria;
		}
		$query = new PhotoQuery();
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
	 * @return    Photo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PhotoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PhotoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PhotoPeer::ID, $keys, Criteria::IN);
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
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PhotoPeer::ID, $id, $comparison);
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
	 * @return    PhotoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PhotoPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
	 * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $type The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PhotoPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the filename column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByFilename('fooValue');   // WHERE filename = 'fooValue'
	 * $query->filterByFilename('%fooValue%'); // WHERE filename LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $filename The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByFilename($filename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($filename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $filename)) {
				$filename = str_replace('*', '%', $filename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PhotoPeer::FILENAME, $filename, $comparison);
	}

	/**
	 * Filter the query by a related AddressPhoto object
	 *
	 * @param     AddressPhoto $addressPhoto  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByAddressPhoto($addressPhoto, $comparison = null)
	{
		if ($addressPhoto instanceof AddressPhoto) {
			return $this
				->addUsingAlias(PhotoPeer::ID, $addressPhoto->getPhotoid(), $comparison);
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
	 * @return    PhotoQuery The current query, for fluid interface
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
	 * Filter the query by a related Address object
	 * using the lausi_addressPhotos table as cross reference
	 *
	 * @param     Address $address the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function filterByAddress($address, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAddressPhotoQuery()
				->filterByAddress($address, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Photo $photo Object to remove from the list of results
	 *
	 * @return    PhotoQuery The current query, for fluid interface
	 */
	public function prune($photo = null)
	{
		if ($photo) {
			$this->addUsingAlias(PhotoPeer::ID, $photo->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePhotoQuery
