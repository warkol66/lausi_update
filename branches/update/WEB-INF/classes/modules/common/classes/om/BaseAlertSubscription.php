<?php


/**
 * Base class that represents a row from the 'common_alertSubscription' table.
 *
 * Suscripciones de alerta
 *
 * @package    propel.generator.common.classes.om
 */
abstract class BaseAlertSubscription extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AlertSubscriptionPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlertSubscriptionPeer
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
	 * The value for the entityname field.
	 * @var        string
	 */
	protected $entityname;

	/**
	 * The value for the entitydatefielduniquename field.
	 * @var        string
	 */
	protected $entitydatefielduniquename;

	/**
	 * The value for the entitybooleanfielduniquename field.
	 * @var        string
	 */
	protected $entitybooleanfielduniquename;

	/**
	 * The value for the anticipationdays field.
	 * @var        int
	 */
	protected $anticipationdays;

	/**
	 * The value for the entitynamefielduniquename field.
	 * @var        string
	 */
	protected $entitynamefielduniquename;

	/**
	 * The value for the extrarecipients field.
	 * @var        string
	 */
	protected $extrarecipients;

	/**
	 * @var        ModuleEntity
	 */
	protected $aModuleEntity;

	/**
	 * @var        ModuleEntityField
	 */
	protected $aModuleEntityFieldRelatedByEntitynamefielduniquename;

	/**
	 * @var        ModuleEntityField
	 */
	protected $aModuleEntityFieldRelatedByEntitydatefielduniquename;

	/**
	 * @var        ModuleEntityField
	 */
	protected $aModuleEntityFieldRelatedByEntitybooleanfielduniquename;

	/**
	 * @var        array AlertSubscriptionUser[] Collection to store aggregation of AlertSubscriptionUser objects.
	 */
	protected $collAlertSubscriptionUsers;

	/**
	 * @var        array User[] Collection to store aggregation of User objects.
	 */
	protected $collUsers;

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
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * Nombre de la suscripcion
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [entityname] column value.
	 * Nombre unico de la entidad asociada.
	 * @return     string
	 */
	public function getEntityname()
	{
		return $this->entityname;
	}

	/**
	 * Get the [entitydatefielduniquename] column value.
	 * Nombre unico del campo fecha
	 * @return     string
	 */
	public function getEntitydatefielduniquename()
	{
		return $this->entitydatefielduniquename;
	}

	/**
	 * Get the [entitybooleanfielduniquename] column value.
	 * Nombre unico del campo a evaluar por verdadero o falso.
	 * @return     string
	 */
	public function getEntitybooleanfielduniquename()
	{
		return $this->entitybooleanfielduniquename;
	}

	/**
	 * Get the [anticipationdays] column value.
	 * Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.
	 * @return     int
	 */
	public function getAnticipationdays()
	{
		return $this->anticipationdays;
	}

	/**
	 * Get the [entitynamefielduniquename] column value.
	 * Campo a imprimir en representacion del nombre de cada instancia de la entidad
	 * @return     string
	 */
	public function getEntitynamefielduniquename()
	{
		return $this->entitynamefielduniquename;
	}

	/**
	 * Get the [extrarecipients] column value.
	 * Destinatarios extra
	 * @return     string
	 */
	public function getExtrarecipients()
	{
		return $this->extrarecipients;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * Nombre de la suscripcion
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [entityname] column.
	 * Nombre unico de la entidad asociada.
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setEntityname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->entityname !== $v) {
			$this->entityname = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ENTITYNAME;
		}

		if ($this->aModuleEntity !== null && $this->aModuleEntity->getName() !== $v) {
			$this->aModuleEntity = null;
		}

		return $this;
	} // setEntityname()

	/**
	 * Set the value of [entitydatefielduniquename] column.
	 * Nombre unico del campo fecha
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setEntitydatefielduniquename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->entitydatefielduniquename !== $v) {
			$this->entitydatefielduniquename = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME;
		}

		if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename !== null && $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->getUniquename() !== $v) {
			$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = null;
		}

		return $this;
	} // setEntitydatefielduniquename()

	/**
	 * Set the value of [entitybooleanfielduniquename] column.
	 * Nombre unico del campo a evaluar por verdadero o falso.
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setEntitybooleanfielduniquename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->entitybooleanfielduniquename !== $v) {
			$this->entitybooleanfielduniquename = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME;
		}

		if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename !== null && $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->getUniquename() !== $v) {
			$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = null;
		}

		return $this;
	} // setEntitybooleanfielduniquename()

	/**
	 * Set the value of [anticipationdays] column.
	 * Cantidad de dias de anticipacion. Se usa para evaluar campos tipo fecha.
	 * @param      int $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setAnticipationdays($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->anticipationdays !== $v) {
			$this->anticipationdays = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ANTICIPATIONDAYS;
		}

		return $this;
	} // setAnticipationdays()

	/**
	 * Set the value of [entitynamefielduniquename] column.
	 * Campo a imprimir en representacion del nombre de cada instancia de la entidad
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setEntitynamefielduniquename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->entitynamefielduniquename !== $v) {
			$this->entitynamefielduniquename = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME;
		}

		if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename !== null && $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->getUniquename() !== $v) {
			$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = null;
		}

		return $this;
	} // setEntitynamefielduniquename()

	/**
	 * Set the value of [extrarecipients] column.
	 * Destinatarios extra
	 * @param      string $v new value
	 * @return     AlertSubscription The current object (for fluent API support)
	 */
	public function setExtrarecipients($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->extrarecipients !== $v) {
			$this->extrarecipients = $v;
			$this->modifiedColumns[] = AlertSubscriptionPeer::EXTRARECIPIENTS;
		}

		return $this;
	} // setExtrarecipients()

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
			$this->entityname = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->entitydatefielduniquename = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->entitybooleanfielduniquename = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->anticipationdays = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->entitynamefielduniquename = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->extrarecipients = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = AlertSubscriptionPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating AlertSubscription object", $e);
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

		if ($this->aModuleEntity !== null && $this->entityname !== $this->aModuleEntity->getName()) {
			$this->aModuleEntity = null;
		}
		if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename !== null && $this->entitydatefielduniquename !== $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->getUniquename()) {
			$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = null;
		}
		if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename !== null && $this->entitybooleanfielduniquename !== $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->getUniquename()) {
			$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = null;
		}
		if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename !== null && $this->entitynamefielduniquename !== $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->getUniquename()) {
			$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = null;
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
			$con = Propel::getConnection(AlertSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlertSubscriptionPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aModuleEntity = null;
			$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = null;
			$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = null;
			$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = null;
			$this->collAlertSubscriptionUsers = null;

			$this->collUsers = null;
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
			$con = Propel::getConnection(AlertSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AlertSubscriptionQuery::create()
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
			$con = Propel::getConnection(AlertSubscriptionPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AlertSubscriptionPeer::addInstanceToPool($this);
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

			if ($this->aModuleEntity !== null) {
				if ($this->aModuleEntity->isModified() || $this->aModuleEntity->isNew()) {
					$affectedRows += $this->aModuleEntity->save($con);
				}
				$this->setModuleEntity($this->aModuleEntity);
			}

			if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename !== null) {
				if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename->isModified() || $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->isNew()) {
					$affectedRows += $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->save($con);
				}
				$this->setModuleEntityFieldRelatedByEntitynamefielduniquename($this->aModuleEntityFieldRelatedByEntitynamefielduniquename);
			}

			if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename !== null) {
				if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename->isModified() || $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->isNew()) {
					$affectedRows += $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->save($con);
				}
				$this->setModuleEntityFieldRelatedByEntitydatefielduniquename($this->aModuleEntityFieldRelatedByEntitydatefielduniquename);
			}

			if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename !== null) {
				if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->isModified() || $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->isNew()) {
					$affectedRows += $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->save($con);
				}
				$this->setModuleEntityFieldRelatedByEntitybooleanfielduniquename($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlertSubscriptionPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AlertSubscriptionPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlertSubscriptionPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AlertSubscriptionPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAlertSubscriptionUsers !== null) {
				foreach ($this->collAlertSubscriptionUsers as $referrerFK) {
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

			if ($this->aModuleEntity !== null) {
				if (!$this->aModuleEntity->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModuleEntity->getValidationFailures());
				}
			}

			if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename !== null) {
				if (!$this->aModuleEntityFieldRelatedByEntitynamefielduniquename->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->getValidationFailures());
				}
			}

			if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename !== null) {
				if (!$this->aModuleEntityFieldRelatedByEntitydatefielduniquename->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->getValidationFailures());
				}
			}

			if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename !== null) {
				if (!$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->getValidationFailures());
				}
			}


			if (($retval = AlertSubscriptionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlertSubscriptionUsers !== null) {
					foreach ($this->collAlertSubscriptionUsers as $referrerFK) {
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
		$pos = AlertSubscriptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEntityname();
				break;
			case 3:
				return $this->getEntitydatefielduniquename();
				break;
			case 4:
				return $this->getEntitybooleanfielduniquename();
				break;
			case 5:
				return $this->getAnticipationdays();
				break;
			case 6:
				return $this->getEntitynamefielduniquename();
				break;
			case 7:
				return $this->getExtrarecipients();
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
		if (isset($alreadyDumpedObjects['AlertSubscription'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['AlertSubscription'][$this->getPrimaryKey()] = true;
		$keys = AlertSubscriptionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getEntityname(),
			$keys[3] => $this->getEntitydatefielduniquename(),
			$keys[4] => $this->getEntitybooleanfielduniquename(),
			$keys[5] => $this->getAnticipationdays(),
			$keys[6] => $this->getEntitynamefielduniquename(),
			$keys[7] => $this->getExtrarecipients(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aModuleEntity) {
				$result['ModuleEntity'] = $this->aModuleEntity->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aModuleEntityFieldRelatedByEntitynamefielduniquename) {
				$result['ModuleEntityFieldRelatedByEntitynamefielduniquename'] = $this->aModuleEntityFieldRelatedByEntitynamefielduniquename->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aModuleEntityFieldRelatedByEntitydatefielduniquename) {
				$result['ModuleEntityFieldRelatedByEntitydatefielduniquename'] = $this->aModuleEntityFieldRelatedByEntitydatefielduniquename->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename) {
				$result['ModuleEntityFieldRelatedByEntitybooleanfielduniquename'] = $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAlertSubscriptionUsers) {
				$result['AlertSubscriptionUsers'] = $this->collAlertSubscriptionUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = AlertSubscriptionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEntityname($value);
				break;
			case 3:
				$this->setEntitydatefielduniquename($value);
				break;
			case 4:
				$this->setEntitybooleanfielduniquename($value);
				break;
			case 5:
				$this->setAnticipationdays($value);
				break;
			case 6:
				$this->setEntitynamefielduniquename($value);
				break;
			case 7:
				$this->setExtrarecipients($value);
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
		$keys = AlertSubscriptionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEntityname($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEntitydatefielduniquename($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEntitybooleanfielduniquename($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAnticipationdays($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEntitynamefielduniquename($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExtrarecipients($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlertSubscriptionPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlertSubscriptionPeer::ID)) $criteria->add(AlertSubscriptionPeer::ID, $this->id);
		if ($this->isColumnModified(AlertSubscriptionPeer::NAME)) $criteria->add(AlertSubscriptionPeer::NAME, $this->name);
		if ($this->isColumnModified(AlertSubscriptionPeer::ENTITYNAME)) $criteria->add(AlertSubscriptionPeer::ENTITYNAME, $this->entityname);
		if ($this->isColumnModified(AlertSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME)) $criteria->add(AlertSubscriptionPeer::ENTITYDATEFIELDUNIQUENAME, $this->entitydatefielduniquename);
		if ($this->isColumnModified(AlertSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME)) $criteria->add(AlertSubscriptionPeer::ENTITYBOOLEANFIELDUNIQUENAME, $this->entitybooleanfielduniquename);
		if ($this->isColumnModified(AlertSubscriptionPeer::ANTICIPATIONDAYS)) $criteria->add(AlertSubscriptionPeer::ANTICIPATIONDAYS, $this->anticipationdays);
		if ($this->isColumnModified(AlertSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME)) $criteria->add(AlertSubscriptionPeer::ENTITYNAMEFIELDUNIQUENAME, $this->entitynamefielduniquename);
		if ($this->isColumnModified(AlertSubscriptionPeer::EXTRARECIPIENTS)) $criteria->add(AlertSubscriptionPeer::EXTRARECIPIENTS, $this->extrarecipients);

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
		$criteria = new Criteria(AlertSubscriptionPeer::DATABASE_NAME);
		$criteria->add(AlertSubscriptionPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AlertSubscription (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setName($this->getName());
		$copyObj->setEntityname($this->getEntityname());
		$copyObj->setEntitydatefielduniquename($this->getEntitydatefielduniquename());
		$copyObj->setEntitybooleanfielduniquename($this->getEntitybooleanfielduniquename());
		$copyObj->setAnticipationdays($this->getAnticipationdays());
		$copyObj->setEntitynamefielduniquename($this->getEntitynamefielduniquename());
		$copyObj->setExtrarecipients($this->getExtrarecipients());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getAlertSubscriptionUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlertSubscriptionUser($relObj->copy($deepCopy));
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
	 * @return     AlertSubscription Clone of current object.
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
	 * @return     AlertSubscriptionPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlertSubscriptionPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ModuleEntity object.
	 *
	 * @param      ModuleEntity $v
	 * @return     AlertSubscription The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setModuleEntity(ModuleEntity $v = null)
	{
		if ($v === null) {
			$this->setEntityname(NULL);
		} else {
			$this->setEntityname($v->getName());
		}

		$this->aModuleEntity = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ModuleEntity object, it will not be re-added.
		if ($v !== null) {
			$v->addAlertSubscription($this);
		}

		return $this;
	}


	/**
	 * Get the associated ModuleEntity object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ModuleEntity The associated ModuleEntity object.
	 * @throws     PropelException
	 */
	public function getModuleEntity(PropelPDO $con = null)
	{
		if ($this->aModuleEntity === null && (($this->entityname !== "" && $this->entityname !== null))) {
			$this->aModuleEntity = ModuleEntityQuery::create()->findPk($this->entityname, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aModuleEntity->addAlertSubscriptions($this);
			 */
		}
		return $this->aModuleEntity;
	}

	/**
	 * Declares an association between this object and a ModuleEntityField object.
	 *
	 * @param      ModuleEntityField $v
	 * @return     AlertSubscription The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setModuleEntityFieldRelatedByEntitynamefielduniquename(ModuleEntityField $v = null)
	{
		if ($v === null) {
			$this->setEntitynamefielduniquename(NULL);
		} else {
			$this->setEntitynamefielduniquename($v->getUniquename());
		}

		$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ModuleEntityField object, it will not be re-added.
		if ($v !== null) {
			$v->addAlertSubscriptionRelatedByEntitynamefielduniquename($this);
		}

		return $this;
	}


	/**
	 * Get the associated ModuleEntityField object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ModuleEntityField The associated ModuleEntityField object.
	 * @throws     PropelException
	 */
	public function getModuleEntityFieldRelatedByEntitynamefielduniquename(PropelPDO $con = null)
	{
		if ($this->aModuleEntityFieldRelatedByEntitynamefielduniquename === null && (($this->entitynamefielduniquename !== "" && $this->entitynamefielduniquename !== null))) {
			$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = ModuleEntityFieldQuery::create()->findPk($this->entitynamefielduniquename, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aModuleEntityFieldRelatedByEntitynamefielduniquename->addAlertSubscriptionsRelatedByEntitynamefielduniquename($this);
			 */
		}
		return $this->aModuleEntityFieldRelatedByEntitynamefielduniquename;
	}

	/**
	 * Declares an association between this object and a ModuleEntityField object.
	 *
	 * @param      ModuleEntityField $v
	 * @return     AlertSubscription The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setModuleEntityFieldRelatedByEntitydatefielduniquename(ModuleEntityField $v = null)
	{
		if ($v === null) {
			$this->setEntitydatefielduniquename(NULL);
		} else {
			$this->setEntitydatefielduniquename($v->getUniquename());
		}

		$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ModuleEntityField object, it will not be re-added.
		if ($v !== null) {
			$v->addAlertSubscriptionRelatedByEntitydatefielduniquename($this);
		}

		return $this;
	}


	/**
	 * Get the associated ModuleEntityField object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ModuleEntityField The associated ModuleEntityField object.
	 * @throws     PropelException
	 */
	public function getModuleEntityFieldRelatedByEntitydatefielduniquename(PropelPDO $con = null)
	{
		if ($this->aModuleEntityFieldRelatedByEntitydatefielduniquename === null && (($this->entitydatefielduniquename !== "" && $this->entitydatefielduniquename !== null))) {
			$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = ModuleEntityFieldQuery::create()->findPk($this->entitydatefielduniquename, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aModuleEntityFieldRelatedByEntitydatefielduniquename->addAlertSubscriptionsRelatedByEntitydatefielduniquename($this);
			 */
		}
		return $this->aModuleEntityFieldRelatedByEntitydatefielduniquename;
	}

	/**
	 * Declares an association between this object and a ModuleEntityField object.
	 *
	 * @param      ModuleEntityField $v
	 * @return     AlertSubscription The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setModuleEntityFieldRelatedByEntitybooleanfielduniquename(ModuleEntityField $v = null)
	{
		if ($v === null) {
			$this->setEntitybooleanfielduniquename(NULL);
		} else {
			$this->setEntitybooleanfielduniquename($v->getUniquename());
		}

		$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ModuleEntityField object, it will not be re-added.
		if ($v !== null) {
			$v->addAlertSubscriptionRelatedByEntitybooleanfielduniquename($this);
		}

		return $this;
	}


	/**
	 * Get the associated ModuleEntityField object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ModuleEntityField The associated ModuleEntityField object.
	 * @throws     PropelException
	 */
	public function getModuleEntityFieldRelatedByEntitybooleanfielduniquename(PropelPDO $con = null)
	{
		if ($this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename === null && (($this->entitybooleanfielduniquename !== "" && $this->entitybooleanfielduniquename !== null))) {
			$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = ModuleEntityFieldQuery::create()->findPk($this->entitybooleanfielduniquename, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename->addAlertSubscriptionsRelatedByEntitybooleanfielduniquename($this);
			 */
		}
		return $this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename;
	}

	/**
	 * Clears out the collAlertSubscriptionUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlertSubscriptionUsers()
	 */
	public function clearAlertSubscriptionUsers()
	{
		$this->collAlertSubscriptionUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlertSubscriptionUsers collection.
	 *
	 * By default this just sets the collAlertSubscriptionUsers collection to an empty array (like clearcollAlertSubscriptionUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAlertSubscriptionUsers($overrideExisting = true)
	{
		if (null !== $this->collAlertSubscriptionUsers && !$overrideExisting) {
			return;
		}
		$this->collAlertSubscriptionUsers = new PropelObjectCollection();
		$this->collAlertSubscriptionUsers->setModel('AlertSubscriptionUser');
	}

	/**
	 * Gets an array of AlertSubscriptionUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AlertSubscription is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AlertSubscriptionUser[] List of AlertSubscriptionUser objects
	 * @throws     PropelException
	 */
	public function getAlertSubscriptionUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlertSubscriptionUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlertSubscriptionUsers) {
				// return empty collection
				$this->initAlertSubscriptionUsers();
			} else {
				$collAlertSubscriptionUsers = AlertSubscriptionUserQuery::create(null, $criteria)
					->filterByAlertSubscription($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlertSubscriptionUsers;
				}
				$this->collAlertSubscriptionUsers = $collAlertSubscriptionUsers;
			}
		}
		return $this->collAlertSubscriptionUsers;
	}

	/**
	 * Returns the number of related AlertSubscriptionUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AlertSubscriptionUser objects.
	 * @throws     PropelException
	 */
	public function countAlertSubscriptionUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlertSubscriptionUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlertSubscriptionUsers) {
				return 0;
			} else {
				$query = AlertSubscriptionUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAlertSubscription($this)
					->count($con);
			}
		} else {
			return count($this->collAlertSubscriptionUsers);
		}
	}

	/**
	 * Method called to associate a AlertSubscriptionUser object to this object
	 * through the AlertSubscriptionUser foreign key attribute.
	 *
	 * @param      AlertSubscriptionUser $l AlertSubscriptionUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAlertSubscriptionUser(AlertSubscriptionUser $l)
	{
		if ($this->collAlertSubscriptionUsers === null) {
			$this->initAlertSubscriptionUsers();
		}
		if (!$this->collAlertSubscriptionUsers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collAlertSubscriptionUsers[]= $l;
			$l->setAlertSubscription($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AlertSubscription is new, it will return
	 * an empty collection; or if this AlertSubscription has previously
	 * been saved, it will retrieve related AlertSubscriptionUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AlertSubscription.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AlertSubscriptionUser[] List of AlertSubscriptionUser objects
	 */
	public function getAlertSubscriptionUsersJoinUser($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlertSubscriptionUserQuery::create(null, $criteria);
		$query->joinWith('User', $join_behavior);

		return $this->getAlertSubscriptionUsers($query, $con);
	}

	/**
	 * Clears out the collUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsers()
	 */
	public function clearUsers()
	{
		$this->collUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsers collection.
	 *
	 * By default this just sets the collUsers collection to an empty collection (like clearUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsers()
	{
		$this->collUsers = new PropelObjectCollection();
		$this->collUsers->setModel('User');
	}

	/**
	 * Gets a collection of User objects related by a many-to-many relationship
	 * to the current object by way of the common_alertSubscriptionUser cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AlertSubscription is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array User[] List of User objects
	 */
	public function getUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsers) {
				// return empty collection
				$this->initUsers();
			} else {
				$collUsers = UserQuery::create(null, $criteria)
					->filterByAlertSubscription($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsers;
				}
				$this->collUsers = $collUsers;
			}
		}
		return $this->collUsers;
	}

	/**
	 * Gets the number of User objects related by a many-to-many relationship
	 * to the current object by way of the common_alertSubscriptionUser cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related User objects
	 */
	public function countUsers($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsers) {
				return 0;
			} else {
				$query = UserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAlertSubscription($this)
					->count($con);
			}
		} else {
			return count($this->collUsers);
		}
	}

	/**
	 * Associate a User object to this object
	 * through the common_alertSubscriptionUser cross reference table.
	 *
	 * @param      User $user The AlertSubscriptionUser object to relate
	 * @return     void
	 */
	public function addUser($user)
	{
		if ($this->collUsers === null) {
			$this->initUsers();
		}
		if (!$this->collUsers->contains($user)) { // only add it if the **same** object is not already associated
			$alertSubscriptionUser = new AlertSubscriptionUser();
			$alertSubscriptionUser->setUser($user);
			$this->addAlertSubscriptionUser($alertSubscriptionUser);

			$this->collUsers[]= $user;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->name = null;
		$this->entityname = null;
		$this->entitydatefielduniquename = null;
		$this->entitybooleanfielduniquename = null;
		$this->anticipationdays = null;
		$this->entitynamefielduniquename = null;
		$this->extrarecipients = null;
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
			if ($this->collAlertSubscriptionUsers) {
				foreach ($this->collAlertSubscriptionUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsers) {
				foreach ($this->collUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAlertSubscriptionUsers instanceof PropelCollection) {
			$this->collAlertSubscriptionUsers->clearIterator();
		}
		$this->collAlertSubscriptionUsers = null;
		if ($this->collUsers instanceof PropelCollection) {
			$this->collUsers->clearIterator();
		}
		$this->collUsers = null;
		$this->aModuleEntity = null;
		$this->aModuleEntityFieldRelatedByEntitynamefielduniquename = null;
		$this->aModuleEntityFieldRelatedByEntitydatefielduniquename = null;
		$this->aModuleEntityFieldRelatedByEntitybooleanfielduniquename = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AlertSubscriptionPeer::DEFAULT_STRING_FORMAT);
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

} // BaseAlertSubscription
