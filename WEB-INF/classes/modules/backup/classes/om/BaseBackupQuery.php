<?php


/**
 * Base class that represents a query for the 'backup_log' table.
 *
 * logs de acciones del sistema
 *
 * @method     BackupQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     BackupQuery groupById() Group by the id column
 *
 * @method     BackupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     BackupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     BackupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Backup findOne(PropelPDO $con = null) Return the first Backup matching the query
 * @method     Backup findOneOrCreate(PropelPDO $con = null) Return the first Backup matching the query, or a new Backup object populated from the query conditions when no match is found
 *
 * @method     Backup findOneById(int $id) Return the first Backup filtered by the id column
 *
 * @method     array findById(int $id) Return Backup objects filtered by the id column
 *
 * @package    propel.generator.backup.classes.om
 */
abstract class BaseBackupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseBackupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'application', $modelName = 'Backup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new BackupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    BackupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof BackupQuery) {
			return $criteria;
		}
		$query = new BackupQuery();
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
	 * @return    Backup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = BackupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    BackupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(BackupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    BackupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(BackupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    BackupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(BackupPeer::ID, $id, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Backup $backup Object to remove from the list of results
	 *
	 * @return    BackupQuery The current query, for fluid interface
	 */
	public function prune($backup = null)
	{
		if ($backup) {
			$this->addUsingAlias(BackupPeer::ID, $backup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseBackupQuery
