<?php


/**
 * Base class that represents a query for the 'lausi_theme' table.
 *
 * Base de Motivos
 *
 * @method     ThemeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ThemeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ThemeQuery orderByShortname($order = Criteria::ASC) Order by the shortName column
 * @method     ThemeQuery orderByStartdate($order = Criteria::ASC) Order by the startDate column
 * @method     ThemeQuery orderByDuration($order = Criteria::ASC) Order by the duration column
 * @method     ThemeQuery orderBySheetstotal($order = Criteria::ASC) Order by the sheetsTotal column
 * @method     ThemeQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ThemeQuery orderByActive($order = Criteria::ASC) Order by the active column
 * @method     ThemeQuery orderByClientid($order = Criteria::ASC) Order by the clientId column
 *
 * @method     ThemeQuery groupById() Group by the id column
 * @method     ThemeQuery groupByName() Group by the name column
 * @method     ThemeQuery groupByShortname() Group by the shortName column
 * @method     ThemeQuery groupByStartdate() Group by the startDate column
 * @method     ThemeQuery groupByDuration() Group by the duration column
 * @method     ThemeQuery groupBySheetstotal() Group by the sheetsTotal column
 * @method     ThemeQuery groupByType() Group by the type column
 * @method     ThemeQuery groupByActive() Group by the active column
 * @method     ThemeQuery groupByClientid() Group by the clientId column
 *
 * @method     ThemeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ThemeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ThemeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ThemeQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     ThemeQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     ThemeQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     ThemeQuery leftJoinAdvertisement($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advertisement relation
 * @method     ThemeQuery rightJoinAdvertisement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advertisement relation
 * @method     ThemeQuery innerJoinAdvertisement($relationAlias = null) Adds a INNER JOIN clause to the query using the Advertisement relation
 *
 * @method     Theme findOne(PropelPDO $con = null) Return the first Theme matching the query
 * @method     Theme findOneOrCreate(PropelPDO $con = null) Return the first Theme matching the query, or a new Theme object populated from the query conditions when no match is found
 *
 * @method     Theme findOneById(int $id) Return the first Theme filtered by the id column
 * @method     Theme findOneByName(string $name) Return the first Theme filtered by the name column
 * @method     Theme findOneByShortname(string $shortName) Return the first Theme filtered by the shortName column
 * @method     Theme findOneByStartdate(string $startDate) Return the first Theme filtered by the startDate column
 * @method     Theme findOneByDuration(int $duration) Return the first Theme filtered by the duration column
 * @method     Theme findOneBySheetstotal(int $sheetsTotal) Return the first Theme filtered by the sheetsTotal column
 * @method     Theme findOneByType(int $type) Return the first Theme filtered by the type column
 * @method     Theme findOneByActive(boolean $active) Return the first Theme filtered by the active column
 * @method     Theme findOneByClientid(int $clientId) Return the first Theme filtered by the clientId column
 *
 * @method     array findById(int $id) Return Theme objects filtered by the id column
 * @method     array findByName(string $name) Return Theme objects filtered by the name column
 * @method     array findByShortname(string $shortName) Return Theme objects filtered by the shortName column
 * @method     array findByStartdate(string $startDate) Return Theme objects filtered by the startDate column
 * @method     array findByDuration(int $duration) Return Theme objects filtered by the duration column
 * @method     array findBySheetstotal(int $sheetsTotal) Return Theme objects filtered by the sheetsTotal column
 * @method     array findByType(int $type) Return Theme objects filtered by the type column
 * @method     array findByActive(boolean $active) Return Theme objects filtered by the active column
 * @method     array findByClientid(int $clientId) Return Theme objects filtered by the clientId column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseThemeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseThemeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Theme', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ThemeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ThemeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ThemeQuery) {
			return $criteria;
		}
		$query = new ThemeQuery();
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
	 * @return    Theme|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ThemePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ThemePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ThemePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ThemePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ThemePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the shortName column
	 * 
	 * @param     string $shortname The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByShortname($shortname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($shortname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $shortname)) {
				$shortname = str_replace('*', '%', $shortname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ThemePeer::SHORTNAME, $shortname, $comparison);
	}

	/**
	 * Filter the query on the startDate column
	 * 
	 * @param     string|array $startdate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByStartdate($startdate = null, $comparison = null)
	{
		if (is_array($startdate)) {
			$useMinMax = false;
			if (isset($startdate['min'])) {
				$this->addUsingAlias(ThemePeer::STARTDATE, $startdate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startdate['max'])) {
				$this->addUsingAlias(ThemePeer::STARTDATE, $startdate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThemePeer::STARTDATE, $startdate, $comparison);
	}

	/**
	 * Filter the query on the duration column
	 * 
	 * @param     int|array $duration The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByDuration($duration = null, $comparison = null)
	{
		if (is_array($duration)) {
			$useMinMax = false;
			if (isset($duration['min'])) {
				$this->addUsingAlias(ThemePeer::DURATION, $duration['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($duration['max'])) {
				$this->addUsingAlias(ThemePeer::DURATION, $duration['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThemePeer::DURATION, $duration, $comparison);
	}

	/**
	 * Filter the query on the sheetsTotal column
	 * 
	 * @param     int|array $sheetstotal The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterBySheetstotal($sheetstotal = null, $comparison = null)
	{
		if (is_array($sheetstotal)) {
			$useMinMax = false;
			if (isset($sheetstotal['min'])) {
				$this->addUsingAlias(ThemePeer::SHEETSTOTAL, $sheetstotal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($sheetstotal['max'])) {
				$this->addUsingAlias(ThemePeer::SHEETSTOTAL, $sheetstotal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThemePeer::SHEETSTOTAL, $sheetstotal, $comparison);
	}

	/**
	 * Filter the query on the type column
	 * 
	 * @param     int|array $type The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByType($type = null, $comparison = null)
	{
		if (is_array($type)) {
			$useMinMax = false;
			if (isset($type['min'])) {
				$this->addUsingAlias(ThemePeer::TYPE, $type['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($type['max'])) {
				$this->addUsingAlias(ThemePeer::TYPE, $type['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThemePeer::TYPE, $type, $comparison);
	}

	/**
	 * Filter the query on the active column
	 * 
	 * @param     boolean|string $active The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByActive($active = null, $comparison = null)
	{
		if (is_string($active)) {
			$active = in_array(strtolower($active), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ThemePeer::ACTIVE, $active, $comparison);
	}

	/**
	 * Filter the query on the clientId column
	 * 
	 * @param     int|array $clientid The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByClientid($clientid = null, $comparison = null)
	{
		if (is_array($clientid)) {
			$useMinMax = false;
			if (isset($clientid['min'])) {
				$this->addUsingAlias(ThemePeer::CLIENTID, $clientid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clientid['max'])) {
				$this->addUsingAlias(ThemePeer::CLIENTID, $clientid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ThemePeer::CLIENTID, $clientid, $comparison);
	}

	/**
	 * Filter the query by a related Client object
	 *
	 * @param     Client|PropelCollection $client The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByClient($client, $comparison = null)
	{
		if ($client instanceof Client) {
			return $this
				->addUsingAlias(ThemePeer::CLIENTID, $client->getId(), $comparison);
		} elseif ($client instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ThemePeer::CLIENTID, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ThemeQuery The current query, for fluid interface
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
	 * Filter the query by a related Advertisement object
	 *
	 * @param     Advertisement $advertisement  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function filterByAdvertisement($advertisement, $comparison = null)
	{
		if ($advertisement instanceof Advertisement) {
			return $this
				->addUsingAlias(ThemePeer::ID, $advertisement->getThemeid(), $comparison);
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
	 * @return    ThemeQuery The current query, for fluid interface
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
	 * @param     Theme $theme Object to remove from the list of results
	 *
	 * @return    ThemeQuery The current query, for fluid interface
	 */
	public function prune($theme = null)
	{
		if ($theme) {
			$this->addUsingAlias(ThemePeer::ID, $theme->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseThemeQuery
