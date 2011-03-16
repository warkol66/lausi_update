<?php


/**
 * Base class that represents a row from the 'lausi_clientAddress' table.
 *
 * Base de Direcciones de Clientes
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseClientAddress extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClientAddressPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientAddressPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the street field.
	 * @var        string
	 */
	protected $street;

	/**
	 * The value for the number field.
	 * @var        int
	 */
	protected $number;

	/**
	 * The value for the intersection field.
	 * @var        string
	 */
	protected $intersection;

	/**
	 * The value for the latitude field.
	 * @var        double
	 */
	protected $latitude;

	/**
	 * The value for the longitude field.
	 * @var        double
	 */
	protected $longitude;

	/**
	 * The value for the type field.
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the circuitid field.
	 * @var        int
	 */
	protected $circuitid;

	/**
	 * The value for the clientid field.
	 * @var        int
	 */
	protected $clientid;

	/**
	 * The value for the regionid field.
	 * @var        int
	 */
	protected $regionid;

	/**
	 * @var        Circuit
	 */
	protected $aCircuit;

	/**
	 * @var        Client
	 */
	protected $aClient;

	/**
	 * @var        Region
	 */
	protected $aRegion;

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
	 * Id de la direccion del cliente
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [street] column value.
	 * Nombre de la direccion del cliente
	 * @return     string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Get the [number] column value.
	 * numero de la direccion del cliente
	 * @return     int
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Get the [intersection] column value.
	 * cruce con otra calle de la direccion del cliente
	 * @return     string
	 */
	public function getIntersection()
	{
		return $this->intersection;
	}

	/**
	 * Get the [latitude] column value.
	 * latitud de la direccion del cliente
	 * @return     double
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [longitude] column value.
	 * longitud de la direccion del cliente
	 * @return     double
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [type] column value.
	 * tipo de la direccion del cliente
	 * @return     string
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Get the [circuitid] column value.
	 * circuito al que pertenece la direccion del cliente
	 * @return     int
	 */
	public function getCircuitid()
	{
		return $this->circuitid;
	}

	/**
	 * Get the [clientid] column value.
	 * Id del cliente de esa direccion
	 * @return     int
	 */
	public function getClientid()
	{
		return $this->clientid;
	}

	/**
	 * Get the [regionid] column value.
	 * barrio de la direccion
	 * @return     int
	 */
	public function getRegionid()
	{
		return $this->regionid;
	}

	/**
	 * Set the value of [id] column.
	 * Id de la direccion del cliente
	 * @param      int $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientAddressPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [street] column.
	 * Nombre de la direccion del cliente
	 * @param      string $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setStreet($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->street !== $v) {
			$this->street = $v;
			$this->modifiedColumns[] = ClientAddressPeer::STREET;
		}

		return $this;
	} // setStreet()

	/**
	 * Set the value of [number] column.
	 * numero de la direccion del cliente
	 * @param      int $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setNumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = ClientAddressPeer::NUMBER;
		}

		return $this;
	} // setNumber()

	/**
	 * Set the value of [intersection] column.
	 * cruce con otra calle de la direccion del cliente
	 * @param      string $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setIntersection($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->intersection !== $v) {
			$this->intersection = $v;
			$this->modifiedColumns[] = ClientAddressPeer::INTERSECTION;
		}

		return $this;
	} // setIntersection()

	/**
	 * Set the value of [latitude] column.
	 * latitud de la direccion del cliente
	 * @param      double $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = ClientAddressPeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [longitude] column.
	 * longitud de la direccion del cliente
	 * @param      double $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = ClientAddressPeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [type] column.
	 * tipo de la direccion del cliente
	 * @param      string $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = ClientAddressPeer::TYPE;
		}

		return $this;
	} // setType()

	/**
	 * Set the value of [circuitid] column.
	 * circuito al que pertenece la direccion del cliente
	 * @param      int $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setCircuitid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->circuitid !== $v) {
			$this->circuitid = $v;
			$this->modifiedColumns[] = ClientAddressPeer::CIRCUITID;
		}

		if ($this->aCircuit !== null && $this->aCircuit->getId() !== $v) {
			$this->aCircuit = null;
		}

		return $this;
	} // setCircuitid()

	/**
	 * Set the value of [clientid] column.
	 * Id del cliente de esa direccion
	 * @param      int $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setClientid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->clientid !== $v) {
			$this->clientid = $v;
			$this->modifiedColumns[] = ClientAddressPeer::CLIENTID;
		}

		if ($this->aClient !== null && $this->aClient->getId() !== $v) {
			$this->aClient = null;
		}

		return $this;
	} // setClientid()

	/**
	 * Set the value of [regionid] column.
	 * barrio de la direccion
	 * @param      int $v new value
	 * @return     ClientAddress The current object (for fluent API support)
	 */
	public function setRegionid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->regionid !== $v) {
			$this->regionid = $v;
			$this->modifiedColumns[] = ClientAddressPeer::REGIONID;
		}

		if ($this->aRegion !== null && $this->aRegion->getId() !== $v) {
			$this->aRegion = null;
		}

		return $this;
	} // setRegionid()

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
			$this->street = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->number = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->intersection = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->latitude = ($row[$startcol + 4] !== null) ? (double) $row[$startcol + 4] : null;
			$this->longitude = ($row[$startcol + 5] !== null) ? (double) $row[$startcol + 5] : null;
			$this->type = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->circuitid = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->clientid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->regionid = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = ClientAddressPeer::NUM_COLUMNS - ClientAddressPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating ClientAddress object", $e);
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

		if ($this->aCircuit !== null && $this->circuitid !== $this->aCircuit->getId()) {
			$this->aCircuit = null;
		}
		if ($this->aClient !== null && $this->clientid !== $this->aClient->getId()) {
			$this->aClient = null;
		}
		if ($this->aRegion !== null && $this->regionid !== $this->aRegion->getId()) {
			$this->aRegion = null;
		}
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
			$con = Propel::getConnection(ClientAddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientAddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCircuit = null;
			$this->aClient = null;
			$this->aRegion = null;
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
			$con = Propel::getConnection(ClientAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				ClientAddressQuery::create()
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
			$con = Propel::getConnection(ClientAddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClientAddressPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCircuit !== null) {
				if ($this->aCircuit->isModified() || $this->aCircuit->isNew()) {
					$affectedRows += $this->aCircuit->save($con);
				}
				$this->setCircuit($this->aCircuit);
			}

			if ($this->aClient !== null) {
				if ($this->aClient->isModified() || $this->aClient->isNew()) {
					$affectedRows += $this->aClient->save($con);
				}
				$this->setClient($this->aClient);
			}

			if ($this->aRegion !== null) {
				if ($this->aRegion->isModified() || $this->aRegion->isNew()) {
					$affectedRows += $this->aRegion->save($con);
				}
				$this->setRegion($this->aRegion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ClientAddressPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(ClientAddressPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientAddressPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += ClientAddressPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCircuit !== null) {
				if (!$this->aCircuit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCircuit->getValidationFailures());
				}
			}

			if ($this->aClient !== null) {
				if (!$this->aClient->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aClient->getValidationFailures());
				}
			}

			if ($this->aRegion !== null) {
				if (!$this->aRegion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRegion->getValidationFailures());
				}
			}


			if (($retval = ClientAddressPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = ClientAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getStreet();
				break;
			case 2:
				return $this->getNumber();
				break;
			case 3:
				return $this->getIntersection();
				break;
			case 4:
				return $this->getLatitude();
				break;
			case 5:
				return $this->getLongitude();
				break;
			case 6:
				return $this->getType();
				break;
			case 7:
				return $this->getCircuitid();
				break;
			case 8:
				return $this->getClientid();
				break;
			case 9:
				return $this->getRegionid();
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
		if (isset($alreadyDumpedObjects['ClientAddress'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['ClientAddress'][$this->getPrimaryKey()] = true;
		$keys = ClientAddressPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getStreet(),
			$keys[2] => $this->getNumber(),
			$keys[3] => $this->getIntersection(),
			$keys[4] => $this->getLatitude(),
			$keys[5] => $this->getLongitude(),
			$keys[6] => $this->getType(),
			$keys[7] => $this->getCircuitid(),
			$keys[8] => $this->getClientid(),
			$keys[9] => $this->getRegionid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCircuit) {
				$result['Circuit'] = $this->aCircuit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aClient) {
				$result['Client'] = $this->aClient->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aRegion) {
				$result['Region'] = $this->aRegion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = ClientAddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setStreet($value);
				break;
			case 2:
				$this->setNumber($value);
				break;
			case 3:
				$this->setIntersection($value);
				break;
			case 4:
				$this->setLatitude($value);
				break;
			case 5:
				$this->setLongitude($value);
				break;
			case 6:
				$this->setType($value);
				break;
			case 7:
				$this->setCircuitid($value);
				break;
			case 8:
				$this->setClientid($value);
				break;
			case 9:
				$this->setRegionid($value);
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
		$keys = ClientAddressPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setStreet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIntersection($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLatitude($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLongitude($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCircuitid($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setClientid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRegionid($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientAddressPeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientAddressPeer::ID)) $criteria->add(ClientAddressPeer::ID, $this->id);
		if ($this->isColumnModified(ClientAddressPeer::STREET)) $criteria->add(ClientAddressPeer::STREET, $this->street);
		if ($this->isColumnModified(ClientAddressPeer::NUMBER)) $criteria->add(ClientAddressPeer::NUMBER, $this->number);
		if ($this->isColumnModified(ClientAddressPeer::INTERSECTION)) $criteria->add(ClientAddressPeer::INTERSECTION, $this->intersection);
		if ($this->isColumnModified(ClientAddressPeer::LATITUDE)) $criteria->add(ClientAddressPeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(ClientAddressPeer::LONGITUDE)) $criteria->add(ClientAddressPeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(ClientAddressPeer::TYPE)) $criteria->add(ClientAddressPeer::TYPE, $this->type);
		if ($this->isColumnModified(ClientAddressPeer::CIRCUITID)) $criteria->add(ClientAddressPeer::CIRCUITID, $this->circuitid);
		if ($this->isColumnModified(ClientAddressPeer::CLIENTID)) $criteria->add(ClientAddressPeer::CLIENTID, $this->clientid);
		if ($this->isColumnModified(ClientAddressPeer::REGIONID)) $criteria->add(ClientAddressPeer::REGIONID, $this->regionid);

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
		$criteria = new Criteria(ClientAddressPeer::DATABASE_NAME);
		$criteria->add(ClientAddressPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of ClientAddress (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setStreet($this->street);
		$copyObj->setNumber($this->number);
		$copyObj->setIntersection($this->intersection);
		$copyObj->setLatitude($this->latitude);
		$copyObj->setLongitude($this->longitude);
		$copyObj->setType($this->type);
		$copyObj->setCircuitid($this->circuitid);
		$copyObj->setClientid($this->clientid);
		$copyObj->setRegionid($this->regionid);
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
	 * @return     ClientAddress Clone of current object.
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
	 * @return     ClientAddressPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientAddressPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Circuit object.
	 *
	 * @param      Circuit $v
	 * @return     ClientAddress The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCircuit(Circuit $v = null)
	{
		if ($v === null) {
			$this->setCircuitid(NULL);
		} else {
			$this->setCircuitid($v->getId());
		}

		$this->aCircuit = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Circuit object, it will not be re-added.
		if ($v !== null) {
			$v->addClientAddress($this);
		}

		return $this;
	}


	/**
	 * Get the associated Circuit object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Circuit The associated Circuit object.
	 * @throws     PropelException
	 */
	public function getCircuit(PropelPDO $con = null)
	{
		if ($this->aCircuit === null && ($this->circuitid !== null)) {
			$this->aCircuit = CircuitQuery::create()->findPk($this->circuitid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCircuit->addClientAddresss($this);
			 */
		}
		return $this->aCircuit;
	}

	/**
	 * Declares an association between this object and a Client object.
	 *
	 * @param      Client $v
	 * @return     ClientAddress The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setClient(Client $v = null)
	{
		if ($v === null) {
			$this->setClientid(NULL);
		} else {
			$this->setClientid($v->getId());
		}

		$this->aClient = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Client object, it will not be re-added.
		if ($v !== null) {
			$v->addClientAddress($this);
		}

		return $this;
	}


	/**
	 * Get the associated Client object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Client The associated Client object.
	 * @throws     PropelException
	 */
	public function getClient(PropelPDO $con = null)
	{
		if ($this->aClient === null && ($this->clientid !== null)) {
			$this->aClient = ClientQuery::create()->findPk($this->clientid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aClient->addClientAddresss($this);
			 */
		}
		return $this->aClient;
	}

	/**
	 * Declares an association between this object and a Region object.
	 *
	 * @param      Region $v
	 * @return     ClientAddress The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRegion(Region $v = null)
	{
		if ($v === null) {
			$this->setRegionid(NULL);
		} else {
			$this->setRegionid($v->getId());
		}

		$this->aRegion = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Region object, it will not be re-added.
		if ($v !== null) {
			$v->addClientAddress($this);
		}

		return $this;
	}


	/**
	 * Get the associated Region object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Region The associated Region object.
	 * @throws     PropelException
	 */
	public function getRegion(PropelPDO $con = null)
	{
		if ($this->aRegion === null && ($this->regionid !== null)) {
			$this->aRegion = RegionQuery::create()->findPk($this->regionid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aRegion->addClientAddresss($this);
			 */
		}
		return $this->aRegion;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->street = null;
		$this->number = null;
		$this->intersection = null;
		$this->latitude = null;
		$this->longitude = null;
		$this->type = null;
		$this->circuitid = null;
		$this->clientid = null;
		$this->regionid = null;
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
		} // if ($deep)

		$this->aCircuit = null;
		$this->aClient = null;
		$this->aRegion = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ClientAddressPeer::DEFAULT_STRING_FORMAT);
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

} // BaseClientAddress
