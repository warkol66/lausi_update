<?php


/**
 * Base class that represents a query for the 'users_group' table.
 *
 * Groups
 *
 * @method     GroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     GroupQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     GroupQuery orderByUpdated($order = Criteria::ASC) Order by the updated column
 * @method     GroupQuery orderByBitlevel($order = Criteria::ASC) Order by the bitLevel column
 *
 * @method     GroupQuery groupById() Group by the id column
 * @method     GroupQuery groupByName() Group by the name column
 * @method     GroupQuery groupByCreated() Group by the created column
 * @method     GroupQuery groupByUpdated() Group by the updated column
 * @method     GroupQuery groupByBitlevel() Group by the bitLevel column
 *
 * @method     GroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GroupQuery leftJoinUserGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserGroup relation
 * @method     GroupQuery rightJoinUserGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserGroup relation
 * @method     GroupQuery innerJoinUserGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the UserGroup relation
 *
 * @method     GroupQuery leftJoinGroupCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupCategory relation
 * @method     GroupQuery rightJoinGroupCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupCategory relation
 * @method     GroupQuery innerJoinGroupCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupCategory relation
 *
 * @method     Group findOne(PropelPDO $con = null) Return the first Group matching the query
 * @method     Group findOneOrCreate(PropelPDO $con = null) Return the first Group matching the query, or a new Group object populated from the query conditions when no match is found
 *
 * @method     Group findOneById(int $id) Return the first Group filtered by the id column
 * @method     Group findOneByName(string $name) Return the first Group filtered by the name column
 * @method     Group findOneByCreated(string $created) Return the first Group filtered by the created column
 * @method     Group findOneByUpdated(string $updated) Return the first Group filtered by the updated column
 * @method     Group findOneByBitlevel(int $bitLevel) Return the first Group filtered by the bitLevel column
 *
 * @method     array findById(int $id) Return Group objects filtered by the id column
 * @method     array findByName(string $name) Return Group objects filtered by the name column
 * @method     array findByCreated(string $created) Return Group objects filtered by the created column
 * @method     array findByUpdated(string $updated) Return Group objects filtered by the updated column
 * @method     array findByBitlevel(int $bitLevel) Return Group objects filtered by the bitLevel column
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Group', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GroupQuery) {
			return $criteria;
		}
		$query = new GroupQuery();
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
	 * @return    Group|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = GroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(GroupPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(GroupPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the updated column
	 * 
	 * @param     string|array $updated The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUpdated($updated = null, $comparison = null)
	{
		if (is_array($updated)) {
			$useMinMax = false;
			if (isset($updated['min'])) {
				$this->addUsingAlias(GroupPeer::UPDATED, $updated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updated['max'])) {
				$this->addUsingAlias(GroupPeer::UPDATED, $updated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::UPDATED, $updated, $comparison);
	}

	/**
	 * Filter the query on the bitLevel column
	 * 
	 * @param     int|array $bitlevel The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByBitlevel($bitlevel = null, $comparison = null)
	{
		if (is_array($bitlevel)) {
			$useMinMax = false;
			if (isset($bitlevel['min'])) {
				$this->addUsingAlias(GroupPeer::BITLEVEL, $bitlevel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($bitlevel['max'])) {
				$this->addUsingAlias(GroupPeer::BITLEVEL, $bitlevel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GroupPeer::BITLEVEL, $bitlevel, $comparison);
	}

	/**
	 * Filter the query by a related UserGroup object
	 *
	 * @param     UserGroup $userGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUserGroup($userGroup, $comparison = null)
	{
		if ($userGroup instanceof UserGroup) {
			return $this
				->addUsingAlias(GroupPeer::ID, $userGroup->getGroupid(), $comparison);
		} elseif ($userGroup instanceof PropelCollection) {
			return $this
				->useUserGroupQuery()
					->filterByPrimaryKeys($userGroup->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUserGroup() only accepts arguments of type UserGroup or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UserGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinUserGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserGroup');
		
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
			$this->addJoinObject($join, 'UserGroup');
		}
		
		return $this;
	}

	/**
	 * Use the UserGroup relation UserGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserGroupQuery A secondary query class using the current class as primary query
	 */
	public function useUserGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUserGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserGroup', 'UserGroupQuery');
	}

	/**
	 * Filter the query by a related GroupCategory object
	 *
	 * @param     GroupCategory $groupCategory  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByGroupCategory($groupCategory, $comparison = null)
	{
		if ($groupCategory instanceof GroupCategory) {
			return $this
				->addUsingAlias(GroupPeer::ID, $groupCategory->getGroupid(), $comparison);
		} elseif ($groupCategory instanceof PropelCollection) {
			return $this
				->useGroupCategoryQuery()
					->filterByPrimaryKeys($groupCategory->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGroupCategory() only accepts arguments of type GroupCategory or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the GroupCategory relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function joinGroupCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('GroupCategory');
		
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
			$this->addJoinObject($join, 'GroupCategory');
		}
		
		return $this;
	}

	/**
	 * Use the GroupCategory relation GroupCategory object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GroupCategoryQuery A secondary query class using the current class as primary query
	 */
	public function useGroupCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGroupCategory($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'GroupCategory', 'GroupCategoryQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the users_userGroup table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUserGroupQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Filter the query by a related Category object
	 * using the users_groupCategory table as cross reference
	 *
	 * @param     Category $category the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function filterByCategory($category, $comparison = Criteria::EQUAL)
	{
		return $this
			->useGroupCategoryQuery()
				->filterByCategory($category, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     Group $group Object to remove from the list of results
	 *
	 * @return    GroupQuery The current query, for fluid interface
	 */
	public function prune($group = null)
	{
		if ($group) {
			$this->addUsingAlias(GroupPeer::ID, $group->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseGroupQuery
