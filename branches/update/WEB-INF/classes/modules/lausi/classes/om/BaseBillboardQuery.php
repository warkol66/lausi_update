<?php


/**
 * Base class that represents a query for the 'lausi_billboard' table.
 *
 * Base de Activos (Carteleras)
 *
 * @method     BillboardQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     BillboardQuery orderByNumber($order = Criteria::ASC) Order by the number column
 * @method     BillboardQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     BillboardQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method     BillboardQuery orderByRow($order = Criteria::ASC) Order by the row column
 * @method     BillboardQuery orderByBillboardcolumn($order = Criteria::ASC) Order by the billboardColumn column
 * @method     BillboardQuery orderByAddressid($order = Criteria::ASC) Order by the addressId column
 *
 * @method     BillboardQuery groupById() Group by the id column
 * @method     BillboardQuery groupByNumber() Group by the number column
 * @method     BillboardQuery groupByType() Group by the type column
 * @method     BillboardQuery groupByHeight() Group by the height column
 * @method     BillboardQuery groupByRow() Group by the row column
 * @method     BillboardQuery groupByBillboardcolumn() Group by the billboardColumn column
 * @method     BillboardQuery groupByAddressid() Group by the addressId column
 *
 * @method     BillboardQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BillboardQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BillboardQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     BillboardQuery leftJoinAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the Address relation
 * @method     BillboardQuery rightJoinAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Address relation
 * @method     BillboardQuery innerJoinAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the Address relation
 *
 * @method     BillboardQuery leftJoinAdvertisement($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advertisement relation
 * @method     BillboardQuery rightJoinAdvertisement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advertisement relation
 * @method     BillboardQuery innerJoinAdvertisement($relationAlias = null) Adds a INNER JOIN clause to the query using the Advertisement relation
 *
 * @method     Billboard findOne(PropelPDO $con = null) Return the first Billboard matching the query
 * @method     Billboard findOneOrCreate(PropelPDO $con = null) Return the first Billboard matching the query, or a new Billboard object populated from the query conditions when no match is found
 *
 * @method     Billboard findOneById(int $id) Return the first Billboard filtered by the id column
 * @method     Billboard findOneByNumber(int $number) Return the first Billboard filtered by the number column
 * @method     Billboard findOneByType(int $type) Return the first Billboard filtered by the type column
 * @method     Billboard findOneByHeight(boolean $height) Return the first Billboard filtered by the height column
 * @method     Billboard findOneByRow(int $row) Return the first Billboard filtered by the row column
 * @method     Billboard findOneByBillboardcolumn(int $billboardColumn) Return the first Billboard filtered by the billboardColumn column
 * @method     Billboard findOneByAddressid(int $addressId) Return the first Billboard filtered by the addressId column
 *
 * @method     array findById(int $id) Return Billboard objects filtered by the id column
 * @method     array findByNumber(int $number) Return Billboard objects filtered by the number column
 * @method     array findByType(int $type) Return Billboard objects filtered by the type column
 * @method     array findByHeight(boolean $height) Return Billboard objects filtered by the height column
 * @method     array findByRow(int $row) Return Billboard objects filtered by the row column
 * @method     array findByBillboardcolumn(int $billboardColumn) Return Billboard objects filtered by the billboardColumn column
 * @method     array findByAddressid(int $addressId) Return Billboard objects filtered by the addressId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseBillboardQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBillboardQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Billboard', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BillboardQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BillboardQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BillboardQuery) {
			return $criteria;
		}
		$query = new BillboardQuery();
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
	 * @return    Billboard|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BillboardPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BillboardPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BillboardPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BillboardPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the number column
	 * 
	 * @param     int|array $number The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByNumber($number = null, $comparison = null)
	{
		if (is_array($number)) {
			$useMinMax = false;
			if (isset($number['min'])) {
				$this->addUsingAlias(BillboardPeer::NUMBER, $number['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($number['max'])) {
				$this->addUsingAlias(BillboardPeer::NUMBER, $number['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BillboardPeer::NUMBER, $number, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(BillboardPeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(BillboardPeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BillboardPeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the height column
	 * 
	 * @param     boolean|string $height The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByHeight($height = null, $comparison = null)
	{
		if (is_string($height)) {
			$height = in_array(strtolower($height), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(BillboardPeer::HEIGHT, $height, $comparison);
	}

	/**
	 * Filter the query on the row column
	 * 
	 * @param     int|array $row The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByRow($row = null, $comparison = null)
	{
		if (is_array($row)) {
			$useMinMax = false;
			if (isset($row['min'])) {
				$this->addUsingAlias(BillboardPeer::ROW, $row['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($row['max'])) {
				$this->addUsingAlias(BillboardPeer::ROW, $row['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BillboardPeer::ROW, $row, $comparison);
	}

	/**
	 * Filter the query on the billboardColumn column
	 * 
	 * @param     int|array $billboardcolumn The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByBillboardcolumn($billboardcolumn = null, $comparison = null)
	{
		if (is_array($billboardcolumn)) {
			$useMinMax = false;
			if (isset($billboardcolumn['min'])) {
				$this->addUsingAlias(BillboardPeer::BILLBOARDCOLUMN, $billboardcolumn['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($billboardcolumn['max'])) {
				$this->addUsingAlias(BillboardPeer::BILLBOARDCOLUMN, $billboardcolumn['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BillboardPeer::BILLBOARDCOLUMN, $billboardcolumn, $comparison);
	}

	/**
	 * Filter the query on the addressId column
	 * 
	 * @param     int|array $addressid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByAddressid($addressid = null, $comparison = null)
	{
		if (is_array($addressid)) {
			$useMinMax = false;
			if (isset($addressid['min'])) {
				$this->addUsingAlias(BillboardPeer::ADDRESSID, $addressid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($addressid['max'])) {
				$this->addUsingAlias(BillboardPeer::ADDRESSID, $addressid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(BillboardPeer::ADDRESSID, $addressid, $comparison);
	}

	/**
	 * Filter the query by a related Address object
	 *
	 * @param     Address|PropelCollection $address The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByAddress($address, $comparison = null)
	{
		if ($address instanceof Address) {
			return $this
				->addUsingAlias(BillboardPeer::ADDRESSID, $address->getId(), $comparison);
		} elseif ($address instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(BillboardPeer::ADDRESSID, $address->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    BillboardQuery The current query, for fluid interface
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
	 * Filter the query by a related Advertisement object
	 *
	 * @param     Advertisement $advertisement  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function filterByAdvertisement($advertisement, $comparison = null)
	{
		if ($advertisement instanceof Advertisement) {
			return $this
				->addUsingAlias(BillboardPeer::ID, $advertisement->getBillboardid(), $comparison);
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
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function joinAdvertisement($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useAdvertisementQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvertisement($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Advertisement', 'AdvertisementQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Billboard $billboard Object to remove from the list of results
	 *
	 * @return    BillboardQuery The current query, for fluid interface
	 */
	public function prune($billboard = null)
	{
		if ($billboard) {
			$this->addUsingAlias(BillboardPeer::ID, $billboard->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBillboardQuery
