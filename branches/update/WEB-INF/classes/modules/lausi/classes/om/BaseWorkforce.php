<?php


/**
 * Base class that represents a row from the 'lausi_workforce' table.
 *
 * Base de Fuerza de Trabajo
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseWorkforce extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'WorkforcePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        WorkforcePeer
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
	 * The value for the telephone field.
	 * @var        string
	 */
	protected $telephone;

	/**
	 * The value for the workinheight field.
	 * @var        boolean
	 */
	protected $workinheight;

	/**
	 * The value for the deleted_at field.
	 * @var        string
	 */
	protected $deleted_at;

	/**
	 * @var        array WorkforceCircuit[] Collection to store aggregation of WorkforceCircuit objects.
	 */
	protected $collWorkforceCircuits;

	/**
	 * @var        array Advertisement[] Collection to store aggregation of Advertisement objects.
	 */
	protected $collAdvertisements;

	/**
	 * @var        array Circuit[] Collection to store aggregation of Circuit objects.
	 */
	protected $collCircuits;

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

	/**
	 * Get the [id] column value.
	 * Id de fuerza de trabajo
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre de fuerza de trabajo
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [telephone] column value.
	 * telefono de contacto
	 * @return     string
	 */
	public function getTelephone()
	{
		return $this->telephone;
	}

	/**
	 * Get the [workinheight] column value.
	 * Trabaja en altura
	 * @return     boolean
	 */
	public function getWorkinheight()
	{
		return $this->workinheight;
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
	 * Set the value of [id] column.
	 * Id de fuerza de trabajo
	 * @param      int $v new value
	 * @return     Workforce The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = WorkforcePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre de fuerza de trabajo
	 * @param      string $v new value
	 * @return     Workforce The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = WorkforcePeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [telephone] column.
	 * telefono de contacto
	 * @param      string $v new value
	 * @return     Workforce The current object (for fluent API support)
	 */
	public function setTelephone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telephone !== $v) {
			$this->telephone = $v;
			$this->modifiedColumns[] = WorkforcePeer::TELEPHONE;
		}

		return $this;
	} // setTelephone()

	/**
	 * Sets the value of the [workinheight] column. 
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * Trabaja en altura
	 * @param      boolean|integer|string $v The new value
	 * @return     Workforce The current object (for fluent API support)
	 */
	public function setWorkinheight($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->workinheight !== $v) {
			$this->workinheight = $v;
			$this->modifiedColumns[] = WorkforcePeer::WORKINHEIGHT;
		}

		return $this;
	} // setWorkinheight()

	/**
	 * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Workforce The current object (for fluent API support)
	 */
	public function setDeletedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->deleted_at !== null || $dt !== null) {
			$currentDateAsString = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->deleted_at = $newDateAsString;
				$this->modifiedColumns[] = WorkforcePeer::DELETED_AT;
			}
		} // if either are not null

		return $this;
	} // setDeletedAt()

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
			$this->telephone = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->workinheight = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->deleted_at = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = WorkforcePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Workforce object", $e);
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
			$con = Propel::getConnection(WorkforcePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = WorkforcePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collWorkforceCircuits = null;

			$this->collAdvertisements = null;

			$this->collCircuits = null;
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
			$con = Propel::getConnection(WorkforcePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// soft_delete behavior
			if (!empty($ret) && WorkforceQuery::isSoftDeleteEnabled()) {
				$this->setDeletedAt(time());
				$this->save($con);
				$con->commit();
				WorkforcePeer::removeInstanceFromPool($this);
				return;
			}

			if ($ret) {
				WorkforceQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
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
			$con = Propel::getConnection(WorkforcePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
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
				WorkforcePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = WorkforcePeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(WorkforcePeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.WorkforcePeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = WorkforcePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collWorkforceCircuits !== null) {
				foreach ($this->collWorkforceCircuits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAdvertisements !== null) {
				foreach ($this->collAdvertisements as $referrerFK) {
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


			if (($retval = WorkforcePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collWorkforceCircuits !== null) {
					foreach ($this->collWorkforceCircuits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAdvertisements !== null) {
					foreach ($this->collAdvertisements as $referrerFK) {
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
		$pos = WorkforcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTelephone();
				break;
			case 3:
				return $this->getWorkinheight();
				break;
			case 4:
				return $this->getDeletedAt();
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
		if (isset($alreadyDumpedObjects['Workforce'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Workforce'][$this->getPrimaryKey()] = true;
		$keys = WorkforcePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getTelephone(),
			$keys[3] => $this->getWorkinheight(),
			$keys[4] => $this->getDeletedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collWorkforceCircuits) {
				$result['WorkforceCircuits'] = $this->collWorkforceCircuits->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collAdvertisements) {
				$result['Advertisements'] = $this->collAdvertisements->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = WorkforcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTelephone($value);
				break;
			case 3:
				$this->setWorkinheight($value);
				break;
			case 4:
				$this->setDeletedAt($value);
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
		$keys = WorkforcePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTelephone($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setWorkinheight($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDeletedAt($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(WorkforcePeer::DATABASE_NAME);

		if ($this->isColumnModified(WorkforcePeer::ID)) $criteria->add(WorkforcePeer::ID, $this->id);
		if ($this->isColumnModified(WorkforcePeer::NAME)) $criteria->add(WorkforcePeer::NAME, $this->name);
		if ($this->isColumnModified(WorkforcePeer::TELEPHONE)) $criteria->add(WorkforcePeer::TELEPHONE, $this->telephone);
		if ($this->isColumnModified(WorkforcePeer::WORKINHEIGHT)) $criteria->add(WorkforcePeer::WORKINHEIGHT, $this->workinheight);
		if ($this->isColumnModified(WorkforcePeer::DELETED_AT)) $criteria->add(WorkforcePeer::DELETED_AT, $this->deleted_at);

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
		$criteria = new Criteria(WorkforcePeer::DATABASE_NAME);
		$criteria->add(WorkforcePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Workforce (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->getName());
		$copyObj->setTelephone($this->getTelephone());
		$copyObj->setWorkinheight($this->getWorkinheight());
		$copyObj->setDeletedAt($this->getDeletedAt());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getWorkforceCircuits() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addWorkforceCircuit($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAdvertisements() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdvertisement($relObj->copy($deepCopy));
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
	 * @return     Workforce Clone of current object.
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
	 * @return     WorkforcePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new WorkforcePeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collWorkforceCircuits collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addWorkforceCircuits()
	 */
	public function clearWorkforceCircuits()
	{
		$this->collWorkforceCircuits = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collWorkforceCircuits collection.
	 *
	 * By default this just sets the collWorkforceCircuits collection to an empty array (like clearcollWorkforceCircuits());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initWorkforceCircuits($overrideExisting = true)
	{
		if (null !== $this->collWorkforceCircuits && !$overrideExisting) {
			return;
		}
		$this->collWorkforceCircuits = new PropelObjectCollection();
		$this->collWorkforceCircuits->setModel('WorkforceCircuit');
	}

	/**
	 * Gets an array of WorkforceCircuit objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Workforce is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array WorkforceCircuit[] List of WorkforceCircuit objects
	 * @throws     PropelException
	 */
	public function getWorkforceCircuits($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collWorkforceCircuits || null !== $criteria) {
			if ($this->isNew() && null === $this->collWorkforceCircuits) {
				// return empty collection
				$this->initWorkforceCircuits();
			} else {
				$collWorkforceCircuits = WorkforceCircuitQuery::create(null, $criteria)
					->filterByWorkforce($this)
					->find($con);
				if (null !== $criteria) {
					return $collWorkforceCircuits;
				}
				$this->collWorkforceCircuits = $collWorkforceCircuits;
			}
		}
		return $this->collWorkforceCircuits;
	}

	/**
	 * Returns the number of related WorkforceCircuit objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related WorkforceCircuit objects.
	 * @throws     PropelException
	 */
	public function countWorkforceCircuits(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collWorkforceCircuits || null !== $criteria) {
			if ($this->isNew() && null === $this->collWorkforceCircuits) {
				return 0;
			} else {
				$query = WorkforceCircuitQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWorkforce($this)
					->count($con);
			}
		} else {
			return count($this->collWorkforceCircuits);
		}
	}

	/**
	 * Method called to associate a WorkforceCircuit object to this object
	 * through the WorkforceCircuit foreign key attribute.
	 *
	 * @param      WorkforceCircuit $l WorkforceCircuit
	 * @return     void
	 * @throws     PropelException
	 */
	public function addWorkforceCircuit(WorkforceCircuit $l)
	{
		if ($this->collWorkforceCircuits === null) {
			$this->initWorkforceCircuits();
		}
		if (!$this->collWorkforceCircuits->contains($l)) { // only add it if the **same** object is not already associated
			$this->collWorkforceCircuits[]= $l;
			$l->setWorkforce($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Workforce is new, it will return
	 * an empty collection; or if this Workforce has previously
	 * been saved, it will retrieve related WorkforceCircuits from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Workforce.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array WorkforceCircuit[] List of WorkforceCircuit objects
	 */
	public function getWorkforceCircuitsJoinCircuit($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = WorkforceCircuitQuery::create(null, $criteria);
		$query->joinWith('Circuit', $join_behavior);

		return $this->getWorkforceCircuits($query, $con);
	}

	/**
	 * Clears out the collAdvertisements collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvertisements()
	 */
	public function clearAdvertisements()
	{
		$this->collAdvertisements = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvertisements collection.
	 *
	 * By default this just sets the collAdvertisements collection to an empty array (like clearcollAdvertisements());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAdvertisements($overrideExisting = true)
	{
		if (null !== $this->collAdvertisements && !$overrideExisting) {
			return;
		}
		$this->collAdvertisements = new PropelObjectCollection();
		$this->collAdvertisements->setModel('Advertisement');
	}

	/**
	 * Gets an array of Advertisement objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Workforce is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Advertisement[] List of Advertisement objects
	 * @throws     PropelException
	 */
	public function getAdvertisements($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvertisements || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvertisements) {
				// return empty collection
				$this->initAdvertisements();
			} else {
				$collAdvertisements = AdvertisementQuery::create(null, $criteria)
					->filterByWorkforce($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvertisements;
				}
				$this->collAdvertisements = $collAdvertisements;
			}
		}
		return $this->collAdvertisements;
	}

	/**
	 * Returns the number of related Advertisement objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Advertisement objects.
	 * @throws     PropelException
	 */
	public function countAdvertisements(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvertisements || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvertisements) {
				return 0;
			} else {
				$query = AdvertisementQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWorkforce($this)
					->count($con);
			}
		} else {
			return count($this->collAdvertisements);
		}
	}

	/**
	 * Method called to associate a Advertisement object to this object
	 * through the Advertisement foreign key attribute.
	 *
	 * @param      Advertisement $l Advertisement
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAdvertisement(Advertisement $l)
	{
		if ($this->collAdvertisements === null) {
			$this->initAdvertisements();
		}
		if (!$this->collAdvertisements->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAdvertisements[]= $l;
			$l->setWorkforce($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Workforce is new, it will return
	 * an empty collection; or if this Workforce has previously
	 * been saved, it will retrieve related Advertisements from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Workforce.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Advertisement[] List of Advertisement objects
	 */
	public function getAdvertisementsJoinBillboard($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdvertisementQuery::create(null, $criteria);
		$query->joinWith('Billboard', $join_behavior);

		return $this->getAdvertisements($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Workforce is new, it will return
	 * an empty collection; or if this Workforce has previously
	 * been saved, it will retrieve related Advertisements from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Workforce.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Advertisement[] List of Advertisement objects
	 */
	public function getAdvertisementsJoinTheme($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdvertisementQuery::create(null, $criteria);
		$query->joinWith('Theme', $join_behavior);

		return $this->getAdvertisements($query, $con);
	}

	/**
	 * Clears out the collCircuits collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCircuits()
	 */
	public function clearCircuits()
	{
		$this->collCircuits = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCircuits collection.
	 *
	 * By default this just sets the collCircuits collection to an empty collection (like clearCircuits());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCircuits()
	{
		$this->collCircuits = new PropelObjectCollection();
		$this->collCircuits->setModel('Circuit');
	}

	/**
	 * Gets a collection of Circuit objects related by a many-to-many relationship
	 * to the current object by way of the lausi_workforceCircuit cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Workforce is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Circuit[] List of Circuit objects
	 */
	public function getCircuits($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCircuits || null !== $criteria) {
			if ($this->isNew() && null === $this->collCircuits) {
				// return empty collection
				$this->initCircuits();
			} else {
				$collCircuits = CircuitQuery::create(null, $criteria)
					->filterByWorkforce($this)
					->find($con);
				if (null !== $criteria) {
					return $collCircuits;
				}
				$this->collCircuits = $collCircuits;
			}
		}
		return $this->collCircuits;
	}

	/**
	 * Gets the number of Circuit objects related by a many-to-many relationship
	 * to the current object by way of the lausi_workforceCircuit cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Circuit objects
	 */
	public function countCircuits($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCircuits || null !== $criteria) {
			if ($this->isNew() && null === $this->collCircuits) {
				return 0;
			} else {
				$query = CircuitQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByWorkforce($this)
					->count($con);
			}
		} else {
			return count($this->collCircuits);
		}
	}

	/**
	 * Associate a Circuit object to this object
	 * through the lausi_workforceCircuit cross reference table.
	 *
	 * @param      Circuit $circuit The WorkforceCircuit object to relate
	 * @return     void
	 */
	public function addCircuit($circuit)
	{
		if ($this->collCircuits === null) {
			$this->initCircuits();
		}
		if (!$this->collCircuits->contains($circuit)) { // only add it if the **same** object is not already associated
			$workforceCircuit = new WorkforceCircuit();
			$workforceCircuit->setCircuit($circuit);
			$this->addWorkforceCircuit($workforceCircuit);

			$this->collCircuits[]= $circuit;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->telephone = null;
		$this->workinheight = null;
		$this->deleted_at = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
			if ($this->collWorkforceCircuits) {
				foreach ($this->collWorkforceCircuits as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAdvertisements) {
				foreach ($this->collAdvertisements as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collWorkforceCircuits instanceof PropelCollection) {
			$this->collWorkforceCircuits->clearIterator();
		}
		$this->collWorkforceCircuits = null;
		if ($this->collAdvertisements instanceof PropelCollection) {
			$this->collAdvertisements->clearIterator();
		}
		$this->collAdvertisements = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(WorkforcePeer::DEFAULT_STRING_FORMAT);
	}

	// soft_delete behavior
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the current object
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		WorkforcePeer::disableSoftDelete();
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

} // BaseWorkforce
