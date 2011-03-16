<?php


/**
 * Base class that represents a query for the 'lausi_client' table.
 *
 * Base de Clientes
 *
 * @method     ClientQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClientQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ClientQuery orderByContact($order = Criteria::ASC) Order by the contact column
 *
 * @method     ClientQuery groupById() Group by the id column
 * @method     ClientQuery groupByName() Group by the name column
 * @method     ClientQuery groupByContact() Group by the contact column
 *
 * @method     ClientQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClientQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClientQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClientQuery leftJoinClientAddress($relationAlias = null) Adds a LEFT JOIN clause to the query using the ClientAddress relation
 * @method     ClientQuery rightJoinClientAddress($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ClientAddress relation
 * @method     ClientQuery innerJoinClientAddress($relationAlias = null) Adds a INNER JOIN clause to the query using the ClientAddress relation
 *
 * @method     ClientQuery leftJoinTheme($relationAlias = null) Adds a LEFT JOIN clause to the query using the Theme relation
 * @method     ClientQuery rightJoinTheme($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Theme relation
 * @method     ClientQuery innerJoinTheme($relationAlias = null) Adds a INNER JOIN clause to the query using the Theme relation
 *
 * @method     Client findOne(PropelPDO $con = null) Return the first Client matching the query
 * @method     Client findOneOrCreate(PropelPDO $con = null) Return the first Client matching the query, or a new Client object populated from the query conditions when no match is found
 *
 * @method     Client findOneById(int $id) Return the first Client filtered by the id column
 * @method     Client findOneByName(string $name) Return the first Client filtered by the name column
 * @method     Client findOneByContact(string $contact) Return the first Client filtered by the contact column
 *
 * @method     array findById(int $id) Return Client objects filtered by the id column
 * @method     array findByName(string $name) Return Client objects filtered by the name column
 * @method     array findByContact(string $contact) Return Client objects filtered by the contact column
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseClientQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseClientQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Client', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClientQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClientQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClientQuery) {
			return $criteria;
		}
		$query = new ClientQuery();
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
	 * @return    Client|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ClientPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the contact column
	 * 
	 * @param     string $contact The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterByContact($contact = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contact)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contact)) {
				$contact = str_replace('*', '%', $contact);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientPeer::CONTACT, $contact, $comparison);
	}

	/**
	 * Filter the query by a related ClientAddress object
	 *
	 * @param     ClientAddress $clientAddress  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterByClientAddress($clientAddress, $comparison = null)
	{
		if ($clientAddress instanceof ClientAddress) {
			return $this
				->addUsingAlias(ClientPeer::ID, $clientAddress->getClientid(), $comparison);
		} elseif ($clientAddress instanceof PropelCollection) {
			return $this
				->useClientAddressQuery()
					->filterByPrimaryKeys($clientAddress->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByClientAddress() only accepts arguments of type ClientAddress or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ClientAddress relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function joinClientAddress($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ClientAddress');
		
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
			$this->addJoinObject($join, 'ClientAddress');
		}
		
		return $this;
	}

	/**
	 * Use the ClientAddress relation ClientAddress object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClientAddressQuery A secondary query class using the current class as primary query
	 */
	public function useClientAddressQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinClientAddress($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ClientAddress', 'ClientAddressQuery');
	}

	/**
	 * Filter the query by a related Theme object
	 *
	 * @param     Theme $theme  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function filterByTheme($theme, $comparison = null)
	{
		if ($theme instanceof Theme) {
			return $this
				->addUsingAlias(ClientPeer::ID, $theme->getClientid(), $comparison);
		} elseif ($theme instanceof PropelCollection) {
			return $this
				->useThemeQuery()
					->filterByPrimaryKeys($theme->getPrimaryKeys())
				->endUse();
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
	 * @return    ClientQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     Client $client Object to remove from the list of results
	 *
	 * @return    ClientQuery The current query, for fluid interface
	 */
	public function prune($client = null)
	{
		if ($client) {
			$this->addUsingAlias(ClientPeer::ID, $client->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseClientQuery
