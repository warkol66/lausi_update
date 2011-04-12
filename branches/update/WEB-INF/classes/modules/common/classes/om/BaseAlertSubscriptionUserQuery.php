<?php


/**
 * Base class that represents a query for the 'common_alertSubscriptionUser' table.
 *
 * Relacion AlertSubscription - User
 *
 * @method     AlertSubscriptionUserQuery orderByAlertsubscriptionid($order = Criteria::ASC) Order by the alertSubscriptionId column
 * @method     AlertSubscriptionUserQuery orderByUserid($order = Criteria::ASC) Order by the userId column
 *
 * @method     AlertSubscriptionUserQuery groupByAlertsubscriptionid() Group by the alertSubscriptionId column
 * @method     AlertSubscriptionUserQuery groupByUserid() Group by the userId column
 *
 * @method     AlertSubscriptionUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlertSubscriptionUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlertSubscriptionUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlertSubscriptionUserQuery leftJoinAlertSubscription($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlertSubscription relation
 * @method     AlertSubscriptionUserQuery rightJoinAlertSubscription($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlertSubscription relation
 * @method     AlertSubscriptionUserQuery innerJoinAlertSubscription($relationAlias = null) Adds a INNER JOIN clause to the query using the AlertSubscription relation
 *
 * @method     AlertSubscriptionUserQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     AlertSubscriptionUserQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     AlertSubscriptionUserQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     AlertSubscriptionUser findOne(PropelPDO $con = null) Return the first AlertSubscriptionUser matching the query
 * @method     AlertSubscriptionUser findOneOrCreate(PropelPDO $con = null) Return the first AlertSubscriptionUser matching the query, or a new AlertSubscriptionUser object populated from the query conditions when no match is found
 *
 * @method     AlertSubscriptionUser findOneByAlertsubscriptionid(int $alertSubscriptionId) Return the first AlertSubscriptionUser filtered by the alertSubscriptionId column
 * @method     AlertSubscriptionUser findOneByUserid(int $userId) Return the first AlertSubscriptionUser filtered by the userId column
 *
 * @method     array findByAlertsubscriptionid(int $alertSubscriptionId) Return AlertSubscriptionUser objects filtered by the alertSubscriptionId column
 * @method     array findByUserid(int $userId) Return AlertSubscriptionUser objects filtered by the userId column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseAlertSubscriptionUserQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlertSubscriptionUserQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'AlertSubscriptionUser', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlertSubscriptionUserQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlertSubscriptionUserQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlertSubscriptionUserQuery) {
			return $criteria;
		}
		$query = new AlertSubscriptionUserQuery();
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
	 * @param     array[$alertSubscriptionId, $userId] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AlertSubscriptionUser|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AlertSubscriptionUserPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AlertSubscriptionUserPeer::USERID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AlertSubscriptionUserPeer::USERID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the alertSubscriptionId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAlertsubscriptionid(1234); // WHERE alertSubscriptionId = 1234
	 * $query->filterByAlertsubscriptionid(array(12, 34)); // WHERE alertSubscriptionId IN (12, 34)
	 * $query->filterByAlertsubscriptionid(array('min' => 12)); // WHERE alertSubscriptionId > 12
	 * </code>
	 *
	 * @see       filterByAlertSubscription()
	 *
	 * @param     mixed $alertsubscriptionid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByAlertsubscriptionid($alertsubscriptionid = null, $comparison = null)
	{
		if (is_array($alertsubscriptionid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID, $alertsubscriptionid, $comparison);
	}

	/**
	 * Filter the query on the userId column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByUserid(1234); // WHERE userId = 1234
	 * $query->filterByUserid(array(12, 34)); // WHERE userId IN (12, 34)
	 * $query->filterByUserid(array('min' => 12)); // WHERE userId > 12
	 * </code>
	 *
	 * @see       filterByUser()
	 *
	 * @param     mixed $userid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByUserid($userid = null, $comparison = null)
	{
		if (is_array($userid) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlertSubscriptionUserPeer::USERID, $userid, $comparison);
	}

	/**
	 * Filter the query by a related AlertSubscription object
	 *
	 * @param     AlertSubscription|PropelCollection $alertSubscription The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByAlertSubscription($alertSubscription, $comparison = null)
	{
		if ($alertSubscription instanceof AlertSubscription) {
			return $this
				->addUsingAlias(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID, $alertSubscription->getId(), $comparison);
		} elseif ($alertSubscription instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID, $alertSubscription->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAlertSubscription() only accepts arguments of type AlertSubscription or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AlertSubscription relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function joinAlertSubscription($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AlertSubscription');
		
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
			$this->addJoinObject($join, 'AlertSubscription');
		}
		
		return $this;
	}

	/**
	 * Use the AlertSubscription relation AlertSubscription object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionQuery A secondary query class using the current class as primary query
	 */
	public function useAlertSubscriptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlertSubscription($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AlertSubscription', 'AlertSubscriptionQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(AlertSubscriptionUserPeer::USERID, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AlertSubscriptionUserPeer::USERID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUser() only accepts arguments of type User or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AlertSubscriptionUser $alertSubscriptionUser Object to remove from the list of results
	 *
	 * @return    AlertSubscriptionUserQuery The current query, for fluid interface
	 */
	public function prune($alertSubscriptionUser = null)
	{
		if ($alertSubscriptionUser) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AlertSubscriptionUserPeer::ALERTSUBSCRIPTIONID), $alertSubscriptionUser->getAlertsubscriptionid(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AlertSubscriptionUserPeer::USERID), $alertSubscriptionUser->getUserid(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseAlertSubscriptionUserQuery
