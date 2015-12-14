<?php


/**
 * Base static class for performing query and update operations on the 'lausi_deletedAddress' table.
 *
 * Base de Direcciones eliminadas
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseDeletedAddressPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'application';

	/** the table name for this class */
	const TABLE_NAME = 'lausi_deletedAddress';

	/** the related Propel class for this table */
	const OM_CLASS = 'DeletedAddress';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'lausi.classes.DeletedAddress';

	/** the related TableMap class for this table */
	const TM_CLASS = 'DeletedAddressTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 17;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 17;

	/** the column name for the ID field */
	const ID = 'lausi_deletedAddress.ID';

	/** the column name for the STREET field */
	const STREET = 'lausi_deletedAddress.STREET';

	/** the column name for the NUMBER field */
	const NUMBER = 'lausi_deletedAddress.NUMBER';

	/** the column name for the RATING field */
	const RATING = 'lausi_deletedAddress.RATING';

	/** the column name for the INTERSECTION field */
	const INTERSECTION = 'lausi_deletedAddress.INTERSECTION';

	/** the column name for the OWNER field */
	const OWNER = 'lausi_deletedAddress.OWNER';

	/** the column name for the LATITUDE field */
	const LATITUDE = 'lausi_deletedAddress.LATITUDE';

	/** the column name for the LONGITUDE field */
	const LONGITUDE = 'lausi_deletedAddress.LONGITUDE';

	/** the column name for the REGIONID field */
	const REGIONID = 'lausi_deletedAddress.REGIONID';

	/** the column name for the OWNERPHONE field */
	const OWNERPHONE = 'lausi_deletedAddress.OWNERPHONE';

	/** the column name for the ORDERCIRCUIT field */
	const ORDERCIRCUIT = 'lausi_deletedAddress.ORDERCIRCUIT';

	/** the column name for the NICKNAME field */
	const NICKNAME = 'lausi_deletedAddress.NICKNAME';

	/** the column name for the ENUMERATION field */
	const ENUMERATION = 'lausi_deletedAddress.ENUMERATION';

	/** the column name for the CREATIONDATE field */
	const CREATIONDATE = 'lausi_deletedAddress.CREATIONDATE';

	/** the column name for the DELETIONDATE field */
	const DELETIONDATE = 'lausi_deletedAddress.DELETIONDATE';

	/** the column name for the HASGRILLE field */
	const HASGRILLE = 'lausi_deletedAddress.HASGRILLE';

	/** the column name for the CIRCUITID field */
	const CIRCUITID = 'lausi_deletedAddress.CIRCUITID';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';
	
	/**
	 * An identiy map to hold any loaded instances of DeletedAddress objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array DeletedAddress[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Street', 'Number', 'Rating', 'Intersection', 'Owner', 'Latitude', 'Longitude', 'Regionid', 'Ownerphone', 'Ordercircuit', 'Nickname', 'Enumeration', 'Creationdate', 'Deletiondate', 'Hasgrille', 'Circuitid', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'street', 'number', 'rating', 'intersection', 'owner', 'latitude', 'longitude', 'regionid', 'ownerphone', 'ordercircuit', 'nickname', 'enumeration', 'creationdate', 'deletiondate', 'hasgrille', 'circuitid', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::STREET, self::NUMBER, self::RATING, self::INTERSECTION, self::OWNER, self::LATITUDE, self::LONGITUDE, self::REGIONID, self::OWNERPHONE, self::ORDERCIRCUIT, self::NICKNAME, self::ENUMERATION, self::CREATIONDATE, self::DELETIONDATE, self::HASGRILLE, self::CIRCUITID, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'STREET', 'NUMBER', 'RATING', 'INTERSECTION', 'OWNER', 'LATITUDE', 'LONGITUDE', 'REGIONID', 'OWNERPHONE', 'ORDERCIRCUIT', 'NICKNAME', 'ENUMERATION', 'CREATIONDATE', 'DELETIONDATE', 'HASGRILLE', 'CIRCUITID', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'street', 'number', 'rating', 'intersection', 'owner', 'latitude', 'longitude', 'regionId', 'ownerPhone', 'orderCircuit', 'nickname', 'enumeration', 'creationDate', 'deletionDate', 'hasGrille', 'circuitId', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Street' => 1, 'Number' => 2, 'Rating' => 3, 'Intersection' => 4, 'Owner' => 5, 'Latitude' => 6, 'Longitude' => 7, 'Regionid' => 8, 'Ownerphone' => 9, 'Ordercircuit' => 10, 'Nickname' => 11, 'Enumeration' => 12, 'Creationdate' => 13, 'Deletiondate' => 14, 'Hasgrille' => 15, 'Circuitid' => 16, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'street' => 1, 'number' => 2, 'rating' => 3, 'intersection' => 4, 'owner' => 5, 'latitude' => 6, 'longitude' => 7, 'regionid' => 8, 'ownerphone' => 9, 'ordercircuit' => 10, 'nickname' => 11, 'enumeration' => 12, 'creationdate' => 13, 'deletiondate' => 14, 'hasgrille' => 15, 'circuitid' => 16, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::STREET => 1, self::NUMBER => 2, self::RATING => 3, self::INTERSECTION => 4, self::OWNER => 5, self::LATITUDE => 6, self::LONGITUDE => 7, self::REGIONID => 8, self::OWNERPHONE => 9, self::ORDERCIRCUIT => 10, self::NICKNAME => 11, self::ENUMERATION => 12, self::CREATIONDATE => 13, self::DELETIONDATE => 14, self::HASGRILLE => 15, self::CIRCUITID => 16, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'STREET' => 1, 'NUMBER' => 2, 'RATING' => 3, 'INTERSECTION' => 4, 'OWNER' => 5, 'LATITUDE' => 6, 'LONGITUDE' => 7, 'REGIONID' => 8, 'OWNERPHONE' => 9, 'ORDERCIRCUIT' => 10, 'NICKNAME' => 11, 'ENUMERATION' => 12, 'CREATIONDATE' => 13, 'DELETIONDATE' => 14, 'HASGRILLE' => 15, 'CIRCUITID' => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'street' => 1, 'number' => 2, 'rating' => 3, 'intersection' => 4, 'owner' => 5, 'latitude' => 6, 'longitude' => 7, 'regionId' => 8, 'ownerPhone' => 9, 'orderCircuit' => 10, 'nickname' => 11, 'enumeration' => 12, 'creationDate' => 13, 'deletionDate' => 14, 'hasGrille' => 15, 'circuitId' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. DeletedAddressPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(DeletedAddressPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(DeletedAddressPeer::ID);
			$criteria->addSelectColumn(DeletedAddressPeer::STREET);
			$criteria->addSelectColumn(DeletedAddressPeer::NUMBER);
			$criteria->addSelectColumn(DeletedAddressPeer::RATING);
			$criteria->addSelectColumn(DeletedAddressPeer::INTERSECTION);
			$criteria->addSelectColumn(DeletedAddressPeer::OWNER);
			$criteria->addSelectColumn(DeletedAddressPeer::LATITUDE);
			$criteria->addSelectColumn(DeletedAddressPeer::LONGITUDE);
			$criteria->addSelectColumn(DeletedAddressPeer::REGIONID);
			$criteria->addSelectColumn(DeletedAddressPeer::OWNERPHONE);
			$criteria->addSelectColumn(DeletedAddressPeer::ORDERCIRCUIT);
			$criteria->addSelectColumn(DeletedAddressPeer::NICKNAME);
			$criteria->addSelectColumn(DeletedAddressPeer::ENUMERATION);
			$criteria->addSelectColumn(DeletedAddressPeer::CREATIONDATE);
			$criteria->addSelectColumn(DeletedAddressPeer::DELETIONDATE);
			$criteria->addSelectColumn(DeletedAddressPeer::HASGRILLE);
			$criteria->addSelectColumn(DeletedAddressPeer::CIRCUITID);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.STREET');
			$criteria->addSelectColumn($alias . '.NUMBER');
			$criteria->addSelectColumn($alias . '.RATING');
			$criteria->addSelectColumn($alias . '.INTERSECTION');
			$criteria->addSelectColumn($alias . '.OWNER');
			$criteria->addSelectColumn($alias . '.LATITUDE');
			$criteria->addSelectColumn($alias . '.LONGITUDE');
			$criteria->addSelectColumn($alias . '.REGIONID');
			$criteria->addSelectColumn($alias . '.OWNERPHONE');
			$criteria->addSelectColumn($alias . '.ORDERCIRCUIT');
			$criteria->addSelectColumn($alias . '.NICKNAME');
			$criteria->addSelectColumn($alias . '.ENUMERATION');
			$criteria->addSelectColumn($alias . '.CREATIONDATE');
			$criteria->addSelectColumn($alias . '.DELETIONDATE');
			$criteria->addSelectColumn($alias . '.HASGRILLE');
			$criteria->addSelectColumn($alias . '.CIRCUITID');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     DeletedAddress
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = DeletedAddressPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DeletedAddressPeer::populateObjects(DeletedAddressPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DeletedAddressPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      DeletedAddress $value A DeletedAddress object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A DeletedAddress object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof DeletedAddress) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or DeletedAddress object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     DeletedAddress Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to lausi_deletedAddress
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = DeletedAddressPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DeletedAddressPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DeletedAddressPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (DeletedAddress object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = DeletedAddressPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + DeletedAddressPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = DeletedAddressPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			DeletedAddressPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Circuit table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCircuit(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Region table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinRegion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of DeletedAddress objects pre-filled with their Circuit objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DeletedAddress objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCircuit(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DeletedAddressPeer::addSelectColumns($criteria);
		$startcol = DeletedAddressPeer::NUM_HYDRATE_COLUMNS;
		CircuitPeer::addSelectColumns($criteria);

		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DeletedAddressPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = DeletedAddressPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DeletedAddressPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CircuitPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CircuitPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CircuitPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CircuitPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (DeletedAddress) to $obj2 (Circuit)
				$obj2->addDeletedAddress($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of DeletedAddress objects pre-filled with their Region objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DeletedAddress objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinRegion(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DeletedAddressPeer::addSelectColumns($criteria);
		$startcol = DeletedAddressPeer::NUM_HYDRATE_COLUMNS;
		RegionPeer::addSelectColumns($criteria);

		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DeletedAddressPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = DeletedAddressPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DeletedAddressPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = RegionPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = RegionPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = RegionPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					RegionPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (DeletedAddress) to $obj2 (Region)
				$obj2->addDeletedAddress($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);

		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of DeletedAddress objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DeletedAddress objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DeletedAddressPeer::addSelectColumns($criteria);
		$startcol2 = DeletedAddressPeer::NUM_HYDRATE_COLUMNS;

		CircuitPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CircuitPeer::NUM_HYDRATE_COLUMNS;

		RegionPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + RegionPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);

		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DeletedAddressPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DeletedAddressPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DeletedAddressPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Circuit rows

			$key2 = CircuitPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CircuitPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CircuitPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CircuitPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (DeletedAddress) to the collection in $obj2 (Circuit)
				$obj2->addDeletedAddress($obj1);
			} // if joined row not null

			// Add objects for joined Region rows

			$key3 = RegionPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = RegionPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = RegionPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					RegionPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (DeletedAddress) to the collection in $obj3 (Region)
				$obj3->addDeletedAddress($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Circuit table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCircuit(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Region table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptRegion(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DeletedAddressPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of DeletedAddress objects pre-filled with all related objects except Circuit.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DeletedAddress objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCircuit(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DeletedAddressPeer::addSelectColumns($criteria);
		$startcol2 = DeletedAddressPeer::NUM_HYDRATE_COLUMNS;

		RegionPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + RegionPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(DeletedAddressPeer::REGIONID, RegionPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DeletedAddressPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DeletedAddressPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DeletedAddressPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Region rows

				$key2 = RegionPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = RegionPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = RegionPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					RegionPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (DeletedAddress) to the collection in $obj2 (Region)
				$obj2->addDeletedAddress($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of DeletedAddress objects pre-filled with all related objects except Region.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of DeletedAddress objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptRegion(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		DeletedAddressPeer::addSelectColumns($criteria);
		$startcol2 = DeletedAddressPeer::NUM_HYDRATE_COLUMNS;

		CircuitPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CircuitPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(DeletedAddressPeer::CIRCUITID, CircuitPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DeletedAddressPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DeletedAddressPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = DeletedAddressPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				DeletedAddressPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Circuit rows

				$key2 = CircuitPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CircuitPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CircuitPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CircuitPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (DeletedAddress) to the collection in $obj2 (Circuit)
				$obj2->addDeletedAddress($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseDeletedAddressPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseDeletedAddressPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new DeletedAddressTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? DeletedAddressPeer::CLASS_DEFAULT : DeletedAddressPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a DeletedAddress or Criteria object.
	 *
	 * @param      mixed $values Criteria or DeletedAddress object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from DeletedAddress object
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a DeletedAddress or Criteria object.
	 *
	 * @param      mixed $values Criteria or DeletedAddress object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(DeletedAddressPeer::ID);
			$value = $criteria->remove(DeletedAddressPeer::ID);
			if ($value) {
				$selectCriteria->add(DeletedAddressPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(DeletedAddressPeer::TABLE_NAME);
			}

		} else { // $values is DeletedAddress object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the lausi_deletedAddress table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DeletedAddressPeer::TABLE_NAME, $con, DeletedAddressPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			DeletedAddressPeer::clearInstancePool();
			DeletedAddressPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a DeletedAddress or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or DeletedAddress object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			DeletedAddressPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof DeletedAddress) { // it's a model object
			// invalidate the cache for this single object
			DeletedAddressPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DeletedAddressPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				DeletedAddressPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			DeletedAddressPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given DeletedAddress object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      DeletedAddress $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DeletedAddressPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DeletedAddressPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(DeletedAddressPeer::DATABASE_NAME, DeletedAddressPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     DeletedAddress
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DeletedAddressPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DeletedAddressPeer::DATABASE_NAME);
		$criteria->add(DeletedAddressPeer::ID, $pk);

		$v = DeletedAddressPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DeletedAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DeletedAddressPeer::DATABASE_NAME);
			$criteria->add(DeletedAddressPeer::ID, $pks, Criteria::IN);
			$objs = DeletedAddressPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseDeletedAddressPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseDeletedAddressPeer::buildTableMap();

