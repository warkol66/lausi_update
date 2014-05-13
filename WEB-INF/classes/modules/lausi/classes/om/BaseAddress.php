<?php


/**
 * Base class that represents a row from the 'lausi_address' table.
 *
 * Base de Direcciones
 *
 * @package    propel.generator.lausi.classes.om
 */
abstract class BaseAddress extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AddressPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AddressPeer
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
	 * The value for the rating field.
	 * @var        int
	 */
	protected $rating;

	/**
	 * The value for the intersection field.
	 * @var        string
	 */
	protected $intersection;

	/**
	 * The value for the owner field.
	 * @var        string
	 */
	protected $owner;

	/**
	 * The value for the latitude field.
	 * @var        string
	 */
	protected $latitude;

	/**
	 * The value for the longitude field.
	 * @var        string
	 */
	protected $longitude;

	/**
	 * The value for the regionid field.
	 * @var        int
	 */
	protected $regionid;

	/**
	 * The value for the ownerphone field.
	 * @var        string
	 */
	protected $ownerphone;

	/**
	 * The value for the ordercircuit field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $ordercircuit;

	/**
	 * The value for the nickname field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $nickname;

	/**
	 * The value for the enumeration field.
	 * @var        string
	 */
	protected $enumeration;

	/**
	 * The value for the creationdate field.
	 * @var        string
	 */
	protected $creationdate;

	/**
	 * The value for the circuitid field.
	 * @var        int
	 */
	protected $circuitid;

	/**
	 * @var        Circuit
	 */
	protected $aCircuit;

	/**
	 * @var        Region
	 */
	protected $aRegion;

	/**
	 * @var        array Billboard[] Collection to store aggregation of Billboard objects.
	 */
	protected $collBillboards;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->ordercircuit = 0;
		$this->nickname = '';
	}

	/**
	 * Initializes internal state of BaseAddress object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * Id de la calle
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [street] column value.
	 * Nombre de la calle
	 * @return     string
	 */
	public function getStreet()
	{
		return $this->street;
	}

	/**
	 * Get the [number] column value.
	 * numero de la calle
	 * @return     int
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Get the [rating] column value.
	 * Valoracion de la calle
	 * @return     int
	 */
	public function getRating()
	{
		return $this->rating;
	}

	/**
	 * Get the [intersection] column value.
	 * cruce con otra calle de la direccion
	 * @return     string
	 */
	public function getIntersection()
	{
		return $this->intersection;
	}

	/**
	 * Get the [owner] column value.
	 * duenio de la direccion
	 * @return     string
	 */
	public function getOwner()
	{
		return $this->owner;
	}

	/**
	 * Get the [latitude] column value.
	 * latitud de la direccion
	 * @return     string
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [longitude] column value.
	 * longitud de la direccion
	 * @return     string
	 */
	public function getLongitude()
	{
		return $this->longitude;
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
	 * Get the [ownerphone] column value.
	 * telefono de contacto
	 * @return     string
	 */
	public function getOwnerphone()
	{
		return $this->ownerphone;
	}

	/**
	 * Get the [ordercircuit] column value.
	 * ordenamiento por proximidad en el circuito entre direcciones
	 * @return     int
	 */
	public function getOrdercircuit()
	{
		return $this->ordercircuit;
	}

	/**
	 * Get the [nickname] column value.
	 * Nombre de Fantasia de la direccion
	 * @return     string
	 */
	public function getNickname()
	{
		return $this->nickname;
	}

	/**
	 * Get the [enumeration] column value.
	 * Numero de empadronamiento
	 * @return     string
	 */
	public function getEnumeration()
	{
		return $this->enumeration;
	}

	/**
	 * Get the [optionally formatted] temporal [creationdate] column value.
	 * fecha de alta
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreationdate($format = '%Y/%m/%d')
	{
		if ($this->creationdate === null) {
			return null;
		}


		if ($this->creationdate === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->creationdate);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->creationdate, true), $x);
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
	 * Get the [circuitid] column value.
	 * circuito al que pertenece la calle
	 * @return     int
	 */
	public function getCircuitid()
	{
		return $this->circuitid;
	}

	/**
	 * Set the value of [id] column.
	 * Id de la calle
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AddressPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [street] column.
	 * Nombre de la calle
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setStreet($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->street !== $v) {
			$this->street = $v;
			$this->modifiedColumns[] = AddressPeer::STREET;
		}

		return $this;
	} // setStreet()

	/**
	 * Set the value of [number] column.
	 * numero de la calle
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setNumber($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->number !== $v) {
			$this->number = $v;
			$this->modifiedColumns[] = AddressPeer::NUMBER;
		}

		return $this;
	} // setNumber()

	/**
	 * Set the value of [rating] column.
	 * Valoracion de la calle
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setRating($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = AddressPeer::RATING;
		}

		return $this;
	} // setRating()

	/**
	 * Set the value of [intersection] column.
	 * cruce con otra calle de la direccion
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setIntersection($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->intersection !== $v) {
			$this->intersection = $v;
			$this->modifiedColumns[] = AddressPeer::INTERSECTION;
		}

		return $this;
	} // setIntersection()

	/**
	 * Set the value of [owner] column.
	 * duenio de la direccion
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setOwner($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->owner !== $v) {
			$this->owner = $v;
			$this->modifiedColumns[] = AddressPeer::OWNER;
		}

		return $this;
	} // setOwner()

	/**
	 * Set the value of [latitude] column.
	 * latitud de la direccion
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = AddressPeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [longitude] column.
	 * longitud de la direccion
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = AddressPeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [regionid] column.
	 * barrio de la direccion
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setRegionid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->regionid !== $v) {
			$this->regionid = $v;
			$this->modifiedColumns[] = AddressPeer::REGIONID;
		}

		if ($this->aRegion !== null && $this->aRegion->getId() !== $v) {
			$this->aRegion = null;
		}

		return $this;
	} // setRegionid()

	/**
	 * Set the value of [ownerphone] column.
	 * telefono de contacto
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setOwnerphone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ownerphone !== $v) {
			$this->ownerphone = $v;
			$this->modifiedColumns[] = AddressPeer::OWNERPHONE;
		}

		return $this;
	} // setOwnerphone()

	/**
	 * Set the value of [ordercircuit] column.
	 * ordenamiento por proximidad en el circuito entre direcciones
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setOrdercircuit($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->ordercircuit !== $v || $this->isNew()) {
			$this->ordercircuit = $v;
			$this->modifiedColumns[] = AddressPeer::ORDERCIRCUIT;
		}

		return $this;
	} // setOrdercircuit()

	/**
	 * Set the value of [nickname] column.
	 * Nombre de Fantasia de la direccion
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setNickname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nickname !== $v || $this->isNew()) {
			$this->nickname = $v;
			$this->modifiedColumns[] = AddressPeer::NICKNAME;
		}

		return $this;
	} // setNickname()

	/**
	 * Set the value of [enumeration] column.
	 * Numero de empadronamiento
	 * @param      string $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setEnumeration($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->enumeration !== $v) {
			$this->enumeration = $v;
			$this->modifiedColumns[] = AddressPeer::ENUMERATION;
		}

		return $this;
	} // setEnumeration()

	/**
	 * Sets the value of [creationdate] column to a normalized version of the date/time value specified.
	 * fecha de alta
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Address The current object (for fluent API support)
	 */
	public function setCreationdate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->creationdate !== null || $dt !== null) {
			$currentDateAsString = ($this->creationdate !== null && $tmpDt = new DateTime($this->creationdate)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->creationdate = $newDateAsString;
				$this->modifiedColumns[] = AddressPeer::CREATIONDATE;
			}
		} // if either are not null

		return $this;
	} // setCreationdate()

	/**
	 * Set the value of [circuitid] column.
	 * circuito al que pertenece la calle
	 * @param      int $v new value
	 * @return     Address The current object (for fluent API support)
	 */
	public function setCircuitid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->circuitid !== $v) {
			$this->circuitid = $v;
			$this->modifiedColumns[] = AddressPeer::CIRCUITID;
		}

		if ($this->aCircuit !== null && $this->aCircuit->getId() !== $v) {
			$this->aCircuit = null;
		}

		return $this;
	} // setCircuitid()

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
			if ($this->ordercircuit !== 0) {
				return false;
			}

			if ($this->nickname !== '') {
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
			$this->street = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->number = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->rating = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->intersection = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->owner = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->latitude = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->longitude = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->regionid = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->ownerphone = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->ordercircuit = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->nickname = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->enumeration = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->creationdate = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->circuitid = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = AddressPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Address object", $e);
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

		if ($this->aRegion !== null && $this->regionid !== $this->aRegion->getId()) {
			$this->aRegion = null;
		}
		if ($this->aCircuit !== null && $this->circuitid !== $this->aCircuit->getId()) {
			$this->aCircuit = null;
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
			$con = Propel::getConnection(AddressPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AddressPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCircuit = null;
			$this->aRegion = null;
			$this->collBillboards = null;

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
			$con = Propel::getConnection(AddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AddressQuery::create()
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
			$con = Propel::getConnection(AddressPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AddressPeer::addInstanceToPool($this);
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

			if ($this->aRegion !== null) {
				if ($this->aRegion->isModified() || $this->aRegion->isNew()) {
					$affectedRows += $this->aRegion->save($con);
				}
				$this->setRegion($this->aRegion);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AddressPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AddressPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AddressPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AddressPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collBillboards !== null) {
				foreach ($this->collBillboards as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aCircuit !== null) {
				if (!$this->aCircuit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCircuit->getValidationFailures());
				}
			}

			if ($this->aRegion !== null) {
				if (!$this->aRegion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRegion->getValidationFailures());
				}
			}


			if (($retval = AddressPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collBillboards !== null) {
					foreach ($this->collBillboards as $referrerFK) {
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
		$pos = AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRating();
				break;
			case 4:
				return $this->getIntersection();
				break;
			case 5:
				return $this->getOwner();
				break;
			case 6:
				return $this->getLatitude();
				break;
			case 7:
				return $this->getLongitude();
				break;
			case 8:
				return $this->getRegionid();
				break;
			case 9:
				return $this->getOwnerphone();
				break;
			case 10:
				return $this->getOrdercircuit();
				break;
			case 11:
				return $this->getNickname();
				break;
			case 12:
				return $this->getEnumeration();
				break;
			case 13:
				return $this->getCreationdate();
				break;
			case 14:
				return $this->getCircuitid();
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
		if (isset($alreadyDumpedObjects['Address'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Address'][$this->getPrimaryKey()] = true;
		$keys = AddressPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getStreet(),
			$keys[2] => $this->getNumber(),
			$keys[3] => $this->getRating(),
			$keys[4] => $this->getIntersection(),
			$keys[5] => $this->getOwner(),
			$keys[6] => $this->getLatitude(),
			$keys[7] => $this->getLongitude(),
			$keys[8] => $this->getRegionid(),
			$keys[9] => $this->getOwnerphone(),
			$keys[10] => $this->getOrdercircuit(),
			$keys[11] => $this->getNickname(),
			$keys[12] => $this->getEnumeration(),
			$keys[13] => $this->getCreationdate(),
			$keys[14] => $this->getCircuitid(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCircuit) {
				$result['Circuit'] = $this->aCircuit->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aRegion) {
				$result['Region'] = $this->aRegion->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collBillboards) {
				$result['Billboards'] = $this->collBillboards->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = AddressPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRating($value);
				break;
			case 4:
				$this->setIntersection($value);
				break;
			case 5:
				$this->setOwner($value);
				break;
			case 6:
				$this->setLatitude($value);
				break;
			case 7:
				$this->setLongitude($value);
				break;
			case 8:
				$this->setRegionid($value);
				break;
			case 9:
				$this->setOwnerphone($value);
				break;
			case 10:
				$this->setOrdercircuit($value);
				break;
			case 11:
				$this->setNickname($value);
				break;
			case 12:
				$this->setEnumeration($value);
				break;
			case 13:
				$this->setCreationdate($value);
				break;
			case 14:
				$this->setCircuitid($value);
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
		$keys = AddressPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setStreet($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumber($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRating($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIntersection($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOwner($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLatitude($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLongitude($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRegionid($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setOwnerphone($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setOrdercircuit($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNickname($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEnumeration($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreationdate($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCircuitid($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AddressPeer::DATABASE_NAME);

		if ($this->isColumnModified(AddressPeer::ID)) $criteria->add(AddressPeer::ID, $this->id);
		if ($this->isColumnModified(AddressPeer::STREET)) $criteria->add(AddressPeer::STREET, $this->street);
		if ($this->isColumnModified(AddressPeer::NUMBER)) $criteria->add(AddressPeer::NUMBER, $this->number);
		if ($this->isColumnModified(AddressPeer::RATING)) $criteria->add(AddressPeer::RATING, $this->rating);
		if ($this->isColumnModified(AddressPeer::INTERSECTION)) $criteria->add(AddressPeer::INTERSECTION, $this->intersection);
		if ($this->isColumnModified(AddressPeer::OWNER)) $criteria->add(AddressPeer::OWNER, $this->owner);
		if ($this->isColumnModified(AddressPeer::LATITUDE)) $criteria->add(AddressPeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(AddressPeer::LONGITUDE)) $criteria->add(AddressPeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(AddressPeer::REGIONID)) $criteria->add(AddressPeer::REGIONID, $this->regionid);
		if ($this->isColumnModified(AddressPeer::OWNERPHONE)) $criteria->add(AddressPeer::OWNERPHONE, $this->ownerphone);
		if ($this->isColumnModified(AddressPeer::ORDERCIRCUIT)) $criteria->add(AddressPeer::ORDERCIRCUIT, $this->ordercircuit);
		if ($this->isColumnModified(AddressPeer::NICKNAME)) $criteria->add(AddressPeer::NICKNAME, $this->nickname);
		if ($this->isColumnModified(AddressPeer::ENUMERATION)) $criteria->add(AddressPeer::ENUMERATION, $this->enumeration);
		if ($this->isColumnModified(AddressPeer::CREATIONDATE)) $criteria->add(AddressPeer::CREATIONDATE, $this->creationdate);
		if ($this->isColumnModified(AddressPeer::CIRCUITID)) $criteria->add(AddressPeer::CIRCUITID, $this->circuitid);

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
		$criteria = new Criteria(AddressPeer::DATABASE_NAME);
		$criteria->add(AddressPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Address (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setStreet($this->getStreet());
		$copyObj->setNumber($this->getNumber());
		$copyObj->setRating($this->getRating());
		$copyObj->setIntersection($this->getIntersection());
		$copyObj->setOwner($this->getOwner());
		$copyObj->setLatitude($this->getLatitude());
		$copyObj->setLongitude($this->getLongitude());
		$copyObj->setRegionid($this->getRegionid());
		$copyObj->setOwnerphone($this->getOwnerphone());
		$copyObj->setOrdercircuit($this->getOrdercircuit());
		$copyObj->setNickname($this->getNickname());
		$copyObj->setEnumeration($this->getEnumeration());
		$copyObj->setCreationdate($this->getCreationdate());
		$copyObj->setCircuitid($this->getCircuitid());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getBillboards() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addBillboard($relObj->copy($deepCopy));
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
	 * @return     Address Clone of current object.
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
	 * @return     AddressPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AddressPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Circuit object.
	 *
	 * @param      Circuit $v
	 * @return     Address The current object (for fluent API support)
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
			$v->addAddress($this);
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
				$this->aCircuit->addAddresss($this);
			 */
		}
		return $this->aCircuit;
	}

	/**
	 * Declares an association between this object and a Region object.
	 *
	 * @param      Region $v
	 * @return     Address The current object (for fluent API support)
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
			$v->addAddress($this);
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
				$this->aRegion->addAddresss($this);
			 */
		}
		return $this->aRegion;
	}

	/**
	 * Clears out the collBillboards collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addBillboards()
	 */
	public function clearBillboards()
	{
		$this->collBillboards = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collBillboards collection.
	 *
	 * By default this just sets the collBillboards collection to an empty array (like clearcollBillboards());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initBillboards($overrideExisting = true)
	{
		if (null !== $this->collBillboards && !$overrideExisting) {
			return;
		}
		$this->collBillboards = new PropelObjectCollection();
		$this->collBillboards->setModel('Billboard');
	}

	/**
	 * Gets an array of Billboard objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Address is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Billboard[] List of Billboard objects
	 * @throws     PropelException
	 */
	public function getBillboards($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collBillboards || null !== $criteria) {
			if ($this->isNew() && null === $this->collBillboards) {
				// return empty collection
				$this->initBillboards();
			} else {
				$collBillboards = BillboardQuery::create(null, $criteria)
					->filterByAddress($this)
					->find($con);
				if (null !== $criteria) {
					return $collBillboards;
				}
				$this->collBillboards = $collBillboards;
			}
		}
		return $this->collBillboards;
	}

	/**
	 * Returns the number of related Billboard objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Billboard objects.
	 * @throws     PropelException
	 */
	public function countBillboards(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collBillboards || null !== $criteria) {
			if ($this->isNew() && null === $this->collBillboards) {
				return 0;
			} else {
				$query = BillboardQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAddress($this)
					->count($con);
			}
		} else {
			return count($this->collBillboards);
		}
	}

	/**
	 * Method called to associate a Billboard object to this object
	 * through the Billboard foreign key attribute.
	 *
	 * @param      Billboard $l Billboard
	 * @return     void
	 * @throws     PropelException
	 */
	public function addBillboard(Billboard $l)
	{
		if ($this->collBillboards === null) {
			$this->initBillboards();
		}
		if (!$this->collBillboards->contains($l)) { // only add it if the **same** object is not already associated
			$this->collBillboards[]= $l;
			$l->setAddress($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->street = null;
		$this->number = null;
		$this->rating = null;
		$this->intersection = null;
		$this->owner = null;
		$this->latitude = null;
		$this->longitude = null;
		$this->regionid = null;
		$this->ownerphone = null;
		$this->ordercircuit = null;
		$this->nickname = null;
		$this->enumeration = null;
		$this->creationdate = null;
		$this->circuitid = null;
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
			if ($this->collBillboards) {
				foreach ($this->collBillboards as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collBillboards instanceof PropelCollection) {
			$this->collBillboards->clearIterator();
		}
		$this->collBillboards = null;
		$this->aCircuit = null;
		$this->aRegion = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AddressPeer::DEFAULT_STRING_FORMAT);
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

} // BaseAddress
