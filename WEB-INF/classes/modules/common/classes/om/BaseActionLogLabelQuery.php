<?php


/**
 * Base class that represents a query for the 'actionLogs_label' table.
 *
 * Etiquetas de los logs
 *
 * @method     ActionLogLabelQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ActionLogLabelQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method     ActionLogLabelQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ActionLogLabelQuery orderByLanguage($order = Criteria::ASC) Order by the language column
 * @method     ActionLogLabelQuery orderByForward($order = Criteria::ASC) Order by the forward column
 *
 * @method     ActionLogLabelQuery groupById() Group by the id column
 * @method     ActionLogLabelQuery groupByAction() Group by the action column
 * @method     ActionLogLabelQuery groupByLabel() Group by the label column
 * @method     ActionLogLabelQuery groupByLanguage() Group by the language column
 * @method     ActionLogLabelQuery groupByForward() Group by the forward column
 *
 * @method     ActionLogLabelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ActionLogLabelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ActionLogLabelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ActionLogLabel findOne(PropelPDO $con = null) Return the first ActionLogLabel matching the query
 * @method     ActionLogLabel findOneOrCreate(PropelPDO $con = null) Return the first ActionLogLabel matching the query, or a new ActionLogLabel object populated from the query conditions when no match is found
 *
 * @method     ActionLogLabel findOneById(int $id) Return the first ActionLogLabel filtered by the id column
 * @method     ActionLogLabel findOneByAction(string $action) Return the first ActionLogLabel filtered by the action column
 * @method     ActionLogLabel findOneByLabel(string $label) Return the first ActionLogLabel filtered by the label column
 * @method     ActionLogLabel findOneByLanguage(string $language) Return the first ActionLogLabel filtered by the language column
 * @method     ActionLogLabel findOneByForward(string $forward) Return the first ActionLogLabel filtered by the forward column
 *
 * @method     array findById(int $id) Return ActionLogLabel objects filtered by the id column
 * @method     array findByAction(string $action) Return ActionLogLabel objects filtered by the action column
 * @method     array findByLabel(string $label) Return ActionLogLabel objects filtered by the label column
 * @method     array findByLanguage(string $language) Return ActionLogLabel objects filtered by the language column
 * @method     array findByForward(string $forward) Return ActionLogLabel objects filtered by the forward column
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseActionLogLabelQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseActionLogLabelQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'ActionLogLabel', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ActionLogLabelQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ActionLogLabelQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ActionLogLabelQuery) {
			return $criteria;
		}
		$query = new ActionLogLabelQuery();
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
	 * @param     array[$id, $action] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ActionLogLabel|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ActionLogLabelPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ActionLogLabelPeer::ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ActionLogLabelPeer::ACTION, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ActionLogLabelPeer::ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ActionLogLabelPeer::ACTION, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
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
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ActionLogLabelPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the action column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
	 * $query->filterByAction('%fooValue%'); // WHERE action LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $action The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterByAction($action = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($action)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $action)) {
				$action = str_replace('*', '%', $action);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionLogLabelPeer::ACTION, $action, $comparison);
	}

	/**
	 * Filter the query on the label column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
	 * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $label The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterByLabel($label = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($label)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $label)) {
				$label = str_replace('*', '%', $label);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionLogLabelPeer::LABEL, $label, $comparison);
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
	 * @return    ActionLogLabelQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ActionLogLabelPeer::LANGUAGE, $language, $comparison);
	}

	/**
	 * Filter the query on the forward column
	 * 
	 * Example usage:
	 * <code>
	 * $query->filterByForward('fooValue');   // WHERE forward = 'fooValue'
	 * $query->filterByForward('%fooValue%'); // WHERE forward LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $forward The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function filterByForward($forward = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($forward)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $forward)) {
				$forward = str_replace('*', '%', $forward);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActionLogLabelPeer::FORWARD, $forward, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ActionLogLabel $actionLogLabel Object to remove from the list of results
	 *
	 * @return    ActionLogLabelQuery The current query, for fluid interface
	 */
	public function prune($actionLogLabel = null)
	{
		if ($actionLogLabel) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ActionLogLabelPeer::ID), $actionLogLabel->getId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ActionLogLabelPeer::ACTION), $actionLogLabel->getAction(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

} // BaseActionLogLabelQuery
