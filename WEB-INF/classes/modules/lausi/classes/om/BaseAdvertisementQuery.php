<?php


/**
 * Base class that represents a query for the 'lausi_advertisement' table.
 *
 * Base de Avisos
 *
 * @method     AdvertisementQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdvertisementQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     AdvertisementQuery orderByPublishdate($order = Criteria::ASC) Order by the publishDate column
 * @method     AdvertisementQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method     AdvertisementQuery orderByBillboardid($order = Criteria::ASC) Order by the billboardId column
 * @method     AdvertisementQuery orderByThemeid($order = Criteria::ASC) Order by the themeId column
 * @method     AdvertisementQuery orderByWorkforceid($order = Criteria::ASC) Order by the workforceId column
 *
 * @method     AdvertisementQuery groupById() Group by the id column
 * @method     AdvertisementQuery groupByDate() Group by the date column
 * @method     AdvertisementQuery groupByPublishdate() Group by the publishDate column
 * @method     AdvertisementQuery groupByDuration() Group by the duration column
 * @method     AdvertisementQuery groupByBillboardid() Group by the billboardId column
 * @method     AdvertisementQuery groupByThemeid() Group by the themeId column
 * @method     AdvertisementQuery groupByWorkforceid() Group by the workforceId column
 *
 * @method     AdvertisementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvertisementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvertisementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvertisementQuery leftJoinBillboard($relationAlias = null) Adds a LEFT JOIN clause to the query using the Billboard relation
 * @method     AdvertisementQuery rightJoinBillboard($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Billboard relation
 * @method     AdvertisementQuery innerJoinBillboard($relationAlias = null) Adds a INNER JOIN clause to the query using the Billboard relation
 *
 * @method     AdvertisementQuery leftJoinTheme($relationAlias = null) Adds a LEFT JOIN clause to the query using the Theme relation
 * @method     AdvertisementQuery rightJoinTheme($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Theme relation
 * @method     AdvertisementQuery innerJoinTheme($relationAlias = null) Adds a INNER JOIN clause to the query using the Theme relation
 *
 * @method     AdvertisementQuery leftJoinWorkforce($relationAlias = null) Adds a LEFT JOIN clause to the query using the Workforce relation
 * @method     AdvertisementQuery rightJoinWorkforce($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Workforce relation
 * @method     AdvertisementQuery innerJoinWorkforce($relationAlias = null) Adds a INNER JOIN clause to the query using the Workforce relation
 *
 * @method     Advertisement findOne(PropelPDO $con = null) Return the first Advertisement matching the query
 * @method     Advertisement findOneOrCreate(PropelPDO $con = null) Return the first Advertisement matching the query, or a new Advertisement object populated from the query conditions when no match is found
 *
 * @method     Advertisement findOneById(int $id) Return the first Advertisement filtered by the id column
 * @method     Advertisement findOneByDate(string $date) Return the first Advertisement filtered by the date column
 * @method     Advertisement findOneByPublishdate(string $publishDate) Return the first Advertisement filtered by the publishDate column
 * @method     Advertisement findOneByDuration(int $duration) Return the first Advertisement filtered by the duration column
 * @method     Advertisement findOneByBillboardid(int $billboardId) Return the first Advertisement filtered by the billboardId column
 * @method     Advertisement findOneByThemeid(int $themeId) Return the first Advertisement filtered by the themeId column
 * @method     Advertisement findOneByWorkforceid(int $workforceId) Return the first Advertisement filtered by the workforceId column
 *
 * @method     array findById(int $id) Return Advertisement objects filtered by the id column
 * @method     array findByDate(string $date) Return Advertisement objects filtered by the date column
 * @method     array findByPublishdate(string $publishDate) Return Advertisement objects filtered by the publishDate column
 * @method     array findByDuration(int $duration) Return Advertisement objects filtered by the duration column
 * @method     array findByBillboardid(int $billboardId) Return Advertisement objects filtered by the billboardId column
 * @method     array findByThemeid(int $themeId) Return Advertisement objects filtered by the themeId column
 * @method     array findByWorkforceid(int $workforceId) Return Advertisement objects filtered by the workforceId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseAdvertisementQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdvertisementQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Advertisement', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvertisementQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvertisementQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvertisementQuery) {
			return $criteria;
		}
		$query = new AdvertisementQuery();
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
	 * @return    Advertisement|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdvertisementPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdvertisementPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdvertisementPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvertisementPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the date column
	 * 
	 * @param     string|array $date The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByDate($date = null, $comparison = null)
	{
		if (is_array($date)) {
			$useMinMax = false;
			if (isset($date['min'])) {
				$this->addUsingAlias(AdvertisementPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($date['max'])) {
				$this->addUsingAlias(AdvertisementPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::DATE, $date, $comparison);
	}

	/**
	 * Filter the query on the publishDate column
	 * 
	 * @param     string|array $publishdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByPublishdate($publishdate = null, $comparison = null)
	{
		if (is_array($publishdate)) {
			$useMinMax = false;
			if (isset($publishdate['min'])) {
				$this->addUsingAlias(AdvertisementPeer::PUBLISHDATE, $publishdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($publishdate['max'])) {
				$this->addUsingAlias(AdvertisementPeer::PUBLISHDATE, $publishdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::PUBLISHDATE, $publishdate, $comparison);
	}

	/**
	 * Filter the query on the duration column
	 * 
	 * @param     int|array $duration The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByDuration($duration = null, $comparison = null)
	{
		if (is_array($duration)) {
			$useMinMax = false;
			if (isset($duration['min'])) {
				$this->addUsingAlias(AdvertisementPeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($duration['max'])) {
				$this->addUsingAlias(AdvertisementPeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::DURATION, $duration, $comparison);
	}

	/**
	 * Filter the query on the billboardId column
	 * 
	 * @param     int|array $billboardid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByBillboardid($billboardid = null, $comparison = null)
	{
		if (is_array($billboardid)) {
			$useMinMax = false;
			if (isset($billboardid['min'])) {
				$this->addUsingAlias(AdvertisementPeer::BILLBOARDID, $billboardid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($billboardid['max'])) {
				$this->addUsingAlias(AdvertisementPeer::BILLBOARDID, $billboardid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::BILLBOARDID, $billboardid, $comparison);
	}

	/**
	 * Filter the query on the themeId column
	 * 
	 * @param     int|array $themeid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByThemeid($themeid = null, $comparison = null)
	{
		if (is_array($themeid)) {
			$useMinMax = false;
			if (isset($themeid['min'])) {
				$this->addUsingAlias(AdvertisementPeer::THEMEID, $themeid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($themeid['max'])) {
				$this->addUsingAlias(AdvertisementPeer::THEMEID, $themeid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::THEMEID, $themeid, $comparison);
	}

	/**
	 * Filter the query on the workforceId column
	 * 
	 * @param     int|array $workforceid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByWorkforceid($workforceid = null, $comparison = null)
	{
		if (is_array($workforceid)) {
			$useMinMax = false;
			if (isset($workforceid['min'])) {
				$this->addUsingAlias(AdvertisementPeer::WORKFORCEID, $workforceid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($workforceid['max'])) {
				$this->addUsingAlias(AdvertisementPeer::WORKFORCEID, $workforceid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvertisementPeer::WORKFORCEID, $workforceid, $comparison);
	}

	/**
	 * Filter the query by a related Billboard object
	 *
	 * @param     Billboard|PropelCollection $billboard The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByBillboard($billboard, $comparison = null)
	{
		if ($billboard instanceof Billboard) {
			return $this
				->addUsingAlias(AdvertisementPeer::BILLBOARDID, $billboard->getId(), $comparison);
		} elseif ($billboard instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvertisementPeer::BILLBOARDID, $billboard->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvertisementQuery The current query, for fluid interface
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
	 * Filter the query by a related Theme object
	 *
	 * @param     Theme|PropelCollection $theme The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByTheme($theme, $comparison = null)
	{
		if ($theme instanceof Theme) {
			return $this
				->addUsingAlias(AdvertisementPeer::THEMEID, $theme->getId(), $comparison);
		} elseif ($theme instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvertisementPeer::THEMEID, $theme->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTheme() only accepts arguments of type Theme or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Theme relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function joinTheme($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Theme');
		
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
			$this->addJoinObject($join, 'Theme');
		}
		
		return $this;
	}

	/**
	 * Use the Theme relation Theme object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ThemeQuery A secondary query class using the current class as primary query
	 */
	public function useThemeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTheme($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Theme', 'ThemeQuery');
	}

	/**
	 * Filter the query by a related Workforce object
	 *
	 * @param     Workforce|PropelCollection $workforce The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function filterByWorkforce($workforce, $comparison = null)
	{
		if ($workforce instanceof Workforce) {
			return $this
				->addUsingAlias(AdvertisementPeer::WORKFORCEID, $workforce->getId(), $comparison);
		} elseif ($workforce instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvertisementPeer::WORKFORCEID, $workforce->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function joinWorkforce($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useWorkforceQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinWorkforce($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Workforce', 'WorkforceQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Advertisement $advertisement Object to remove from the list of results
	 *
	 * @return    AdvertisementQuery The current query, for fluid interface
	 */
	public function prune($advertisement = null)
	{
		if ($advertisement) {
			$this->addUsingAlias(AdvertisementPeer::ID, $advertisement->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdvertisementQuery
