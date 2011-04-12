<?php


/**
 * Base class that represents a query for the 'common_scheduleSubscription' table.
 *
 * Suscripciones de schedulea
 *
 * @method     ScheduleSubscriptionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ScheduleSubscriptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ScheduleSubscriptionQuery orderByEntityname($order = Criteria::ASC) Order by the entityName column
 * @method     ScheduleSubscriptionQuery orderByEntitydatefielduniquename($order = Criteria::ASC) Order by the entityDateFieldUniqueName column
 * @method     ScheduleSubscriptionQuery orderByEntitybooleanfielduniquename($order = Criteria::ASC) Order by the entityBooleanFieldUniqueName column
 * @method     ScheduleSubscriptionQuery orderByAnticipationdays($order = Criteria::ASC) Order by the anticipationDays column
 * @method     ScheduleSubscriptionQuery orderByEntitynamefielduniquename($order = Criteria::ASC) Order by the entityNameFieldUniqueName column
 * @method     ScheduleSubscriptionQuery orderByExtrarecipients($order = Criteria::ASC) Order by the extraRecipients column
 *
 * @method     ScheduleSubscriptionQuery groupById() Group by the id column
 * @method     ScheduleSubscriptionQuery groupByName() Group by the name column
 * @method     ScheduleSubscriptionQuery groupByEntityname() Group by the entityName column
 * @method     ScheduleSubscriptionQuery groupByEntitydatefielduniquename() Group by the entityDateFieldUniqueName column
 * @method     ScheduleSubscriptionQuery groupByEntitybooleanfielduniquename() Group by the entityBooleanFieldUniqueName column
 * @method     ScheduleSubscriptionQuery groupByAnticipationdays() Group by the anticipationDays column
 * @method     ScheduleSubscriptionQuery groupByEntitynamefielduniquename() Group by the entityNameFieldUniqueName column
 * @method     ScheduleSubscriptionQuery groupByExtrarecipients() Group by the extraRecipients column
 *
 * @method     ScheduleSubscriptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ScheduleSubscriptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ScheduleSubscriptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ScheduleSubscriptionQuery leftJoinModuleEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntity relation
 * @method     ScheduleSubscriptionQuery rightJoinModuleEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntity relation
 * @method     ScheduleSubscriptionQuery innerJoinModuleEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntity relation
 *
 * @method     ScheduleSubscriptionQuery leftJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 * @method     ScheduleSubscriptionQuery rightJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 * @method     ScheduleSubscriptionQuery innerJoinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
 *
 * @method     ScheduleSubscriptionQuery leftJoinModuleEntityFieldRelatedByEntitydatefielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitydatefielduniquename relation
 * @method     ScheduleSubscriptionQuery rightJoinModuleEntityFieldRelatedByEntitydatefielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitydatefielduniquename relation
 * @method     ScheduleSubscriptionQuery innerJoinModuleEntityFieldRelatedByEntitydatefielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByEntitydatefielduniquename relation
 *
 * @method     ScheduleSubscriptionQuery leftJoinModuleEntityFieldRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a LEFT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitybooleanfielduniquename relation
 * @method     ScheduleSubscriptionQuery rightJoinModuleEntityFieldRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ModuleEntityFieldRelatedByEntitybooleanfielduniquename relation
 * @method     ScheduleSubscriptionQuery innerJoinModuleEntityFieldRelatedByEntitybooleanfielduniquename($relationAlias = null) Adds a INNER JOIN clause to the query using the ModuleEntityFieldRelatedByEntitybooleanfielduniquename relation
 *
 * @method     ScheduleSubscriptionQuery leftJoinScheduleSubscriptionUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the ScheduleSubscriptionUser relation
 * @method     ScheduleSubscriptionQuery rightJoinScheduleSubscriptionUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ScheduleSubscriptionUser relation
 * @method     ScheduleSubscriptionQuery innerJoinScheduleSubscriptionUser($relationAlias = null) Adds a INNER JOIN clause to the query using the ScheduleSubscriptionUser relation
 *
 * @method     ScheduleSubscription findOne(PropelPDO $con = null) Return the first ScheduleSubscription matching the query
 * @method     ScheduleSubscription findOneOrCreate(PropelPDO $con = null) Return the first ScheduleSubscription matching the query, or a new ScheduleSubscription object populated from the query conditions when no match is found
 *
 * @method     ScheduleSubscription findOneById(int $id) Return the first ScheduleSubscription filtered by the id column
 * @method     ScheduleSubscription findOneByName(string $name) Return the first ScheduleSubscription filtered by the name column
 * @method     ScheduleSubscription findOneByEntityname(string $entityName) Return the first ScheduleSubscription filtered by the entityName column
 * @method     ScheduleSubscription findOneByEntitydatefielduniquename(string $entityDateFieldUniqueName) Return the first ScheduleSubscription filtered by the entityDateFieldUniqueName column
 * @method     ScheduleSubscription findOneByEntitybooleanfielduniquename(string $entityBooleanFieldUniqueName) Return the first ScheduleSubscription filtered by the entityBooleanFieldUniqueName column
 * @method     ScheduleSubscription findOneByAnticipationdays(int $anticipationDays) Return the first ScheduleSubscription filtered by the anticipationDays column
 * @method     ScheduleSubscription findOneByEntitynamefielduniquename(string $entityNameFieldUniqueName) Return the first ScheduleSubscription filtered by the entityNameFieldUniqueName column
 * @method     ScheduleSubscription findOneByExtrarecipients(string $extraRecipients) Return the first ScheduleSubscription filtered by the extraRecipients column
 *
 * @method     array findById(int $id) Return ScheduleSubscription objects filtered by the id column
 * @method     array findByName(string $name) Return ScheduleSubscription objects filtered by the name column
 * @method     array findByEntityname(string $entityName) Return ScheduleSubscription objects filtered by the entityName column
 * @method     array findByEntitydatefielduniquename(string $entityDateFieldUniqueName) Return ScheduleSubscription objects filtered by the entityDateFieldUniqueName column
 * @method     array findByEntitybooleanfielduniquename(string $entityBooleanFieldUniqueName) Return ScheduleSubscription objects filtered by the entityBooleanFieldUniqueName column
 * @method     array findByAnticipationdays(int $anticipationDays) Return ScheduleSubscription objects filtered by the anticipationDays column
 * @method     array findByEntitynamefielduniquename(string $entityNameFieldUniqueName) Return ScheduleSubscription objects filtered by the entityNameFieldUniqueName column
 * @method     array findByExtrarecipients(string $extraRecipients) Return ScheduleSubscription objects filtered by the extraRecipients column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseScheduleSubscriptionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseScheduleSubscriptionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ScheduleSubscription', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ScheduleSubscriptionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ScheduleSubscriptionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ScheduleSubscriptionQuery) {
			return $criteria;
		}
		$query = new ScheduleSubscriptionQuery();
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
	 * @return    ScheduleSubscription|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ScheduleSubscriptionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ID, $keys, Criteria::IN);
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
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ID, $id, $comparison);
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
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ScheduleSubscriptionPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the entityName column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEntityname('fooValue');   // WHERE entityName = 'fooValue'
	 * $query->filterByEntityname('%fooValue%'); // WHERE entityName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $entityname The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntityname($entityname = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entityname)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entityname)) {
				$entityname = str_replace('*', '%', $entityname);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAME, $entityname, $comparison);
	}

	/**
	 * Filter the query on the entityDateFieldUniqueName column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEntitydatefielduniquename('fooValue');   // WHERE entityDateFieldUniqueName = 'fooValue'
	 * $query->filterByEntitydatefielduniquename('%fooValue%'); // WHERE entityDateFieldUniqueName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $entitydatefielduniquename The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntitydatefielduniquename($entitydatefielduniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entitydatefielduniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entitydatefielduniquename)) {
				$entitydatefielduniquename = str_replace('*', '%', $entitydatefielduniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME, $entitydatefielduniquename, $comparison);
	}

	/**
	 * Filter the query on the entityBooleanFieldUniqueName column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEntitybooleanfielduniquename('fooValue');   // WHERE entityBooleanFieldUniqueName = 'fooValue'
	 * $query->filterByEntitybooleanfielduniquename('%fooValue%'); // WHERE entityBooleanFieldUniqueName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $entitybooleanfielduniquename The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntitybooleanfielduniquename($entitybooleanfielduniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entitybooleanfielduniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entitybooleanfielduniquename)) {
				$entitybooleanfielduniquename = str_replace('*', '%', $entitybooleanfielduniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME, $entitybooleanfielduniquename, $comparison);
	}

	/**
	 * Filter the query on the anticipationDays column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAnticipationdays(1234); // WHERE anticipationDays = 1234
	 * $query->filterByAnticipationdays(array(12, 34)); // WHERE anticipationDays IN (12, 34)
	 * $query->filterByAnticipationdays(array('min' => 12)); // WHERE anticipationDays > 12
	 * </code>
	 *
	 * @param     mixed $anticipationdays The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByAnticipationdays($anticipationdays = null, $comparison = null)
	{
		if (is_array($anticipationdays)) {
			$useMinMax = false;
			if (isset($anticipationdays['min'])) {
				$this->addUsingAlias(ScheduleSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($anticipationdays['max'])) {
				$this->addUsingAlias(ScheduleSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ANTICIPATIONDAYS, $anticipationdays, $comparison);
	}

	/**
	 * Filter the query on the entityNameFieldUniqueName column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByEntitynamefielduniquename('fooValue');   // WHERE entityNameFieldUniqueName = 'fooValue'
	 * $query->filterByEntitynamefielduniquename('%fooValue%'); // WHERE entityNameFieldUniqueName LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $entitynamefielduniquename The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByEntitynamefielduniquename($entitynamefielduniquename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($entitynamefielduniquename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $entitynamefielduniquename)) {
				$entitynamefielduniquename = str_replace('*', '%', $entitynamefielduniquename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $entitynamefielduniquename, $comparison);
	}

	/**
	 * Filter the query on the extraRecipients column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByExtrarecipients('fooValue');   // WHERE extraRecipients = 'fooValue'
	 * $query->filterByExtrarecipients('%fooValue%'); // WHERE extraRecipients LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $extrarecipients The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByExtrarecipients($extrarecipients = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($extrarecipients)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $extrarecipients)) {
				$extrarecipients = str_replace('*', '%', $extrarecipients);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ScheduleSubscriptionPeer::EXTRARECIPIENTS, $extrarecipients, $comparison);
	}

	/**
	 * Filter the query by a related ModuleEntity object
	 *
	 * @param     ModuleEntity|PropelCollection $moduleEntity The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntity($moduleEntity, $comparison = null)
	{
		if ($moduleEntity instanceof ModuleEntity) {
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAME, $moduleEntity->getName(), $comparison);
		} elseif ($moduleEntity instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAME, $moduleEntity->toKeyValue('PrimaryKey', 'Name'), $comparison);
		} else {
			throw new PropelException('filterByModuleEntity() only accepts arguments of type ModuleEntity or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntity relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntity($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntity');
		
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
			$this->addJoinObject($join, 'ModuleEntity');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntity relation ModuleEntity object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntity($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntity', 'ModuleEntityQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField|PropelCollection $moduleEntityField The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByEntitynamefielduniquename($moduleEntityField, $comparison = null)
	{
		if ($moduleEntityField instanceof ModuleEntityField) {
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $moduleEntityField->getUniquename(), $comparison);
		} elseif ($moduleEntityField instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $moduleEntityField->toKeyValue('PrimaryKey', 'Uniquename'), $comparison);
		} else {
			throw new PropelException('filterByModuleEntityFieldRelatedByEntitynamefielduniquename() only accepts arguments of type ModuleEntityField or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByEntitynamefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByEntitynamefielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByEntitynamefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByEntitynamefielduniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByEntitynamefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByEntitynamefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByEntitynamefielduniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField|PropelCollection $moduleEntityField The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByEntitydatefielduniquename($moduleEntityField, $comparison = null)
	{
		if ($moduleEntityField instanceof ModuleEntityField) {
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME, $moduleEntityField->getUniquename(), $comparison);
		} elseif ($moduleEntityField instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME, $moduleEntityField->toKeyValue('PrimaryKey', 'Uniquename'), $comparison);
		} else {
			throw new PropelException('filterByModuleEntityFieldRelatedByEntitydatefielduniquename() only accepts arguments of type ModuleEntityField or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByEntitydatefielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByEntitydatefielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByEntitydatefielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByEntitydatefielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByEntitydatefielduniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByEntitydatefielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByEntitydatefielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByEntitydatefielduniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related ModuleEntityField object
	 *
	 * @param     ModuleEntityField|PropelCollection $moduleEntityField The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByModuleEntityFieldRelatedByEntitybooleanfielduniquename($moduleEntityField, $comparison = null)
	{
		if ($moduleEntityField instanceof ModuleEntityField) {
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME, $moduleEntityField->getUniquename(), $comparison);
		} elseif ($moduleEntityField instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME, $moduleEntityField->toKeyValue('PrimaryKey', 'Uniquename'), $comparison);
		} else {
			throw new PropelException('filterByModuleEntityFieldRelatedByEntitybooleanfielduniquename() only accepts arguments of type ModuleEntityField or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ModuleEntityFieldRelatedByEntitybooleanfielduniquename relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function joinModuleEntityFieldRelatedByEntitybooleanfielduniquename($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ModuleEntityFieldRelatedByEntitybooleanfielduniquename');
		
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
			$this->addJoinObject($join, 'ModuleEntityFieldRelatedByEntitybooleanfielduniquename');
		}
		
		return $this;
	}

	/**
	 * Use the ModuleEntityFieldRelatedByEntitybooleanfielduniquename relation ModuleEntityField object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ModuleEntityFieldQuery A secondary query class using the current class as primary query
	 */
	public function useModuleEntityFieldRelatedByEntitybooleanfielduniquenameQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinModuleEntityFieldRelatedByEntitybooleanfielduniquename($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ModuleEntityFieldRelatedByEntitybooleanfielduniquename', 'ModuleEntityFieldQuery');
	}

	/**
	 * Filter the query by a related ScheduleSubscriptionUser object
	 *
	 * @param     ScheduleSubscriptionUser $scheduleSubscriptionUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByScheduleSubscriptionUser($scheduleSubscriptionUser, $comparison = null)
	{
		if ($scheduleSubscriptionUser instanceof ScheduleSubscriptionUser) {
			return $this
				->addUsingAlias(ScheduleSubscriptionPeer::ID, $scheduleSubscriptionUser->getSchedulesubscriptionid(), $comparison);
		} elseif ($scheduleSubscriptionUser instanceof PropelCollection) {
			return $this
				->useScheduleSubscriptionUserQuery()
					->filterByPrimaryKeys($scheduleSubscriptionUser->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByScheduleSubscriptionUser() only accepts arguments of type ScheduleSubscriptionUser or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ScheduleSubscriptionUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function joinScheduleSubscriptionUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ScheduleSubscriptionUser');
		
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
			$this->addJoinObject($join, 'ScheduleSubscriptionUser');
		}
		
		return $this;
	}

	/**
	 * Use the ScheduleSubscriptionUser relation ScheduleSubscriptionUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ScheduleSubscriptionUserQuery A secondary query class using the current class as primary query
	 */
	public function useScheduleSubscriptionUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinScheduleSubscriptionUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ScheduleSubscriptionUser', 'ScheduleSubscriptionUserQuery');
	}

	/**
	 * Filter the query by a related User object
	 * using the common_scheduleSubscriptionUser table as cross reference
	 *
	 * @param     User $user the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = Criteria::EQUAL)
	{
		return $this
			->useScheduleSubscriptionUserQuery()
				->filterByUser($user, $comparison)
			->endUse();
	}
	
	/**
	 * Exclude object from result
	 *
	 * @param     ScheduleSubscription $scheduleSubscription Object to remove from the list of results
	 *
	 * @return    ScheduleSubscriptionQuery The current query, for fluid interface
	 */
	public function prune($scheduleSubscription = null)
	{
		if ($scheduleSubscription) {
			$this->addUsingAlias(ScheduleSubscriptionPeer::ID, $scheduleSubscription->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseScheduleSubscriptionQuery
