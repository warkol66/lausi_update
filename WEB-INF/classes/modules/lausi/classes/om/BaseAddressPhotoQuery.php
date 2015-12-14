<?php


/**
 * Base class that represents a query for the 'lausi_addressPhotos' table.
 *
 * 
 *
 * @method     AddressPhotoQuery orderByAddressid($order = Criteria::ASC) Order by the addressId column
 * @method     AddressPhotoQuery orderByPhotoid($order = Criteria::ASC) Order by the photoId column
 *
 * @method     AddressPhotoQuery groupByAddressid() Group by the addressId column
 * @method     AddressPhotoQuery groupByPhotoid() Group by the photoId column
 *
 * @method     AddressPhotoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AddressPhotoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AddressPhotoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AddressPhotoQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method     AddressPhotoQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method     AddressPhotoQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method     AddressPhotoQuery leftJoinPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Photo relation
 * @method     AddressPhotoQuery rightJoinPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Photo relation
 * @method     AddressPhotoQuery innerJoinPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Photo relation
 *
 * @method     AddressPhoto findOne(PropelPDO $con = null) Return the first AddressPhoto matching the query
 * @method     AddressPhoto findOneOrCreate(PropelPDO $con = null) Return the first AddressPhoto matching the query, or a new AddressPhoto object populated from the query conditions when no match is found
 *
 * @method     AddressPhoto findOneByAddressid(int $addressId) Return the first AddressPhoto filtered by the addressId column
 * @method     AddressPhoto findOneByPhotoid(int $photoId) Return the first AddressPhoto filtered by the photoId column
 *
 * @method     array findByAddressid(int $addressId) Return AddressPhoto objects filtered by the addressId column
 * @method     array findByPhotoid(int $photoId) Return AddressPhoto objects filtered by the photoId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseAddressPhotoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAddressPhotoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AddressPhoto', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AddressPhotoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AddressPhotoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AddressPhotoQuery) {
			return $criteria;
		}
		$query = new AddressPhotoQuery();
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
	 * @param     array[$addressId, $photoId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AddressPhoto|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AddressPhotoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AddressPhotoPeer::ADDRESSID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AddressPhotoPeer::PHOTOID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AddressPhotoPeer::ADDRESSID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AddressPhotoPeer::PHOTOID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the addressId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAddressid(1234); // WHERE addressId = 1234
	 * $query->filterByAddressid(array(12, 34)); // WHERE addressId IN (12, 34)
	 * $query->filterByAddressid(array('min' => 12)); // WHERE addressId > 12
	 * </code>
	 *
	 * @see       filterByAddress()
	 *
	 * @param     mixed $addressid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByAddressid($addressid = null, $comparison = null)
	{
		if (is_array($addressid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AddressPhotoPeer::ADDRESSID, $addressid, $comparison);
	}

	/**
	 * Filter the query on the photoId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByPhotoid(1234); // WHERE photoId = 1234
	 * $query->filterByPhotoid(array(12, 34)); // WHERE photoId IN (12, 34)
	 * $query->filterByPhotoid(array('min' => 12)); // WHERE photoId > 12
	 * </code>
	 *
	 * @see       filterByPhoto()
	 *
	 * @param     mixed $photoid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhotoid($photoid = null, $comparison = null)
	{
		if (is_array($photoid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AddressPhotoPeer::PHOTOID, $photoid, $comparison);
	}

	/**
	 * Filter the query by a related Address object
	 *
	 * @param     Address|PropelCollection $address The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByAddress($address, $comparison = null)
	{
		if ($address instanceof Address) {
			return $this
				->addUsingAlias(AddressPhotoPeer::ADDRESSID, $address->getId(), $comparison);
		} elseif ($address instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AddressPhotoPeer::ADDRESSID, $address->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function joinAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAddress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Address', 'AddressQuery');
	}

	/**
	 * Filter the query by a related Photo object
	 *
	 * @param     Photo|PropelCollection $photo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function filterByPhoto($photo, $comparison = null)
	{
		if ($photo instanceof Photo) {
			return $this
				->addUsingAlias(AddressPhotoPeer::PHOTOID, $photo->getId(), $comparison);
		} elseif ($photo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AddressPhotoPeer::PHOTOID, $photo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPhoto() only accepts arguments of type Photo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Photo relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function joinPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Photo');
		
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
			$this->addJoinObject($join, 'Photo');
		}
		
		return $this;
	}

	/**
	 * Use the Photo relation Photo object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotoQuery A secondary query class using the current class as primary query
	 */
	public function usePhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPhoto($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Photo', 'PhotoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AddressPhoto $addressPhoto Object to remove from the list of results
	 *
	 * @return    AddressPhotoQuery The current query, for fluid interface
	 */
	public function prune($addressPhoto = null)
	{
		if ($addressPhoto) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AddressPhotoPeer::ADDRESSID), $addressPhoto->getAddressid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AddressPhotoPeer::PHOTOID), $addressPhoto->getPhotoid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseAddressPhotoQuery
