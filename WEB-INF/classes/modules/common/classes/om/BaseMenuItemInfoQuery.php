<?php


/**
 * Base class that represents a query for the 'common_menuItemInfo' table.
 *
 * Items de los menues dinamicos
 *
 * @method     MenuItemInfoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MenuItemInfoQuery orderByMenuitemid($order = Criteria::ASC) Order by the menuItemId column
 * @method     MenuItemInfoQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     MenuItemInfoQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     MenuItemInfoQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     MenuItemInfoQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 *
 * @method     MenuItemInfoQuery groupById() Group by the id column
 * @method     MenuItemInfoQuery groupByMenuitemid() Group by the menuItemId column
 * @method     MenuItemInfoQuery groupByName() Group by the name column
 * @method     MenuItemInfoQuery groupByTitle() Group by the title column
 * @method     MenuItemInfoQuery groupByDescription() Group by the description column
 * @method     MenuItemInfoQuery groupByLanguage() Group by the language column
 *
 * @method     MenuItemInfoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MenuItemInfoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MenuItemInfoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MenuItemInfoQuery leftJoinMenuItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuItem relation
 * @method     MenuItemInfoQuery rightJoinMenuItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuItem relation
 * @method     MenuItemInfoQuery innerJoinMenuItem($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuItem relation
 *
 * @method     MenuItemInfo findOne(PropelPDO $con = null) Return the first MenuItemInfo matching the query
 * @method     MenuItemInfo findOneOrCreate(PropelPDO $con = null) Return the first MenuItemInfo matching the query, or a new MenuItemInfo object populated from the query conditions when no match is found
 *
 * @method     MenuItemInfo findOneById(int $id) Return the first MenuItemInfo filtered by the id column
 * @method     MenuItemInfo findOneByMenuitemid(int $menuItemId) Return the first MenuItemInfo filtered by the menuItemId column
 * @method     MenuItemInfo findOneByName(string $name) Return the first MenuItemInfo filtered by the name column
 * @method     MenuItemInfo findOneByTitle(string $title) Return the first MenuItemInfo filtered by the title column
 * @method     MenuItemInfo findOneByDescription(string $description) Return the first MenuItemInfo filtered by the description column
 * @method     MenuItemInfo findOneByLanguage(string $language) Return the first MenuItemInfo filtered by the language column
 *
 * @method     array findById(int $id) Return MenuItemInfo objects filtered by the id column
 * @method     array findByMenuitemid(int $menuItemId) Return MenuItemInfo objects filtered by the menuItemId column
 * @method     array findByName(string $name) Return MenuItemInfo objects filtered by the name column
 * @method     array findByTitle(string $title) Return MenuItemInfo objects filtered by the title column
 * @method     array findByDescription(string $description) Return MenuItemInfo objects filtered by the description column
 * @method     array findByLanguage(string $language) Return MenuItemInfo objects filtered by the language column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseMenuItemInfoQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMenuItemInfoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'MenuItemInfo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MenuItemInfoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MenuItemInfoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MenuItemInfoQuery) {
			return $criteria;
		}
		$query = new MenuItemInfoQuery();
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
	 * @return    MenuItemInfo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MenuItemInfoPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MenuItemInfoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MenuItemInfoPeer::ID, $keys, Criteria::IN);
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
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MenuItemInfoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the menuItemId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByMenuitemid(1234); // WHERE menuItemId = 1234
	 * $query->filterByMenuitemid(array(12, 34)); // WHERE menuItemId IN (12, 34)
	 * $query->filterByMenuitemid(array('min' => 12)); // WHERE menuItemId > 12
	 * </code>
	 *
	 * @see       filterByMenuItem()
	 *
	 * @param     mixed $menuitemid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByMenuitemid($menuitemid = null, $comparison = null)
	{
		if (is_array($menuitemid)) {
			$useMinMax = false;
			if (isset($menuitemid['min'])) {
				$this->addUsingAlias(MenuItemInfoPeer::MENUITEMID, $menuitemid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($menuitemid['max'])) {
				$this->addUsingAlias(MenuItemInfoPeer::MENUITEMID, $menuitemid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MenuItemInfoPeer::MENUITEMID, $menuitemid, $comparison);
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
	 * @return    MenuItemInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MenuItemInfoPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
	 * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $title The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MenuItemInfoPeer::TITLE, $title, $comparison);
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
	 * @return    MenuItemInfoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MenuItemInfoPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the language column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLanguage('fooValue');   // WHERE language = 'fooValue'
	 * $query->filterByLanguage('%fooValue%'); // WHERE language LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $language The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByLanguage($language = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($language)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $language)) {
				$language = str_replace('*', '%', $language);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MenuItemInfoPeer::LANGUAGE, $language, $comparison);
	}

	/**
	 * Filter the query by a related MenuItem object
	 *
	 * @param     MenuItem|PropelCollection $menuItem The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function filterByMenuItem($menuItem, $comparison = null)
	{
		if ($menuItem instanceof MenuItem) {
			return $this
				->addUsingAlias(MenuItemInfoPeer::MENUITEMID, $menuItem->getId(), $comparison);
		} elseif ($menuItem instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MenuItemInfoPeer::MENUITEMID, $menuItem->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMenuItem() only accepts arguments of type MenuItem or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MenuItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function joinMenuItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MenuItem');
		
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
			$this->addJoinObject($join, 'MenuItem');
		}
		
		return $this;
	}

	/**
	 * Use the MenuItem relation MenuItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MenuItemQuery A secondary query class using the current class as primary query
	 */
	public function useMenuItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMenuItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MenuItem', 'MenuItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MenuItemInfo $menuItemInfo Object to remove from the list of results
	 *
	 * @return    MenuItemInfoQuery The current query, for fluid interface
	 */
	public function prune($menuItemInfo = null)
	{
		if ($menuItemInfo) {
			$this->addUsingAlias(MenuItemInfoPeer::ID, $menuItemInfo->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMenuItemInfoQuery
