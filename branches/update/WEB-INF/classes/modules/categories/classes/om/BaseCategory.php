<?php


/**
 * Base class that represents a row from the 'categories_category' table.
 *
 * Categorias
 *
 * @package    propel.generator.categories.classes.om
 */
abstract class BaseCategory extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CategoryPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CategoryPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the order field.
	 * @var        int
	 */
	protected $order;

	/**
	 * The value for the module field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $module;

	/**
	 * The value for the active field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the ispublic field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $ispublic;

	/**
	 * The value for the oldid field.
	 * @var        int
	 */
	protected $oldid;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the deleted_at field.
	 * @var        string
	 */
	protected $deleted_at;

	/**
	 * The value for the tree_left field.
	 * @var        int
	 */
	protected $tree_left;

	/**
	 * The value for the tree_right field.
	 * @var        int
	 */
	protected $tree_right;

	/**
	 * The value for the tree_level field.
	 * @var        int
	 */
	protected $tree_level;

	/**
	 * The value for the scope field.
	 * @var        int
	 */
	protected $scope;

	/**
	 * @var        array GroupCategory[] Collection to store aggregation of GroupCategory objects.
	 */
	protected $collGroupCategorys;

	/**
	 * @var        array Group[] Collection to store aggregation of Group objects.
	 */
	protected $collGroups;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// nested_set behavior
	
	/**
	 * Queries to be executed in the save transaction
	 * @var        array
	 */
	protected $nestedSetQueries = array();
	
	/**
	 * Internal cache for children nodes
	 * @var        null|PropelObjectCollection
	 */
	protected $collNestedSetChildren = null;
	
	/**
	 * Internal cache for parent node
	 * @var        null|Category
	 */
	protected $aNestedSetParent = null;
	

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->module = '';
		$this->active = true;
		$this->ispublic = false;
	}

	/**
	 * Initializes internal state of BaseCategory object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * Id de la categoria
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Category name
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [order] column value.
	 * Orden
	 * @return     int
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * Get the [module] column value.
	 * Module name if it is for a module
	 * @return     string
	 */
	public function getModule()
	{
		return $this->module;
	}

	/**
	 * Get the [active] column value.
	 * Is category active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
	}

	/**
	 * Get the [ispublic] column value.
	 * Is category public?
	 * @return     boolean
	 */
	public function getIspublic()
	{
		return $this->ispublic;
	}

	/**
	 * Get the [oldid] column value.
	 * Old Id
	 * @return     int
	 */
	public function getOldid()
	{
		return $this->oldid;
	}

	/**
	 * Get the [description] column value.
	 * Descripcion de la categoria
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [optionally formatted] temporal [deleted_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDeletedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->deleted_at === null) {
			return null;
		}


		if ($this->deleted_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->deleted_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->deleted_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [tree_left] column value.
	 * 
	 * @return     int
	 */
	public function getTreeLeft()
	{
		return $this->tree_left;
	}

	/**
	 * Get the [tree_right] column value.
	 * 
	 * @return     int
	 */
	public function getTreeRight()
	{
		return $this->tree_right;
	}

	/**
	 * Get the [tree_level] column value.
	 * 
	 * @return     int
	 */
	public function getTreeLevel()
	{
		return $this->tree_level;
	}

	/**
	 * Get the [scope] column value.
	 * 
	 * @return     int
	 */
	public function getScope()
	{
		return $this->scope;
	}

	/**
	 * Set the value of [id] column.
	 * Id de la categoria
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CategoryPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Category name
	 * @param      string $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = CategoryPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [order] column.
	 * Orden
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setOrder($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->order !== $v) {
			$this->order = $v;
			$this->modifiedColumns[] = CategoryPeer::ORDER;
		}

		return $this;
	} // setOrder()

	/**
	 * Set the value of [module] column.
	 * Module name if it is for a module
	 * @param      string $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setModule($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->module !== $v || $this->isNew()) {
			$this->module = $v;
			$this->modifiedColumns[] = CategoryPeer::MODULE;
		}

		return $this;
	} // setModule()

	/**
	 * Set the value of [active] column.
	 * Is category active?
	 * @param      boolean $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->active !== $v || $this->isNew()) {
			$this->active = $v;
			$this->modifiedColumns[] = CategoryPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [ispublic] column.
	 * Is category public?
	 * @param      boolean $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setIspublic($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->ispublic !== $v || $this->isNew()) {
			$this->ispublic = $v;
			$this->modifiedColumns[] = CategoryPeer::ISPUBLIC;
		}

		return $this;
	} // setIspublic()

	/**
	 * Set the value of [oldid] column.
	 * Old Id
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setOldid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->oldid !== $v) {
			$this->oldid = $v;
			$this->modifiedColumns[] = CategoryPeer::OLDID;
		}

		return $this;
	} // setOldid()

	/**
	 * Set the value of [description] column.
	 * Descripcion de la categoria
	 * @param      string $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = CategoryPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Category The current object (for fluent API support)
	 */
	public function setDeletedAt($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->deleted_at !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->deleted_at = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = CategoryPeer::DELETED_AT;
			}
		} // if either are not null

		return $this;
	} // setDeletedAt()

	/**
	 * Set the value of [tree_left] column.
	 * 
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setTreeLeft($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_left !== $v) {
			$this->tree_left = $v;
			$this->modifiedColumns[] = CategoryPeer::TREE_LEFT;
		}

		return $this;
	} // setTreeLeft()

	/**
	 * Set the value of [tree_right] column.
	 * 
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setTreeRight($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_right !== $v) {
			$this->tree_right = $v;
			$this->modifiedColumns[] = CategoryPeer::TREE_RIGHT;
		}

		return $this;
	} // setTreeRight()

	/**
	 * Set the value of [tree_level] column.
	 * 
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setTreeLevel($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tree_level !== $v) {
			$this->tree_level = $v;
			$this->modifiedColumns[] = CategoryPeer::TREE_LEVEL;
		}

		return $this;
	} // setTreeLevel()

	/**
	 * Set the value of [scope] column.
	 * 
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setScope($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->scope !== $v) {
			$this->scope = $v;
			$this->modifiedColumns[] = CategoryPeer::SCOPE;
		}

		return $this;
	} // setScope()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->module !== '') {
				return false;
			}

			if ($this->active !== true) {
				return false;
			}

			if ($this->ispublic !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->order = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->module = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->active = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->ispublic = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->oldid = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->description = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->deleted_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->tree_left = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->tree_right = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->tree_level = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->scope = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = CategoryPeer::NUM_COLUMNS - CategoryPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Category object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CategoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collGroupCategorys = null;

			$this->collGroups = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// soft_delete behavior
			if (!empty($ret) && CategoryQuery::isSoftDeleteEnabled()) {
				$this->setDeletedAt(time());
				$this->save($con);
				$con->commit();
				CategoryPeer::removeInstanceFromPool($this);
				return;
			}

			// nested_set behavior
			if ($this->isRoot()) {
				throw new PropelException('Deletion of a root node is disabled for nested sets. Use CategoryPeer::deleteTree($scope) instead to delete an entire tree');
			}
			
			if ($this->isInTree()) {
				$this->deleteDescendants($con);
			}

			if ($ret) {
				CategoryQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// nested_set behavior
				if ($this->isInTree()) {
					// fill up the room that was used by the node
					CategoryPeer::shiftRLValues(-2, $this->getRightValue() + 1, null, $this->getScopeValue(), $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// nested_set behavior
			if ($this->isNew() && $this->isRoot()) {
				// check if no other root exist in, the tree
				$nbRoots = CategoryQuery::create()
					->addUsingAlias(CategoryPeer::LEFT_COL, 1, Criteria::EQUAL)
					->addUsingAlias(CategoryPeer::SCOPE_COL, $this->getScopeValue(), Criteria::EQUAL)
					->count($con);
				if ($nbRoots > 0) {
						throw new PropelException(sprintf('A root node already exists in this tree with scope "%s".', $this->getScopeValue()));
				}
			}
			$this->processNestedSetQueries($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				CategoryPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CategoryPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(CategoryPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.CategoryPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = CategoryPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collGroupCategorys !== null) {
				foreach ($this->collGroupCategorys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = CategoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collGroupCategorys !== null) {
					foreach ($this->collGroupCategorys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getOrder();
				break;
			case 3:
				return $this->getModule();
				break;
			case 4:
				return $this->getActive();
				break;
			case 5:
				return $this->getIspublic();
				break;
			case 6:
				return $this->getOldid();
				break;
			case 7:
				return $this->getDescription();
				break;
			case 8:
				return $this->getDeletedAt();
				break;
			case 9:
				return $this->getTreeLeft();
				break;
			case 10:
				return $this->getTreeRight();
				break;
			case 11:
				return $this->getTreeLevel();
				break;
			case 12:
				return $this->getScope();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Category'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Category'][$this->getPrimaryKey()] = true;
		$keys = CategoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getOrder(),
			$keys[3] => $this->getModule(),
			$keys[4] => $this->getActive(),
			$keys[5] => $this->getIspublic(),
			$keys[6] => $this->getOldid(),
			$keys[7] => $this->getDescription(),
			$keys[8] => $this->getDeletedAt(),
			$keys[9] => $this->getTreeLeft(),
			$keys[10] => $this->getTreeRight(),
			$keys[11] => $this->getTreeLevel(),
			$keys[12] => $this->getScope(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collGroupCategorys) {
				$result['GroupCategorys'] = $this->collGroupCategorys->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CategoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setOrder($value);
				break;
			case 3:
				$this->setModule($value);
				break;
			case 4:
				$this->setActive($value);
				break;
			case 5:
				$this->setIspublic($value);
				break;
			case 6:
				$this->setOldid($value);
				break;
			case 7:
				$this->setDescription($value);
				break;
			case 8:
				$this->setDeletedAt($value);
				break;
			case 9:
				$this->setTreeLeft($value);
				break;
			case 10:
				$this->setTreeRight($value);
				break;
			case 11:
				$this->setTreeLevel($value);
				break;
			case 12:
				$this->setScope($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CategoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrder($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setModule($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActive($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIspublic($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOldid($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescription($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDeletedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTreeLeft($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTreeRight($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTreeLevel($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setScope($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(CategoryPeer::ID)) $criteria->add(CategoryPeer::ID, $this->id);
		if ($this->isColumnModified(CategoryPeer::NAME)) $criteria->add(CategoryPeer::NAME, $this->name);
		if ($this->isColumnModified(CategoryPeer::ORDER)) $criteria->add(CategoryPeer::ORDER, $this->order);
		if ($this->isColumnModified(CategoryPeer::MODULE)) $criteria->add(CategoryPeer::MODULE, $this->module);
		if ($this->isColumnModified(CategoryPeer::ACTIVE)) $criteria->add(CategoryPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(CategoryPeer::ISPUBLIC)) $criteria->add(CategoryPeer::ISPUBLIC, $this->ispublic);
		if ($this->isColumnModified(CategoryPeer::OLDID)) $criteria->add(CategoryPeer::OLDID, $this->oldid);
		if ($this->isColumnModified(CategoryPeer::DESCRIPTION)) $criteria->add(CategoryPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(CategoryPeer::DELETED_AT)) $criteria->add(CategoryPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(CategoryPeer::TREE_LEFT)) $criteria->add(CategoryPeer::TREE_LEFT, $this->tree_left);
		if ($this->isColumnModified(CategoryPeer::TREE_RIGHT)) $criteria->add(CategoryPeer::TREE_RIGHT, $this->tree_right);
		if ($this->isColumnModified(CategoryPeer::TREE_LEVEL)) $criteria->add(CategoryPeer::TREE_LEVEL, $this->tree_level);
		if ($this->isColumnModified(CategoryPeer::SCOPE)) $criteria->add(CategoryPeer::SCOPE, $this->scope);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CategoryPeer::DATABASE_NAME);
		$criteria->add(CategoryPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Category (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->name);
		$copyObj->setOrder($this->order);
		$copyObj->setModule($this->module);
		$copyObj->setActive($this->active);
		$copyObj->setIspublic($this->ispublic);
		$copyObj->setOldid($this->oldid);
		$copyObj->setDescription($this->description);
		$copyObj->setDeletedAt($this->deleted_at);
		$copyObj->setTreeLeft($this->tree_left);
		$copyObj->setTreeRight($this->tree_right);
		$copyObj->setTreeLevel($this->tree_level);
		$copyObj->setScope($this->scope);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getGroupCategorys() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addGroupCategory($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Category Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     CategoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CategoryPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collGroupCategorys collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroupCategorys()
	 */
	public function clearGroupCategorys()
	{
		$this->collGroupCategorys = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroupCategorys collection.
	 *
	 * By default this just sets the collGroupCategorys collection to an empty array (like clearcollGroupCategorys());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initGroupCategorys($overrideExisting = true)
	{
		if (null !== $this->collGroupCategorys && !$overrideExisting) {
			return;
		}
		$this->collGroupCategorys = new PropelObjectCollection();
		$this->collGroupCategorys->setModel('GroupCategory');
	}

	/**
	 * Gets an array of GroupCategory objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Category is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array GroupCategory[] List of GroupCategory objects
	 * @throws     PropelException
	 */
	public function getGroupCategorys($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroupCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupCategorys) {
				// return empty collection
				$this->initGroupCategorys();
			} else {
				$collGroupCategorys = GroupCategoryQuery::create(null, $criteria)
					->filterByCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroupCategorys;
				}
				$this->collGroupCategorys = $collGroupCategorys;
			}
		}
		return $this->collGroupCategorys;
	}

	/**
	 * Returns the number of related GroupCategory objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related GroupCategory objects.
	 * @throws     PropelException
	 */
	public function countGroupCategorys(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroupCategorys || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroupCategorys) {
				return 0;
			} else {
				$query = GroupCategoryQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategory($this)
					->count($con);
			}
		} else {
			return count($this->collGroupCategorys);
		}
	}

	/**
	 * Method called to associate a GroupCategory object to this object
	 * through the GroupCategory foreign key attribute.
	 *
	 * @param      GroupCategory $l GroupCategory
	 * @return     void
	 * @throws     PropelException
	 */
	public function addGroupCategory(GroupCategory $l)
	{
		if ($this->collGroupCategorys === null) {
			$this->initGroupCategorys();
		}
		if (!$this->collGroupCategorys->contains($l)) { // only add it if the **same** object is not already associated
			$this->collGroupCategorys[]= $l;
			$l->setCategory($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Category is new, it will return
	 * an empty collection; or if this Category has previously
	 * been saved, it will retrieve related GroupCategorys from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Category.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array GroupCategory[] List of GroupCategory objects
	 */
	public function getGroupCategorysJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = GroupCategoryQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getGroupCategorys($query, $con);
	}

	/**
	 * Clears out the collGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addGroups()
	 */
	public function clearGroups()
	{
		$this->collGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collGroups collection.
	 *
	 * By default this just sets the collGroups collection to an empty collection (like clearGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initGroups()
	{
		$this->collGroups = new PropelObjectCollection();
		$this->collGroups->setModel('Group');
	}

	/**
	 * Gets a collection of Group objects related by a many-to-many relationship
	 * to the current object by way of the users_groupCategory cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Category is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Group[] List of Group objects
	 */
	public function getGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				// return empty collection
				$this->initGroups();
			} else {
				$collGroups = GroupQuery::create(null, $criteria)
					->filterByCategory($this)
					->find($con);
				if (null !== $criteria) {
					return $collGroups;
				}
				$this->collGroups = $collGroups;
			}
		}
		return $this->collGroups;
	}

	/**
	 * Gets the number of Group objects related by a many-to-many relationship
	 * to the current object by way of the users_groupCategory cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Group objects
	 */
	public function countGroups($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collGroups) {
				return 0;
			} else {
				$query = GroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCategory($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the users_groupCategory cross reference table.
	 *
	 * @param      Group $group The GroupCategory object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$groupCategory = new GroupCategory();
			$groupCategory->setGroup($group);
			$this->addGroupCategory($groupCategory);

			$this->collGroups[]= $group;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->order = null;
		$this->module = null;
		$this->active = null;
		$this->ispublic = null;
		$this->oldid = null;
		$this->description = null;
		$this->deleted_at = null;
		$this->tree_left = null;
		$this->tree_right = null;
		$this->tree_level = null;
		$this->scope = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collGroupCategorys) {
				foreach ($this->collGroupCategorys as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		// nested_set behavior
		$this->collNestedSetChildren = null;
		$this->aNestedSetParent = null;
		if ($this->collGroupCategorys instanceof PropelCollection) {
			$this->collGroupCategorys->clearIterator();
		}
		$this->collGroupCategorys = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CategoryPeer::DEFAULT_STRING_FORMAT);
	}

	// soft_delete behavior
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the current object
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		CategoryPeer::disableSoftDelete();
		$this->delete($con);
	}
	
	/**
	 * Undelete a row that was soft_deleted
	 *
	 * @return		 int The number of rows affected by this update and any referring fk objects' save() operations.
	 */
	public function unDelete(PropelPDO $con = null)
	{
		$this->setDeletedAt(null);
		return $this->save($con);
	}

	// nested_set behavior
	
	/**
	 * Execute queries that were saved to be run inside the save transaction
	 */
	protected function processNestedSetQueries($con)
	{
		foreach ($this->nestedSetQueries as $query) {
			$query['arguments'][]= $con;
			call_user_func_array($query['callable'], $query['arguments']);
		}
		$this->nestedSetQueries = array();
	}
	
	/**
	 * Wraps the getter for the nested set left value
	 *
	 * @return     int
	 */
	public function getLeftValue()
	{
		return $this->tree_left;
	}
	
	/**
	 * Wraps the getter for the nested set right value
	 *
	 * @return     int
	 */
	public function getRightValue()
	{
		return $this->tree_right;
	}
	
	/**
	 * Wraps the getter for the nested set level
	 *
	 * @return     int
	 */
	public function getLevel()
	{
		return $this->tree_level;
	}
	
	/**
	 * Wraps the getter for the scope value
	 *
	 * @return     int or null if scope is disabled
	 */
	public function getScopeValue()
	{
		return $this->scope;
	}
	
	/**
	 * Set the value left column
	 *
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setLeftValue($v)
	{
		return $this->setTreeLeft($v);
	}
	
	/**
	 * Set the value of right column
	 *
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setRightValue($v)
	{
		return $this->setTreeRight($v);
	}
	
	/**
	 * Set the value of level column
	 *
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setLevel($v)
	{
		return $this->setTreeLevel($v);
	}
	
	/**
	 * Set the value of scope column
	 *
	 * @param      int $v new value
	 * @return     Category The current object (for fluent API support)
	 */
	public function setScopeValue($v)
	{
		return $this->setScope($v);
	}
	
	/**
	 * Creates the supplied node as the root node.
	 *
	 * @return     Category The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function makeRoot()
	{
		if ($this->getLeftValue() || $this->getRightValue()) {
			throw new PropelException('Cannot turn an existing node into a root node.');
		}
	
		$this->setLeftValue(1);
		$this->setRightValue(2);
		$this->setLevel(0);
		return $this;
	}
	
	/**
	 * Tests if onbject is a node, i.e. if it is inserted in the tree
	 *
	 * @return     bool
	 */
	public function isInTree()
	{
		return $this->getLeftValue() > 0 && $this->getRightValue() > $this->getLeftValue();
	}
	
	/**
	 * Tests if node is a root
	 *
	 * @return     bool
	 */
	public function isRoot()
	{
		return $this->isInTree() && $this->getLeftValue() == 1;
	}
	
	/**
	 * Tests if node is a leaf
	 *
	 * @return     bool
	 */
	public function isLeaf()
	{
		return $this->isInTree() &&  ($this->getRightValue() - $this->getLeftValue()) == 1;
	}
	
	/**
	 * Tests if node is a descendant of another node
	 *
	 * @param      Category $node Propel node object
	 * @return     bool
	 */
	public function isDescendantOf($parent)
	{
		if ($this->getScopeValue() !== $parent->getScopeValue()) {
			throw new PropelException('Comparing two nodes of different trees');
		}
		return $this->isInTree() && $this->getLeftValue() > $parent->getLeftValue() && $this->getRightValue() < $parent->getRightValue();
	}
	
	/**
	 * Tests if node is a ancestor of another node
	 *
	 * @param      Category $node Propel node object
	 * @return     bool
	 */
	public function isAncestorOf($child)
	{
		return $child->isDescendantOf($this);
	}
	
	/**
	 * Tests if object has an ancestor
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasParent(PropelPDO $con = null)
	{
		return $this->getLevel() > 0;
	}
	
	/**
	 * Sets the cache for parent node of the current object.
	 * Warning: this does not move the current object in the tree.
	 * Use moveTofirstChildOf() or moveToLastChildOf() for that purpose
	 *
	 * @param      Category $parent
	 * @return     Category The current object, for fluid interface
	 */
	public function setParent($parent = null)
	{
		$this->aNestedSetParent = $parent;
		return $this;
	}
	
	/**
	 * Gets parent node for the current object if it exists
	 * The result is cached so further calls to the same method don't issue any queries
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getParent(PropelPDO $con = null)
	{
		if ($this->aNestedSetParent === null && $this->hasParent()) {
			$this->aNestedSetParent = CategoryQuery::create()
				->ancestorsOf($this)
				->orderByLevel(true)
				->findOne($con);
		}
		return $this->aNestedSetParent;
	}
	
	/**
	 * Determines if the node has previous sibling
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasPrevSibling(PropelPDO $con = null)
	{
		if (!CategoryPeer::isValid($this)) {
			return false;
		}
		return CategoryQuery::create()
			->filterByTreeRight($this->getLeftValue() - 1)
			->inTree($this->getScopeValue())
			->count($con) > 0;
	}
	
	/**
	 * Gets previous sibling for the given node if it exists
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getPrevSibling(PropelPDO $con = null)
	{
		return CategoryQuery::create()
			->filterByTreeRight($this->getLeftValue() - 1)
			->inTree($this->getScopeValue())
			->findOne($con);
	}
	
	/**
	 * Determines if the node has next sibling
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasNextSibling(PropelPDO $con = null)
	{
		if (!CategoryPeer::isValid($this)) {
			return false;
		}
		return CategoryQuery::create()
			->filterByTreeLeft($this->getRightValue() + 1)
			->inTree($this->getScopeValue())
			->count($con) > 0;
	}
	
	/**
	 * Gets next sibling for the given node if it exists
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getNextSibling(PropelPDO $con = null)
	{
		return CategoryQuery::create()
			->filterByTreeLeft($this->getRightValue() + 1)
			->inTree($this->getScopeValue())
			->findOne($con);
	}
	
	/**
	 * Clears out the $collNestedSetChildren collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 */
	public function clearNestedSetChildren()
	{
		$this->collNestedSetChildren = null;
	}
	
	/**
	 * Initializes the $collNestedSetChildren collection.
	 *
	 * @return     void
	 */
	public function initNestedSetChildren()
	{
		$this->collNestedSetChildren = new PropelObjectCollection();
		$this->collNestedSetChildren->setModel('Category');
	}
	
	/**
	 * Adds an element to the internal $collNestedSetChildren collection.
	 * Beware that this doesn't insert a node in the tree.
	 * This method is only used to facilitate children hydration.
	 *
	 * @param      Category $category
	 *
	 * @return     void
	 */
	public function addNestedSetChild($category)
	{
		if ($this->collNestedSetChildren === null) {
			$this->initNestedSetChildren();
		}
		if (!$this->collNestedSetChildren->contains($category)) { // only add it if the **same** object is not already associated
			$this->collNestedSetChildren[]= $category;
			$category->setParent($this);
		}
	}
	
	/**
	 * Tests if node has children
	 *
	 * @return     bool
	 */
	public function hasChildren()
	{
		return ($this->getRightValue() - $this->getLeftValue()) > 1;
	}
	
	/**
	 * Gets the children of the given node
	 *
	 * @param      Criteria  $criteria Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array     List of Category objects
	 */
	public function getChildren($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNestedSetChildren || null !== $criteria) {
			if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
				// return empty collection
				$this->initNestedSetChildren();
			} else {
				$collNestedSetChildren = CategoryQuery::create(null, $criteria)
	  			->childrenOf($this)
	  			->orderByBranch()
					->find($con);
				if (null !== $criteria) {
					return $collNestedSetChildren;
				}
				$this->collNestedSetChildren = $collNestedSetChildren;
			}
		}
		return $this->collNestedSetChildren;
	}
	
	/**
	 * Gets number of children for the given node
	 *
	 * @param      Criteria  $criteria Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     int       Number of children
	 */
	public function countChildren($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNestedSetChildren || null !== $criteria) {
			if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
				return 0;
			} else {
				return CategoryQuery::create(null, $criteria)
					->childrenOf($this)
					->count($con);
			}
		} else {
			return count($this->collNestedSetChildren);
		}
	}
	
	/**
	 * Gets the first child of the given node
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Category objects
	 */
	public function getFirstChild($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return CategoryQuery::create(null, $query)
				->childrenOf($this)
				->orderByBranch()
				->findOne($con);
		}
	}
	
	/**
	 * Gets the last child of the given node
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Category objects
	 */
	public function getLastChild($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return CategoryQuery::create(null, $query)
				->childrenOf($this)
				->orderByBranch(true)
				->findOne($con);
		}
	}
	
	/**
	 * Gets the siblings of the given node
	 *
	 * @param      bool			$includeNode Whether to include the current node or not
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 *
	 * @return     array 		List of Category objects
	 */
	public function getSiblings($includeNode = false, $query = null, PropelPDO $con = null)
	{
		if($this->isRoot()) {
			return array();
		} else {
			 $query = CategoryQuery::create(null, $query)
					->childrenOf($this->getParent($con))
					->orderByBranch();
			if (!$includeNode) {
				$query->prune($this);
			}
			return $query->find($con);
		}
	}
	
	/**
	 * Gets descendants for the given node
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Category objects
	 */
	public function getDescendants($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return CategoryQuery::create(null, $query)
				->descendantsOf($this)
				->orderByBranch()
				->find($con);
		}
	}
	
	/**
	 * Gets number of descendants for the given node
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     int 		Number of descendants
	 */
	public function countDescendants($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			// save one query
			return 0;
		} else {
			return CategoryQuery::create(null, $query)
				->descendantsOf($this)
				->count($con);
		}
	}
	
	/**
	 * Gets descendants for the given node, plus the current node
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Category objects
	 */
	public function getBranch($query = null, PropelPDO $con = null)
	{
		return CategoryQuery::create(null, $query)
			->branchOf($this)
			->orderByBranch()
			->find($con);
	}
	
	/**
	 * Gets ancestors for the given node, starting with the root node
	 * Use it for breadcrumb paths for instance
	 *
	 * @param      Criteria $query Criteria to filter results. 
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Category objects
	 */
	public function getAncestors($query = null, PropelPDO $con = null)
	{
		if($this->isRoot()) {
			// save one query
			return array();
		} else {
			return CategoryQuery::create(null, $query)
				->ancestorsOf($this)
				->orderByBranch()
				->find($con);
		}
	}
	
	/**
	 * Inserts the given $child node as first child of current
	 * The modifications in the current object and the tree
	 * are not persisted until the child object is saved.
	 *
	 * @param      Category $child	Propel object for child node
	 *
	 * @return     Category The current Propel object
	 */
	public function addChild(Category $child)
	{
		if ($this->isNew()) {
			throw new PropelException('A Category object must not be new to accept children.');
		}
		$child->insertAsFirstChildOf($this);
		return $this;
	}
	
	/**
	 * Inserts the current node as first child of given $parent node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Category $parent	Propel object for parent node
	 *
	 * @return     Category The current Propel object
	 */
	public function insertAsFirstChildOf($parent)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Category object must not already be in the tree to be inserted. Use the moveToFirstChildOf() instead.');
		}
		$left = $parent->getLeftValue() + 1;
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($parent->getLevel() + 1);
		$scope = $parent->getScopeValue();
		$this->setScopeValue($scope);
		// update the children collection of the parent
		$parent->addNestedSetChild($this);
		
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('CategoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $scope, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as last child of given $parent node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Category $parent	Propel object for parent node
	 *
	 * @return     Category The current Propel object
	 */
	public function insertAsLastChildOf($parent)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Category object must not already be in the tree to be inserted. Use the moveToLastChildOf() instead.');
		}
		$left = $parent->getRightValue();
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($parent->getLevel() + 1);
		$scope = $parent->getScopeValue();
		$this->setScopeValue($scope);
		// update the children collection of the parent
		$parent->addNestedSetChild($this);
		
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('CategoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $scope, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as prev sibling given $sibling node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Category $sibling	Propel object for parent node
	 *
	 * @return     Category The current Propel object
	 */
	public function insertAsPrevSiblingOf($sibling)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Category object must not already be in the tree to be inserted. Use the moveToPrevSiblingOf() instead.');
		}
		$left = $sibling->getLeftValue();
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($sibling->getLevel());
		$scope = $sibling->getScopeValue();
		$this->setScopeValue($scope);
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('CategoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $scope, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as next sibling given $sibling node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Category $sibling	Propel object for parent node
	 *
	 * @return     Category The current Propel object
	 */
	public function insertAsNextSiblingOf($sibling)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Category object must not already be in the tree to be inserted. Use the moveToNextSiblingOf() instead.');
		}
		$left = $sibling->getRightValue() + 1;
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($sibling->getLevel());
		$scope = $sibling->getScopeValue();
		$this->setScopeValue($scope);
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('CategoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $scope, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the first child of $parent
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Category $parent	Propel object for parent node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Category The current Propel object
	 */
	public function moveToFirstChildOf($parent, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Category object must be already in the tree to be moved. Use the insertAsFirstChildOf() instead.');
		}
		if ($parent->getScopeValue() != $this->getScopeValue()) {
			throw new PropelException('Moving nodes across trees is not supported');
		}
		if ($parent->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
		}
		
		$this->moveSubtreeTo($parent->getLeftValue() + 1, $parent->getLevel() - $this->getLevel() + 1, $con);
		
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the last child of $parent
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Category $parent	Propel object for parent node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Category The current Propel object
	 */
	public function moveToLastChildOf($parent, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Category object must be already in the tree to be moved. Use the insertAsLastChildOf() instead.');
		}
		if ($parent->getScopeValue() != $this->getScopeValue()) {
			throw new PropelException('Moving nodes across trees is not supported');
		}
		if ($parent->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
		}
		
		$this->moveSubtreeTo($parent->getRightValue(), $parent->getLevel() - $this->getLevel() + 1, $con);
		
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the previous sibling of $sibling
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Category $sibling	Propel object for sibling node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Category The current Propel object
	 */
	public function moveToPrevSiblingOf($sibling, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Category object must be already in the tree to be moved. Use the insertAsPrevSiblingOf() instead.');
		}
		if ($sibling->isRoot()) {
			throw new PropelException('Cannot move to previous sibling of a root node.');
		}
		if ($sibling->getScopeValue() != $this->getScopeValue()) {
			throw new PropelException('Moving nodes across trees is not supported');
		}
		if ($sibling->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
		}
		
		$this->moveSubtreeTo($sibling->getLeftValue(), $sibling->getLevel() - $this->getLevel(), $con);
		
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the next sibling of $sibling
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Category $sibling	Propel object for sibling node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Category The current Propel object
	 */
	public function moveToNextSiblingOf($sibling, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Category object must be already in the tree to be moved. Use the insertAsNextSiblingOf() instead.');
		}
		if ($sibling->isRoot()) {
			throw new PropelException('Cannot move to next sibling of a root node.');
		}
		if ($sibling->getScopeValue() != $this->getScopeValue()) {
			throw new PropelException('Moving nodes across trees is not supported');
		}
		if ($sibling->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
		}
		
		$this->moveSubtreeTo($sibling->getRightValue() + 1, $sibling->getLevel() - $this->getLevel(), $con);
		
		return $this;
	}
	
	/**
	 * Move current node and its children to location $destLeft and updates rest of tree
	 *
	 * @param      int	$destLeft Destination left value
	 * @param      int	$levelDelta Delta to add to the levels
	 * @param      PropelPDO $con		Connection to use.
	 */
	protected function moveSubtreeTo($destLeft, $levelDelta, PropelPDO $con = null)
	{
		$left  = $this->getLeftValue();
		$right = $this->getRightValue();
		$scope = $this->getScopeValue();
	
		$treeSize = $right - $left +1;
		
		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
			
		$con->beginTransaction();
		try {
			// make room next to the target for the subtree
			CategoryPeer::shiftRLValues($treeSize, $destLeft, null, $scope, $con);
		
			if ($left >= $destLeft) { // src was shifted too?
				$left += $treeSize;
				$right += $treeSize;
			}
			
			if ($levelDelta) {
				// update the levels of the subtree
				CategoryPeer::shiftLevel($levelDelta, $left, $right, $scope, $con);
			}
			
			// move the subtree to the target
			CategoryPeer::shiftRLValues($destLeft - $left, $left, $right, $scope, $con);
		
			// remove the empty room at the previous location of the subtree
			CategoryPeer::shiftRLValues(-$treeSize, $right + 1, null, $scope, $con);
			
			// update all loaded nodes
			CategoryPeer::updateLoadedNodes(null, $con);
			
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Deletes all descendants for the given node
	 * Instance pooling is wiped out by this command, 
	 * so existing Category instances are probably invalid (except for the current one)
	 *
	 * @param      PropelPDO $con Connection to use.
	 *
	 * @return     int 		number of deleted nodes
	 */
	public function deleteDescendants(PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			// save one query
			return;
		}
		if ($con === null) {
			$con = Propel::getConnection(CategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$left = $this->getLeftValue();
		$right = $this->getRightValue();
		$scope = $this->getScopeValue();
		$con->beginTransaction();
		try {
			// delete descendant nodes (will empty the instance pool)
			$ret = CategoryQuery::create()
				->descendantsOf($this)
				->delete($con);
			
			// fill up the room that was used by descendants
			CategoryPeer::shiftRLValues($left - $right + 1, $right, null, $scope, $con);
			
			// fix the right value for the current node, which is now a leaf
			$this->setRightValue($left + 1);
			
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
		
		return $ret;
	}
	
	/**
	 * Returns a pre-order iterator for this node and its children.
	 *
	 * @return     RecursiveIterator
	 */
	public function getIterator()
	{
		return new NestedSetRecursiveIterator($this);
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BaseCategory
