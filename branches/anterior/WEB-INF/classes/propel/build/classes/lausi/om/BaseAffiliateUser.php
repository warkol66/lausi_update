<?php

require_once 'propel/om/BaseObject.php';

require_once 'propel/om/Persistent.php';


include_once 'propel/util/Criteria.php';

include_once 'lausi/AffiliateUserPeer.php';

/**
 * Base class that represents a row from the 'affiliates_user' table.
 *
 * Usuarios de afiliado
 *
 * This class was autogenerated by Propel on:
 *
 * 10/03/08 16:25:56
 *
 * @package    lausi.om
 */
abstract class BaseAffiliateUser extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AffiliateUserPeer
	 */
	protected static $peer;


	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;


	/**
	 * The value for the affiliateid field.
	 * @var        int
	 */
	protected $affiliateid;


	/**
	 * The value for the username field.
	 * @var        string
	 */
	protected $username;


	/**
	 * The value for the password field.
	 * @var        string
	 */
	protected $password;


	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;


	/**
	 * The value for the created field.
	 * @var        int
	 */
	protected $created;


	/**
	 * The value for the updated field.
	 * @var        int
	 */
	protected $updated;


	/**
	 * The value for the timezone field.
	 * @var        string
	 */
	protected $timezone;


	/**
	 * The value for the levelid field.
	 * @var        int
	 */
	protected $levelid;


	/**
	 * The value for the lastlogin field.
	 * @var        int
	 */
	protected $lastlogin;

	/**
	 * @var        AffiliateUserInfo
	 */
	protected $aAffiliateUserInfo;

	/**
	 * @var        AffiliateLevel
	 */
	protected $aAffiliateLevel;

	/**
	 * @var        Affiliate
	 */
	protected $aAffiliate;

	/**
	 * Collection to store aggregation of collAffiliateUserInfos.
	 * @var        array
	 */
	protected $collAffiliateUserInfos;

	/**
	 * The criteria used to select the current contents of collAffiliateUserInfos.
	 * @var        Criteria
	 */
	protected $lastAffiliateUserInfoCriteria = null;

	/**
	 * Collection to store aggregation of collAffiliateUserGroups.
	 * @var        array
	 */
	protected $collAffiliateUserGroups;

	/**
	 * The criteria used to select the current contents of collAffiliateUserGroups.
	 * @var        Criteria
	 */
	protected $lastAffiliateUserGroupCriteria = null;

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
	 * User Id
	 * @return     int
	 */
	public function getId()
	{

		return $this->id;
	}

	/**
	 * Get the [affiliateid] column value.
	 * Id afiliado
	 * @return     int
	 */
	public function getAffiliateid()
	{

		return $this->affiliateid;
	}

	/**
	 * Get the [username] column value.
	 * username
	 * @return     string
	 */
	public function getUsername()
	{

		return $this->username;
	}

	/**
	 * Get the [password] column value.
	 * password
	 * @return     string
	 */
	public function getPassword()
	{

		return $this->password;
	}

	/**
	 * Get the [active] column value.
	 * Is user active?
	 * @return     boolean
	 */
	public function getActive()
	{

		return $this->active;
	}

	/**
	 * Get the [optionally formatted] [created] column value.
	 * Creation date for
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{

		if ($this->created === null || $this->created === '') {
			return null;
		} elseif (!is_int($this->created)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->created);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [created] as date/time value: " . var_export($this->created, true));
			}
		} else {
			$ts = $this->created;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Get the [optionally formatted] [updated] column value.
	 * Last update date
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getUpdated($format = 'Y-m-d H:i:s')
	{

		if ($this->updated === null || $this->updated === '') {
			return null;
		} elseif (!is_int($this->updated)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->updated);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [updated] as date/time value: " . var_export($this->updated, true));
			}
		} else {
			$ts = $this->updated;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Get the [timezone] column value.
	 * Timezone GMT del usuario afiliado
	 * @return     string
	 */
	public function getTimezone()
	{

		return $this->timezone;
	}

	/**
	 * Get the [levelid] column value.
	 * User Level
	 * @return     int
	 */
	public function getLevelid()
	{

		return $this->levelid;
	}

	/**
	 * Get the [optionally formatted] [lastlogin] column value.
	 * Fecha del ultimo login del usuario
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the integer unix timestamp will be returned.
	 * @return     mixed Formatted date/time value as string or integer unix timestamp (if format is NULL).
	 * @throws     PropelException - if unable to convert the date/time to timestamp.
	 */
	public function getLastlogin($format = 'Y-m-d H:i:s')
	{

		if ($this->lastlogin === null || $this->lastlogin === '') {
			return null;
		} elseif (!is_int($this->lastlogin)) {
			// a non-timestamp value was set externally, so we convert it
			$ts = strtotime($this->lastlogin);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse value of [lastlogin] as date/time value: " . var_export($this->lastlogin, true));
			}
		} else {
			$ts = $this->lastlogin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	/**
	 * Set the value of [id] column.
	 * User Id
	 * @param      int $v new value
	 * @return     void
	 */
	public function setId($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::ID;
		}

		if ($this->aAffiliateUserInfo !== null && $this->aAffiliateUserInfo->getUserid() !== $v) {
			$this->aAffiliateUserInfo = null;
		}

	} // setId()

	/**
	 * Set the value of [affiliateid] column.
	 * Id afiliado
	 * @param      int $v new value
	 * @return     void
	 */
	public function setAffiliateid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->affiliateid !== $v) {
			$this->affiliateid = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::AFFILIATEID;
		}

		if ($this->aAffiliate !== null && $this->aAffiliate->getId() !== $v) {
			$this->aAffiliate = null;
		}

	} // setAffiliateid()

	/**
	 * Set the value of [username] column.
	 * username
	 * @param      string $v new value
	 * @return     void
	 */
	public function setUsername($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::USERNAME;
		}

	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * password
	 * @param      string $v new value
	 * @return     void
	 */
	public function setPassword($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::PASSWORD;
		}

	} // setPassword()

	/**
	 * Set the value of [active] column.
	 * Is user active?
	 * @param      boolean $v new value
	 * @return     void
	 */
	public function setActive($v)
	{

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::ACTIVE;
		}

	} // setActive()

	/**
	 * Set the value of [created] column.
	 * Creation date for
	 * @param      int $v new value
	 * @return     void
	 */
	public function setCreated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [created] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created !== $ts) {
			$this->created = $ts;
			$this->modifiedColumns[] = AffiliateUserPeer::CREATED;
		}

	} // setCreated()

	/**
	 * Set the value of [updated] column.
	 * Last update date
	 * @param      int $v new value
	 * @return     void
	 */
	public function setUpdated($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [updated] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated !== $ts) {
			$this->updated = $ts;
			$this->modifiedColumns[] = AffiliateUserPeer::UPDATED;
		}

	} // setUpdated()

	/**
	 * Set the value of [timezone] column.
	 * Timezone GMT del usuario afiliado
	 * @param      string $v new value
	 * @return     void
	 */
	public function setTimezone($v)
	{

		// Since the native PHP type for this column is string,
		// we will cast the input to a string (if it is not).
		if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->timezone !== $v) {
			$this->timezone = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::TIMEZONE;
		}

	} // setTimezone()

	/**
	 * Set the value of [levelid] column.
	 * User Level
	 * @param      int $v new value
	 * @return     void
	 */
	public function setLevelid($v)
	{

		// Since the native PHP type for this column is integer,
		// we will cast the input value to an int (if it is not).
		if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->levelid !== $v) {
			$this->levelid = $v;
			$this->modifiedColumns[] = AffiliateUserPeer::LEVELID;
		}

		if ($this->aAffiliateLevel !== null && $this->aAffiliateLevel->getId() !== $v) {
			$this->aAffiliateLevel = null;
		}

	} // setLevelid()

	/**
	 * Set the value of [lastlogin] column.
	 * Fecha del ultimo login del usuario
	 * @param      int $v new value
	 * @return     void
	 */
	public function setLastlogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { // in PHP 5.1 return value changes to FALSE
				throw new PropelException("Unable to parse date/time value for [lastlogin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->lastlogin !== $ts) {
			$this->lastlogin = $ts;
			$this->modifiedColumns[] = AffiliateUserPeer::LASTLOGIN;
		}

	} // setLastlogin()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (1-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      ResultSet $rs The ResultSet class with cursor advanced to desired record pos.
	 * @param      int $startcol 1-based offset column which indicates which restultset column to start with.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->affiliateid = $rs->getInt($startcol + 1);

			$this->username = $rs->getString($startcol + 2);

			$this->password = $rs->getString($startcol + 3);

			$this->active = $rs->getBoolean($startcol + 4);

			$this->created = $rs->getTimestamp($startcol + 5, null);

			$this->updated = $rs->getTimestamp($startcol + 6, null);

			$this->timezone = $rs->getString($startcol + 7);

			$this->levelid = $rs->getInt($startcol + 8);

			$this->lastlogin = $rs->getTimestamp($startcol + 9, null);

			$this->resetModified();

			$this->setNew(false);

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 10; // 10 = AffiliateUserPeer::NUM_COLUMNS - AffiliateUserPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating AffiliateUser object", $e);
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      Connection $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AffiliateUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.  If the object is new,
	 * it inserts it; otherwise an update is performed.  This method
	 * wraps the doSave() worker method in a transaction.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AffiliateUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	/**
	 * Stores the object in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      Connection $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave($con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aAffiliateUserInfo !== null) {
				if ($this->aAffiliateUserInfo->isModified()) {
					$affectedRows += $this->aAffiliateUserInfo->save($con);
				}
				$this->setAffiliateUserInfo($this->aAffiliateUserInfo);
			}

			if ($this->aAffiliateLevel !== null) {
				if ($this->aAffiliateLevel->isModified()) {
					$affectedRows += $this->aAffiliateLevel->save($con);
				}
				$this->setAffiliateLevel($this->aAffiliateLevel);
			}

			if ($this->aAffiliate !== null) {
				if ($this->aAffiliate->isModified()) {
					$affectedRows += $this->aAffiliate->save($con);
				}
				$this->setAffiliate($this->aAffiliate);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AffiliateUserPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += AffiliateUserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collAffiliateUserInfos !== null) {
				foreach($this->collAffiliateUserInfos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAffiliateUserGroups !== null) {
				foreach($this->collAffiliateUserGroups as $referrerFK) {
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

			if ($this->aAffiliateUserInfo !== null) {
				if (!$this->aAffiliateUserInfo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateUserInfo->getValidationFailures());
				}
			}

			if ($this->aAffiliateLevel !== null) {
				if (!$this->aAffiliateLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliateLevel->getValidationFailures());
				}
			}

			if ($this->aAffiliate !== null) {
				if (!$this->aAffiliate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAffiliate->getValidationFailures());
				}
			}


			if (($retval = AffiliateUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAffiliateUserInfos !== null) {
					foreach($this->collAffiliateUserInfos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAffiliateUserGroups !== null) {
					foreach($this->collAffiliateUserGroups as $referrerFK) {
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
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(AffiliateUserPeer::ID)) $criteria->add(AffiliateUserPeer::ID, $this->id);
		if ($this->isColumnModified(AffiliateUserPeer::AFFILIATEID)) $criteria->add(AffiliateUserPeer::AFFILIATEID, $this->affiliateid);
		if ($this->isColumnModified(AffiliateUserPeer::USERNAME)) $criteria->add(AffiliateUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(AffiliateUserPeer::PASSWORD)) $criteria->add(AffiliateUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(AffiliateUserPeer::ACTIVE)) $criteria->add(AffiliateUserPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(AffiliateUserPeer::CREATED)) $criteria->add(AffiliateUserPeer::CREATED, $this->created);
		if ($this->isColumnModified(AffiliateUserPeer::UPDATED)) $criteria->add(AffiliateUserPeer::UPDATED, $this->updated);
		if ($this->isColumnModified(AffiliateUserPeer::TIMEZONE)) $criteria->add(AffiliateUserPeer::TIMEZONE, $this->timezone);
		if ($this->isColumnModified(AffiliateUserPeer::LEVELID)) $criteria->add(AffiliateUserPeer::LEVELID, $this->levelid);
		if ($this->isColumnModified(AffiliateUserPeer::LASTLOGIN)) $criteria->add(AffiliateUserPeer::LASTLOGIN, $this->lastlogin);

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
		$criteria = new Criteria(AffiliateUserPeer::DATABASE_NAME);

		$criteria->add(AffiliateUserPeer::ID, $this->id);

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
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AffiliateUser (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setAffiliateid($this->affiliateid);

		$copyObj->setUsername($this->username);

		$copyObj->setPassword($this->password);

		$copyObj->setActive($this->active);

		$copyObj->setCreated($this->created);

		$copyObj->setUpdated($this->updated);

		$copyObj->setTimezone($this->timezone);

		$copyObj->setLevelid($this->levelid);

		$copyObj->setLastlogin($this->lastlogin);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach($this->getAffiliateUserInfos() as $relObj) {
				$copyObj->addAffiliateUserInfo($relObj->copy($deepCopy));
			}

			foreach($this->getAffiliateUserGroups() as $relObj) {
				$copyObj->addAffiliateUserGroup($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a pkey column, so set to default value

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
	 * @return     AffiliateUser Clone of current object.
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
	 * @return     AffiliateUserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AffiliateUserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a AffiliateUserInfo object.
	 *
	 * @param      AffiliateUserInfo $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setAffiliateUserInfo($v)
	{


		if ($v === null) {
			$this->setId(NULL);
		} else {
			$this->setId($v->getUserid());
		}


		$this->aAffiliateUserInfo = $v;
	}


	/**
	 * Get the associated AffiliateUserInfo object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     AffiliateUserInfo The associated AffiliateUserInfo object.
	 * @throws     PropelException
	 */
	public function getAffiliateUserInfo($con = null)
	{
		// include the related Peer class
		include_once 'lausi/om/BaseAffiliateUserInfoPeer.php';

		if ($this->aAffiliateUserInfo === null && ($this->id !== null)) {

			$this->aAffiliateUserInfo = AffiliateUserInfoPeer::retrieveByPK($this->id, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliateUserInfoPeer::retrieveByPK($this->id, $con);
			   $obj->addAffiliateUserInfos($this);
			 */
		}
		return $this->aAffiliateUserInfo;
	}

	/**
	 * Declares an association between this object and a AffiliateLevel object.
	 *
	 * @param      AffiliateLevel $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setAffiliateLevel($v)
	{


		if ($v === null) {
			$this->setLevelid(NULL);
		} else {
			$this->setLevelid($v->getId());
		}


		$this->aAffiliateLevel = $v;
	}


	/**
	 * Get the associated AffiliateLevel object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     AffiliateLevel The associated AffiliateLevel object.
	 * @throws     PropelException
	 */
	public function getAffiliateLevel($con = null)
	{
		// include the related Peer class
		include_once 'lausi/om/BaseAffiliateLevelPeer.php';

		if ($this->aAffiliateLevel === null && ($this->levelid !== null)) {

			$this->aAffiliateLevel = AffiliateLevelPeer::retrieveByPK($this->levelid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliateLevelPeer::retrieveByPK($this->levelid, $con);
			   $obj->addAffiliateLevels($this);
			 */
		}
		return $this->aAffiliateLevel;
	}

	/**
	 * Declares an association between this object and a Affiliate object.
	 *
	 * @param      Affiliate $v
	 * @return     void
	 * @throws     PropelException
	 */
	public function setAffiliate($v)
	{


		if ($v === null) {
			$this->setAffiliateid(NULL);
		} else {
			$this->setAffiliateid($v->getId());
		}


		$this->aAffiliate = $v;
	}


	/**
	 * Get the associated Affiliate object
	 *
	 * @param      Connection Optional Connection object.
	 * @return     Affiliate The associated Affiliate object.
	 * @throws     PropelException
	 */
	public function getAffiliate($con = null)
	{
		// include the related Peer class
		include_once 'lausi/om/BaseAffiliatePeer.php';

		if ($this->aAffiliate === null && ($this->affiliateid !== null)) {

			$this->aAffiliate = AffiliatePeer::retrieveByPK($this->affiliateid, $con);

			/* The following can be used instead of the line above to
			   guarantee the related object contains a reference
			   to this object, but this level of coupling
			   may be undesirable in many circumstances.
			   As it can lead to a db query with many results that may
			   never be used.
			   $obj = AffiliatePeer::retrieveByPK($this->affiliateid, $con);
			   $obj->addAffiliates($this);
			 */
		}
		return $this->aAffiliate;
	}

	/**
	 * Temporary storage of collAffiliateUserInfos to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initAffiliateUserInfos()
	{
		if ($this->collAffiliateUserInfos === null) {
			$this->collAffiliateUserInfos = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser has previously
	 * been saved, it will retrieve related AffiliateUserInfos from storage.
	 * If this AffiliateUser is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getAffiliateUserInfos($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'lausi/om/BaseAffiliateUserInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUserInfos === null) {
			if ($this->isNew()) {
			   $this->collAffiliateUserInfos = array();
			} else {

				$criteria->add(AffiliateUserInfoPeer::USERID, $this->getId());

				AffiliateUserInfoPeer::addSelectColumns($criteria);
				$this->collAffiliateUserInfos = AffiliateUserInfoPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateUserInfoPeer::USERID, $this->getId());

				AffiliateUserInfoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateUserInfoCriteria) || !$this->lastAffiliateUserInfoCriteria->equals($criteria)) {
					$this->collAffiliateUserInfos = AffiliateUserInfoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateUserInfoCriteria = $criteria;
		return $this->collAffiliateUserInfos;
	}

	/**
	 * Returns the number of related AffiliateUserInfos.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countAffiliateUserInfos($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'lausi/om/BaseAffiliateUserInfoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AffiliateUserInfoPeer::USERID, $this->getId());

		return AffiliateUserInfoPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a AffiliateUserInfo object to this object
	 * through the AffiliateUserInfo foreign key attribute
	 *
	 * @param      AffiliateUserInfo $l AffiliateUserInfo
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUserInfo(AffiliateUserInfo $l)
	{
		$this->collAffiliateUserInfos[] = $l;
		$l->setAffiliateUser($this);
	}

	/**
	 * Temporary storage of collAffiliateUserGroups to save a possible db hit in
	 * the event objects are add to the collection, but the
	 * complete collection is never requested.
	 * @return     void
	 */
	public function initAffiliateUserGroups()
	{
		if ($this->collAffiliateUserGroups === null) {
			$this->collAffiliateUserGroups = array();
		}
	}

	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser has previously
	 * been saved, it will retrieve related AffiliateUserGroups from storage.
	 * If this AffiliateUser is new, it will return
	 * an empty collection or the current collection, the criteria
	 * is ignored on a new object.
	 *
	 * @param      Connection $con
	 * @param      Criteria $criteria
	 * @throws     PropelException
	 */
	public function getAffiliateUserGroups($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'lausi/om/BaseAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUserGroups === null) {
			if ($this->isNew()) {
			   $this->collAffiliateUserGroups = array();
			} else {

				$criteria->add(AffiliateUserGroupPeer::USERID, $this->getId());

				AffiliateUserGroupPeer::addSelectColumns($criteria);
				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(AffiliateUserGroupPeer::USERID, $this->getId());

				AffiliateUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastAffiliateUserGroupCriteria) || !$this->lastAffiliateUserGroupCriteria->equals($criteria)) {
					$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAffiliateUserGroupCriteria = $criteria;
		return $this->collAffiliateUserGroups;
	}

	/**
	 * Returns the number of related AffiliateUserGroups.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      Connection $con
	 * @throws     PropelException
	 */
	public function countAffiliateUserGroups($criteria = null, $distinct = false, $con = null)
	{
		// include the Peer class
		include_once 'lausi/om/BaseAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AffiliateUserGroupPeer::USERID, $this->getId());

		return AffiliateUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	/**
	 * Method called to associate a AffiliateUserGroup object to this object
	 * through the AffiliateUserGroup foreign key attribute
	 *
	 * @param      AffiliateUserGroup $l AffiliateUserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addAffiliateUserGroup(AffiliateUserGroup $l)
	{
		$this->collAffiliateUserGroups[] = $l;
		$l->setAffiliateUser($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AffiliateUser is new, it will return
	 * an empty collection; or if this AffiliateUser has previously
	 * been saved, it will retrieve related AffiliateUserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AffiliateUser.
	 */
	public function getAffiliateUserGroupsJoinAffiliateGroup($criteria = null, $con = null)
	{
		// include the Peer class
		include_once 'lausi/om/BaseAffiliateUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAffiliateUserGroups === null) {
			if ($this->isNew()) {
				$this->collAffiliateUserGroups = array();
			} else {

				$criteria->add(AffiliateUserGroupPeer::USERID, $this->getId());

				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelectJoinAffiliateGroup($criteria, $con);
			}
		} else {
			// the following code is to determine if a new query is
			// called for.  If the criteria is the same as the last
			// one, just return the collection.

			$criteria->add(AffiliateUserGroupPeer::USERID, $this->getId());

			if (!isset($this->lastAffiliateUserGroupCriteria) || !$this->lastAffiliateUserGroupCriteria->equals($criteria)) {
				$this->collAffiliateUserGroups = AffiliateUserGroupPeer::doSelectJoinAffiliateGroup($criteria, $con);
			}
		}
		$this->lastAffiliateUserGroupCriteria = $criteria;

		return $this->collAffiliateUserGroups;
	}

} // BaseAffiliateUser
