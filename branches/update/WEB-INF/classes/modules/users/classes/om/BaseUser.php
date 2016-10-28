<?php


/**
 * Base class that represents a row from the 'users_user' table.
 *
 * Users
 *
 * @package    propel.generator.users.classes.om
 */
abstract class BaseUser extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UserPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

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
	 * The value for the passwordupdated field.
	 * @var        string
	 */
	protected $passwordupdated;

	/**
	 * The value for the active field.
	 * @var        boolean
	 */
	protected $active;

	/**
	 * The value for the levelid field.
	 * @var        int
	 */
	protected $levelid;

	/**
	 * The value for the lastlogin field.
	 * @var        string
	 */
	protected $lastlogin;

	/**
	 * The value for the timezone field.
	 * @var        string
	 */
	protected $timezone;

	/**
	 * The value for the recoveryhash field.
	 * @var        string
	 */
	protected $recoveryhash;

	/**
	 * The value for the recoveryhashcreatedon field.
	 * @var        string
	 */
	protected $recoveryhashcreatedon;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the surname field.
	 * @var        string
	 */
	protected $surname;

	/**
	 * The value for the mailaddress field.
	 * @var        string
	 */
	protected $mailaddress;

	/**
	 * The value for the mailaddressalt field.
	 * @var        string
	 */
	protected $mailaddressalt;

	/**
	 * The value for the deleted_at field.
	 * @var        string
	 */
	protected $deleted_at;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * @var        Level
	 */
	protected $aLevel;

	/**
	 * @var        array ActionLog[] Collection to store aggregation of ActionLog objects.
	 */
	protected $collActionLogs;

	/**
	 * @var        array AlertSubscriptionUser[] Collection to store aggregation of AlertSubscriptionUser objects.
	 */
	protected $collAlertSubscriptionUsers;

	/**
	 * @var        array ScheduleSubscriptionUser[] Collection to store aggregation of ScheduleSubscriptionUser objects.
	 */
	protected $collScheduleSubscriptionUsers;

	/**
	 * @var        array UserGroup[] Collection to store aggregation of UserGroup objects.
	 */
	protected $collUserGroups;

	/**
	 * @var        array AlertSubscription[] Collection to store aggregation of AlertSubscription objects.
	 */
	protected $collAlertSubscriptions;

	/**
	 * @var        array ScheduleSubscription[] Collection to store aggregation of ScheduleSubscription objects.
	 */
	protected $collScheduleSubscriptions;

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
	 * Get the [optionally formatted] temporal [passwordupdated] column value.
	 * Fecha de actualizacion de la clave
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getPasswordupdated($format = '%Y/%m/%d')
	{
		if ($this->passwordupdated === null) {
			return null;
		}


		if ($this->passwordupdated === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->passwordupdated);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->passwordupdated, true), $x);
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
	 * Get the [active] column value.
	 * Is user active?
	 * @return     boolean
	 */
	public function getActive()
	{
		return $this->active;
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
	 * Get the [optionally formatted] temporal [lastlogin] column value.
	 * Fecha del ultimo login del usuario
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getLastlogin($format = 'Y-m-d H:i:s')
	{
		if ($this->lastlogin === null) {
			return null;
		}


		if ($this->lastlogin === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->lastlogin);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastlogin, true), $x);
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
	 * Get the [timezone] column value.
	 * Timezone GMT del usuario
	 * @return     string
	 */
	public function getTimezone()
	{
		return $this->timezone;
	}

	/**
	 * Get the [recoveryhash] column value.
	 * Hash enviado para la recuperacion de clave
	 * @return     string
	 */
	public function getRecoveryhash()
	{
		return $this->recoveryhash;
	}

	/**
	 * Get the [optionally formatted] temporal [recoveryhashcreatedon] column value.
	 * Momento de la solicitud para la recuperacion de clave
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getRecoveryhashcreatedon($format = 'Y-m-d H:i:s')
	{
		if ($this->recoveryhashcreatedon === null) {
			return null;
		}


		if ($this->recoveryhashcreatedon === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->recoveryhashcreatedon);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->recoveryhashcreatedon, true), $x);
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
	 * Get the [name] column value.
	 * Nombre
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [surname] column value.
	 * Apellido
	 * @return     string
	 */
	public function getSurname()
	{
		return $this->surname;
	}

	/**
	 * Get the [mailaddress] column value.
	 * Direccion electronica
	 * @return     string
	 */
	public function getMailaddress()
	{
		return $this->mailaddress;
	}

	/**
	 * Get the [mailaddressalt] column value.
	 * Direccion electronica alternativa
	 * @return     string
	 */
	public function getMailaddressalt()
	{
		return $this->mailaddressalt;
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
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
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
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
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
	 * User Id
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [username] column.
	 * username
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setUsername($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = UserPeer::USERNAME;
		}

		return $this;
	} // setUsername()

	/**
	 * Set the value of [password] column.
	 * password
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setPassword($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = UserPeer::PASSWORD;
		}

		return $this;
	} // setPassword()

	/**
	 * Sets the value of [passwordupdated] column to a normalized version of the date/time value specified.
	 * Fecha de actualizacion de la clave
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setPasswordupdated($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->passwordupdated !== null || $dt !== null) {
			$currentDateAsString = ($this->passwordupdated !== null && $tmpDt = new DateTime($this->passwordupdated)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->passwordupdated = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::PASSWORDUPDATED;
			}
		} // if either are not null

		return $this;
	} // setPasswordupdated()

	/**
	 * Sets the value of the [active] column. 
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * Is user active?
	 * @param      boolean|integer|string $v The new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setActive($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->active !== $v) {
			$this->active = $v;
			$this->modifiedColumns[] = UserPeer::ACTIVE;
		}

		return $this;
	} // setActive()

	/**
	 * Set the value of [levelid] column.
	 * User Level
	 * @param      int $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setLevelid($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->levelid !== $v) {
			$this->levelid = $v;
			$this->modifiedColumns[] = UserPeer::LEVELID;
		}

		if ($this->aLevel !== null && $this->aLevel->getId() !== $v) {
			$this->aLevel = null;
		}

		return $this;
	} // setLevelid()

	/**
	 * Sets the value of [lastlogin] column to a normalized version of the date/time value specified.
	 * Fecha del ultimo login del usuario
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setLastlogin($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->lastlogin !== null || $dt !== null) {
			$currentDateAsString = ($this->lastlogin !== null && $tmpDt = new DateTime($this->lastlogin)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->lastlogin = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::LASTLOGIN;
			}
		} // if either are not null

		return $this;
	} // setLastlogin()

	/**
	 * Set the value of [timezone] column.
	 * Timezone GMT del usuario
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setTimezone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->timezone !== $v) {
			$this->timezone = $v;
			$this->modifiedColumns[] = UserPeer::TIMEZONE;
		}

		return $this;
	} // setTimezone()

	/**
	 * Set the value of [recoveryhash] column.
	 * Hash enviado para la recuperacion de clave
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setRecoveryhash($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->recoveryhash !== $v) {
			$this->recoveryhash = $v;
			$this->modifiedColumns[] = UserPeer::RECOVERYHASH;
		}

		return $this;
	} // setRecoveryhash()

	/**
	 * Sets the value of [recoveryhashcreatedon] column to a normalized version of the date/time value specified.
	 * Momento de la solicitud para la recuperacion de clave
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setRecoveryhashcreatedon($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->recoveryhashcreatedon !== null || $dt !== null) {
			$currentDateAsString = ($this->recoveryhashcreatedon !== null && $tmpDt = new DateTime($this->recoveryhashcreatedon)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->recoveryhashcreatedon = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::RECOVERYHASHCREATEDON;
			}
		} // if either are not null

		return $this;
	} // setRecoveryhashcreatedon()

	/**
	 * Set the value of [name] column.
	 * Nombre
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = UserPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [surname] column.
	 * Apellido
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setSurname($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->surname !== $v) {
			$this->surname = $v;
			$this->modifiedColumns[] = UserPeer::SURNAME;
		}

		return $this;
	} // setSurname()

	/**
	 * Set the value of [mailaddress] column.
	 * Direccion electronica
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setMailaddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mailaddress !== $v) {
			$this->mailaddress = $v;
			$this->modifiedColumns[] = UserPeer::MAILADDRESS;
		}

		return $this;
	} // setMailaddress()

	/**
	 * Set the value of [mailaddressalt] column.
	 * Direccion electronica alternativa
	 * @param      string $v new value
	 * @return     User The current object (for fluent API support)
	 */
	public function setMailaddressalt($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->mailaddressalt !== $v) {
			$this->mailaddressalt = $v;
			$this->modifiedColumns[] = UserPeer::MAILADDRESSALT;
		}

		return $this;
	} // setMailaddressalt()

	/**
	 * Sets the value of [deleted_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setDeletedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->deleted_at !== null || $dt !== null) {
			$currentDateAsString = ($this->deleted_at !== null && $tmpDt = new DateTime($this->deleted_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->deleted_at = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::DELETED_AT;
			}
		} // if either are not null

		return $this;
	} // setDeletedAt()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     User The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = UserPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

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
			$this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->password = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->passwordupdated = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->active = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->levelid = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->lastlogin = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->timezone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->recoveryhash = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->recoveryhashcreatedon = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->name = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->surname = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->mailaddress = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->mailaddressalt = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->deleted_at = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->created_at = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->updated_at = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 17; // 17 = UserPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating User object", $e);
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

		if ($this->aLevel !== null && $this->levelid !== $this->aLevel->getId()) {
			$this->aLevel = null;
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLevel = null;
			$this->collActionLogs = null;

			$this->collAlertSubscriptionUsers = null;

			$this->collScheduleSubscriptionUsers = null;

			$this->collUserGroups = null;

			$this->collAlertSubscriptions = null;
			$this->collScheduleSubscriptions = null;
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// soft_delete behavior
			if (!empty($ret) && UserQuery::isSoftDeleteEnabled()) {
				$this->keepUpdateDateUnchanged();
				$this->setDeletedAt(time());
				$this->save($con);
				$con->commit();
				UserPeer::removeInstanceFromPool($this);
				return;
			}

			if ($ret) {
				UserQuery::create()
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
			$con = Propel::getConnection(UserPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// timestampable behavior
				if (!$this->isColumnModified(UserPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(UserPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			} else {
				$ret = $ret && $this->preUpdate($con);
				// timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(UserPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				UserPeer::addInstanceToPool($this);
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

			if ($this->aLevel !== null) {
				if ($this->aLevel->isModified() || $this->aLevel->isNew()) {
					$affectedRows += $this->aLevel->save($con);
				}
				$this->setLevel($this->aLevel);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = UserPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(UserPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += UserPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collActionLogs !== null) {
				foreach ($this->collActionLogs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAlertSubscriptionUsers !== null) {
				foreach ($this->collAlertSubscriptionUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collScheduleSubscriptionUsers !== null) {
				foreach ($this->collScheduleSubscriptionUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collUserGroups !== null) {
				foreach ($this->collUserGroups as $referrerFK) {
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

			if ($this->aLevel !== null) {
				if (!$this->aLevel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLevel->getValidationFailures());
				}
			}


			if (($retval = UserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collActionLogs !== null) {
					foreach ($this->collActionLogs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAlertSubscriptionUsers !== null) {
					foreach ($this->collAlertSubscriptionUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collScheduleSubscriptionUsers !== null) {
					foreach ($this->collScheduleSubscriptionUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collUserGroups !== null) {
					foreach ($this->collUserGroups as $referrerFK) {
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUsername();
				break;
			case 2:
				return $this->getPassword();
				break;
			case 3:
				return $this->getPasswordupdated();
				break;
			case 4:
				return $this->getActive();
				break;
			case 5:
				return $this->getLevelid();
				break;
			case 6:
				return $this->getLastlogin();
				break;
			case 7:
				return $this->getTimezone();
				break;
			case 8:
				return $this->getRecoveryhash();
				break;
			case 9:
				return $this->getRecoveryhashcreatedon();
				break;
			case 10:
				return $this->getName();
				break;
			case 11:
				return $this->getSurname();
				break;
			case 12:
				return $this->getMailaddress();
				break;
			case 13:
				return $this->getMailaddressalt();
				break;
			case 14:
				return $this->getDeletedAt();
				break;
			case 15:
				return $this->getCreatedAt();
				break;
			case 16:
				return $this->getUpdatedAt();
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
		if (isset($alreadyDumpedObjects['User'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['User'][$this->getPrimaryKey()] = true;
		$keys = UserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getPassword(),
			$keys[3] => $this->getPasswordupdated(),
			$keys[4] => $this->getActive(),
			$keys[5] => $this->getLevelid(),
			$keys[6] => $this->getLastlogin(),
			$keys[7] => $this->getTimezone(),
			$keys[8] => $this->getRecoveryhash(),
			$keys[9] => $this->getRecoveryhashcreatedon(),
			$keys[10] => $this->getName(),
			$keys[11] => $this->getSurname(),
			$keys[12] => $this->getMailaddress(),
			$keys[13] => $this->getMailaddressalt(),
			$keys[14] => $this->getDeletedAt(),
			$keys[15] => $this->getCreatedAt(),
			$keys[16] => $this->getUpdatedAt(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aLevel) {
				$result['Level'] = $this->aLevel->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collActionLogs) {
				$result['ActionLogs'] = $this->collActionLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collAlertSubscriptionUsers) {
				$result['AlertSubscriptionUsers'] = $this->collAlertSubscriptionUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collScheduleSubscriptionUsers) {
				$result['ScheduleSubscriptionUsers'] = $this->collScheduleSubscriptionUsers->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUserGroups) {
				$result['UserGroups'] = $this->collUserGroups->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = UserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUsername($value);
				break;
			case 2:
				$this->setPassword($value);
				break;
			case 3:
				$this->setPasswordupdated($value);
				break;
			case 4:
				$this->setActive($value);
				break;
			case 5:
				$this->setLevelid($value);
				break;
			case 6:
				$this->setLastlogin($value);
				break;
			case 7:
				$this->setTimezone($value);
				break;
			case 8:
				$this->setRecoveryhash($value);
				break;
			case 9:
				$this->setRecoveryhashcreatedon($value);
				break;
			case 10:
				$this->setName($value);
				break;
			case 11:
				$this->setSurname($value);
				break;
			case 12:
				$this->setMailaddress($value);
				break;
			case 13:
				$this->setMailaddressalt($value);
				break;
			case 14:
				$this->setDeletedAt($value);
				break;
			case 15:
				$this->setCreatedAt($value);
				break;
			case 16:
				$this->setUpdatedAt($value);
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
		$keys = UserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPasswordupdated($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setActive($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLevelid($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastlogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTimezone($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRecoveryhash($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRecoveryhashcreatedon($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setName($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSurname($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMailaddress($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMailaddressalt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDeletedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCreatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUpdatedAt($arr[$keys[16]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserPeer::DATABASE_NAME);

		if ($this->isColumnModified(UserPeer::ID)) $criteria->add(UserPeer::ID, $this->id);
		if ($this->isColumnModified(UserPeer::USERNAME)) $criteria->add(UserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(UserPeer::PASSWORD)) $criteria->add(UserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(UserPeer::PASSWORDUPDATED)) $criteria->add(UserPeer::PASSWORDUPDATED, $this->passwordupdated);
		if ($this->isColumnModified(UserPeer::ACTIVE)) $criteria->add(UserPeer::ACTIVE, $this->active);
		if ($this->isColumnModified(UserPeer::LEVELID)) $criteria->add(UserPeer::LEVELID, $this->levelid);
		if ($this->isColumnModified(UserPeer::LASTLOGIN)) $criteria->add(UserPeer::LASTLOGIN, $this->lastlogin);
		if ($this->isColumnModified(UserPeer::TIMEZONE)) $criteria->add(UserPeer::TIMEZONE, $this->timezone);
		if ($this->isColumnModified(UserPeer::RECOVERYHASH)) $criteria->add(UserPeer::RECOVERYHASH, $this->recoveryhash);
		if ($this->isColumnModified(UserPeer::RECOVERYHASHCREATEDON)) $criteria->add(UserPeer::RECOVERYHASHCREATEDON, $this->recoveryhashcreatedon);
		if ($this->isColumnModified(UserPeer::NAME)) $criteria->add(UserPeer::NAME, $this->name);
		if ($this->isColumnModified(UserPeer::SURNAME)) $criteria->add(UserPeer::SURNAME, $this->surname);
		if ($this->isColumnModified(UserPeer::MAILADDRESS)) $criteria->add(UserPeer::MAILADDRESS, $this->mailaddress);
		if ($this->isColumnModified(UserPeer::MAILADDRESSALT)) $criteria->add(UserPeer::MAILADDRESSALT, $this->mailaddressalt);
		if ($this->isColumnModified(UserPeer::DELETED_AT)) $criteria->add(UserPeer::DELETED_AT, $this->deleted_at);
		if ($this->isColumnModified(UserPeer::CREATED_AT)) $criteria->add(UserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(UserPeer::UPDATED_AT)) $criteria->add(UserPeer::UPDATED_AT, $this->updated_at);

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
		$criteria = new Criteria(UserPeer::DATABASE_NAME);
		$criteria->add(UserPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of User (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUsername($this->getUsername());
		$copyObj->setPassword($this->getPassword());
		$copyObj->setPasswordupdated($this->getPasswordupdated());
		$copyObj->setActive($this->getActive());
		$copyObj->setLevelid($this->getLevelid());
		$copyObj->setLastlogin($this->getLastlogin());
		$copyObj->setTimezone($this->getTimezone());
		$copyObj->setRecoveryhash($this->getRecoveryhash());
		$copyObj->setRecoveryhashcreatedon($this->getRecoveryhashcreatedon());
		$copyObj->setName($this->getName());
		$copyObj->setSurname($this->getSurname());
		$copyObj->setMailaddress($this->getMailaddress());
		$copyObj->setMailaddressalt($this->getMailaddressalt());
		$copyObj->setDeletedAt($this->getDeletedAt());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getActionLogs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addActionLog($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAlertSubscriptionUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlertSubscriptionUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getScheduleSubscriptionUsers() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addScheduleSubscriptionUser($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUserGroups() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUserGroup($relObj->copy($deepCopy));
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
	 * @return     User Clone of current object.
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
	 * @return     UserPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Level object.
	 *
	 * @param      Level $v
	 * @return     User The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLevel(Level $v = null)
	{
		if ($v === null) {
			$this->setLevelid(NULL);
		} else {
			$this->setLevelid($v->getId());
		}

		$this->aLevel = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Level object, it will not be re-added.
		if ($v !== null) {
			$v->addUser($this);
		}

		return $this;
	}


	/**
	 * Get the associated Level object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Level The associated Level object.
	 * @throws     PropelException
	 */
	public function getLevel(PropelPDO $con = null)
	{
		if ($this->aLevel === null && ($this->levelid !== null)) {
			$this->aLevel = LevelQuery::create()->findPk($this->levelid, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aLevel->addUsers($this);
			 */
		}
		return $this->aLevel;
	}

	/**
	 * Clears out the collActionLogs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addActionLogs()
	 */
	public function clearActionLogs()
	{
		$this->collActionLogs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collActionLogs collection.
	 *
	 * By default this just sets the collActionLogs collection to an empty array (like clearcollActionLogs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initActionLogs($overrideExisting = true)
	{
		if (null !== $this->collActionLogs && !$overrideExisting) {
			return;
		}
		$this->collActionLogs = new PropelObjectCollection();
		$this->collActionLogs->setModel('ActionLog');
	}

	/**
	 * Gets an array of ActionLog objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ActionLog[] List of ActionLog objects
	 * @throws     PropelException
	 */
	public function getActionLogs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collActionLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collActionLogs) {
				// return empty collection
				$this->initActionLogs();
			} else {
				$collActionLogs = ActionLogQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collActionLogs;
				}
				$this->collActionLogs = $collActionLogs;
			}
		}
		return $this->collActionLogs;
	}

	/**
	 * Returns the number of related ActionLog objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ActionLog objects.
	 * @throws     PropelException
	 */
	public function countActionLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collActionLogs || null !== $criteria) {
			if ($this->isNew() && null === $this->collActionLogs) {
				return 0;
			} else {
				$query = ActionLogQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collActionLogs);
		}
	}

	/**
	 * Method called to associate a ActionLog object to this object
	 * through the ActionLog foreign key attribute.
	 *
	 * @param      ActionLog $l ActionLog
	 * @return     void
	 * @throws     PropelException
	 */
	public function addActionLog(ActionLog $l)
	{
		if ($this->collActionLogs === null) {
			$this->initActionLogs();
		}
		if (!$this->collActionLogs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collActionLogs[]= $l;
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ActionLogs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ActionLog[] List of ActionLog objects
	 */
	public function getActionLogsJoinSecurityAction($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ActionLogQuery::create(null, $criteria);
		$query->joinWith('SecurityAction', $join_behavior);

		return $this->getActionLogs($query, $con);
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
	 * If this User is new, it will return
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
					->filterByUser($this)
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
					->filterByUser($this)
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
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related AlertSubscriptionUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AlertSubscriptionUser[] List of AlertSubscriptionUser objects
	 */
	public function getAlertSubscriptionUsersJoinAlertSubscription($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AlertSubscriptionUserQuery::create(null, $criteria);
		$query->joinWith('AlertSubscription', $join_behavior);

		return $this->getAlertSubscriptionUsers($query, $con);
	}

	/**
	 * Clears out the collScheduleSubscriptionUsers collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addScheduleSubscriptionUsers()
	 */
	public function clearScheduleSubscriptionUsers()
	{
		$this->collScheduleSubscriptionUsers = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collScheduleSubscriptionUsers collection.
	 *
	 * By default this just sets the collScheduleSubscriptionUsers collection to an empty array (like clearcollScheduleSubscriptionUsers());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initScheduleSubscriptionUsers($overrideExisting = true)
	{
		if (null !== $this->collScheduleSubscriptionUsers && !$overrideExisting) {
			return;
		}
		$this->collScheduleSubscriptionUsers = new PropelObjectCollection();
		$this->collScheduleSubscriptionUsers->setModel('ScheduleSubscriptionUser');
	}

	/**
	 * Gets an array of ScheduleSubscriptionUser objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ScheduleSubscriptionUser[] List of ScheduleSubscriptionUser objects
	 * @throws     PropelException
	 */
	public function getScheduleSubscriptionUsers($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collScheduleSubscriptionUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collScheduleSubscriptionUsers) {
				// return empty collection
				$this->initScheduleSubscriptionUsers();
			} else {
				$collScheduleSubscriptionUsers = ScheduleSubscriptionUserQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collScheduleSubscriptionUsers;
				}
				$this->collScheduleSubscriptionUsers = $collScheduleSubscriptionUsers;
			}
		}
		return $this->collScheduleSubscriptionUsers;
	}

	/**
	 * Returns the number of related ScheduleSubscriptionUser objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ScheduleSubscriptionUser objects.
	 * @throws     PropelException
	 */
	public function countScheduleSubscriptionUsers(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collScheduleSubscriptionUsers || null !== $criteria) {
			if ($this->isNew() && null === $this->collScheduleSubscriptionUsers) {
				return 0;
			} else {
				$query = ScheduleSubscriptionUserQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collScheduleSubscriptionUsers);
		}
	}

	/**
	 * Method called to associate a ScheduleSubscriptionUser object to this object
	 * through the ScheduleSubscriptionUser foreign key attribute.
	 *
	 * @param      ScheduleSubscriptionUser $l ScheduleSubscriptionUser
	 * @return     void
	 * @throws     PropelException
	 */
	public function addScheduleSubscriptionUser(ScheduleSubscriptionUser $l)
	{
		if ($this->collScheduleSubscriptionUsers === null) {
			$this->initScheduleSubscriptionUsers();
		}
		if (!$this->collScheduleSubscriptionUsers->contains($l)) { // only add it if the **same** object is not already associated
			$this->collScheduleSubscriptionUsers[]= $l;
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related ScheduleSubscriptionUsers from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ScheduleSubscriptionUser[] List of ScheduleSubscriptionUser objects
	 */
	public function getScheduleSubscriptionUsersJoinScheduleSubscription($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ScheduleSubscriptionUserQuery::create(null, $criteria);
		$query->joinWith('ScheduleSubscription', $join_behavior);

		return $this->getScheduleSubscriptionUsers($query, $con);
	}

	/**
	 * Clears out the collUserGroups collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUserGroups()
	 */
	public function clearUserGroups()
	{
		$this->collUserGroups = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUserGroups collection.
	 *
	 * By default this just sets the collUserGroups collection to an empty array (like clearcollUserGroups());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUserGroups($overrideExisting = true)
	{
		if (null !== $this->collUserGroups && !$overrideExisting) {
			return;
		}
		$this->collUserGroups = new PropelObjectCollection();
		$this->collUserGroups->setModel('UserGroup');
	}

	/**
	 * Gets an array of UserGroup objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UserGroup[] List of UserGroup objects
	 * @throws     PropelException
	 */
	public function getUserGroups($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserGroups) {
				// return empty collection
				$this->initUserGroups();
			} else {
				$collUserGroups = UserGroupQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collUserGroups;
				}
				$this->collUserGroups = $collUserGroups;
			}
		}
		return $this->collUserGroups;
	}

	/**
	 * Returns the number of related UserGroup objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UserGroup objects.
	 * @throws     PropelException
	 */
	public function countUserGroups(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUserGroups || null !== $criteria) {
			if ($this->isNew() && null === $this->collUserGroups) {
				return 0;
			} else {
				$query = UserGroupQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collUserGroups);
		}
	}

	/**
	 * Method called to associate a UserGroup object to this object
	 * through the UserGroup foreign key attribute.
	 *
	 * @param      UserGroup $l UserGroup
	 * @return     void
	 * @throws     PropelException
	 */
	public function addUserGroup(UserGroup $l)
	{
		if ($this->collUserGroups === null) {
			$this->initUserGroups();
		}
		if (!$this->collUserGroups->contains($l)) { // only add it if the **same** object is not already associated
			$this->collUserGroups[]= $l;
			$l->setUser($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this User is new, it will return
	 * an empty collection; or if this User has previously
	 * been saved, it will retrieve related UserGroups from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in User.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UserGroup[] List of UserGroup objects
	 */
	public function getUserGroupsJoinGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UserGroupQuery::create(null, $criteria);
		$query->joinWith('Group', $join_behavior);

		return $this->getUserGroups($query, $con);
	}

	/**
	 * Clears out the collAlertSubscriptions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlertSubscriptions()
	 */
	public function clearAlertSubscriptions()
	{
		$this->collAlertSubscriptions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlertSubscriptions collection.
	 *
	 * By default this just sets the collAlertSubscriptions collection to an empty collection (like clearAlertSubscriptions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAlertSubscriptions()
	{
		$this->collAlertSubscriptions = new PropelObjectCollection();
		$this->collAlertSubscriptions->setModel('AlertSubscription');
	}

	/**
	 * Gets a collection of AlertSubscription objects related by a many-to-many relationship
	 * to the current object by way of the common_alertSubscriptionUser cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array AlertSubscription[] List of AlertSubscription objects
	 */
	public function getAlertSubscriptions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlertSubscriptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlertSubscriptions) {
				// return empty collection
				$this->initAlertSubscriptions();
			} else {
				$collAlertSubscriptions = AlertSubscriptionQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlertSubscriptions;
				}
				$this->collAlertSubscriptions = $collAlertSubscriptions;
			}
		}
		return $this->collAlertSubscriptions;
	}

	/**
	 * Gets the number of AlertSubscription objects related by a many-to-many relationship
	 * to the current object by way of the common_alertSubscriptionUser cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related AlertSubscription objects
	 */
	public function countAlertSubscriptions($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlertSubscriptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlertSubscriptions) {
				return 0;
			} else {
				$query = AlertSubscriptionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collAlertSubscriptions);
		}
	}

	/**
	 * Associate a AlertSubscription object to this object
	 * through the common_alertSubscriptionUser cross reference table.
	 *
	 * @param      AlertSubscription $alertSubscription The AlertSubscriptionUser object to relate
	 * @return     void
	 */
	public function addAlertSubscription($alertSubscription)
	{
		if ($this->collAlertSubscriptions === null) {
			$this->initAlertSubscriptions();
		}
		if (!$this->collAlertSubscriptions->contains($alertSubscription)) { // only add it if the **same** object is not already associated
			$alertSubscriptionUser = new AlertSubscriptionUser();
			$alertSubscriptionUser->setAlertSubscription($alertSubscription);
			$this->addAlertSubscriptionUser($alertSubscriptionUser);

			$this->collAlertSubscriptions[]= $alertSubscription;
		}
	}

	/**
	 * Clears out the collScheduleSubscriptions collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addScheduleSubscriptions()
	 */
	public function clearScheduleSubscriptions()
	{
		$this->collScheduleSubscriptions = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collScheduleSubscriptions collection.
	 *
	 * By default this just sets the collScheduleSubscriptions collection to an empty collection (like clearScheduleSubscriptions());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initScheduleSubscriptions()
	{
		$this->collScheduleSubscriptions = new PropelObjectCollection();
		$this->collScheduleSubscriptions->setModel('ScheduleSubscription');
	}

	/**
	 * Gets a collection of ScheduleSubscription objects related by a many-to-many relationship
	 * to the current object by way of the common_scheduleSubscriptionUser cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array ScheduleSubscription[] List of ScheduleSubscription objects
	 */
	public function getScheduleSubscriptions($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collScheduleSubscriptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collScheduleSubscriptions) {
				// return empty collection
				$this->initScheduleSubscriptions();
			} else {
				$collScheduleSubscriptions = ScheduleSubscriptionQuery::create(null, $criteria)
					->filterByUser($this)
					->find($con);
				if (null !== $criteria) {
					return $collScheduleSubscriptions;
				}
				$this->collScheduleSubscriptions = $collScheduleSubscriptions;
			}
		}
		return $this->collScheduleSubscriptions;
	}

	/**
	 * Gets the number of ScheduleSubscription objects related by a many-to-many relationship
	 * to the current object by way of the common_scheduleSubscriptionUser cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related ScheduleSubscription objects
	 */
	public function countScheduleSubscriptions($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collScheduleSubscriptions || null !== $criteria) {
			if ($this->isNew() && null === $this->collScheduleSubscriptions) {
				return 0;
			} else {
				$query = ScheduleSubscriptionQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collScheduleSubscriptions);
		}
	}

	/**
	 * Associate a ScheduleSubscription object to this object
	 * through the common_scheduleSubscriptionUser cross reference table.
	 *
	 * @param      ScheduleSubscription $scheduleSubscription The ScheduleSubscriptionUser object to relate
	 * @return     void
	 */
	public function addScheduleSubscription($scheduleSubscription)
	{
		if ($this->collScheduleSubscriptions === null) {
			$this->initScheduleSubscriptions();
		}
		if (!$this->collScheduleSubscriptions->contains($scheduleSubscription)) { // only add it if the **same** object is not already associated
			$scheduleSubscriptionUser = new ScheduleSubscriptionUser();
			$scheduleSubscriptionUser->setScheduleSubscription($scheduleSubscription);
			$this->addScheduleSubscriptionUser($scheduleSubscriptionUser);

			$this->collScheduleSubscriptions[]= $scheduleSubscription;
		}
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
	 * to the current object by way of the users_userGroup cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this User is new, it will return
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
					->filterByUser($this)
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
	 * to the current object by way of the users_userGroup cross-reference table.
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
					->filterByUser($this)
					->count($con);
			}
		} else {
			return count($this->collGroups);
		}
	}

	/**
	 * Associate a Group object to this object
	 * through the users_userGroup cross reference table.
	 *
	 * @param      Group $group The UserGroup object to relate
	 * @return     void
	 */
	public function addGroup($group)
	{
		if ($this->collGroups === null) {
			$this->initGroups();
		}
		if (!$this->collGroups->contains($group)) { // only add it if the **same** object is not already associated
			$userGroup = new UserGroup();
			$userGroup->setGroup($group);
			$this->addUserGroup($userGroup);

			$this->collGroups[]= $group;
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->username = null;
		$this->password = null;
		$this->passwordupdated = null;
		$this->active = null;
		$this->levelid = null;
		$this->lastlogin = null;
		$this->timezone = null;
		$this->recoveryhash = null;
		$this->recoveryhashcreatedon = null;
		$this->name = null;
		$this->surname = null;
		$this->mailaddress = null;
		$this->mailaddressalt = null;
		$this->deleted_at = null;
		$this->created_at = null;
		$this->updated_at = null;
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
			if ($this->collActionLogs) {
				foreach ($this->collActionLogs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlertSubscriptionUsers) {
				foreach ($this->collAlertSubscriptionUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collScheduleSubscriptionUsers) {
				foreach ($this->collScheduleSubscriptionUsers as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUserGroups) {
				foreach ($this->collUserGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAlertSubscriptions) {
				foreach ($this->collAlertSubscriptions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collScheduleSubscriptions) {
				foreach ($this->collScheduleSubscriptions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collGroups) {
				foreach ($this->collGroups as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collActionLogs instanceof PropelCollection) {
			$this->collActionLogs->clearIterator();
		}
		$this->collActionLogs = null;
		if ($this->collAlertSubscriptionUsers instanceof PropelCollection) {
			$this->collAlertSubscriptionUsers->clearIterator();
		}
		$this->collAlertSubscriptionUsers = null;
		if ($this->collScheduleSubscriptionUsers instanceof PropelCollection) {
			$this->collScheduleSubscriptionUsers->clearIterator();
		}
		$this->collScheduleSubscriptionUsers = null;
		if ($this->collUserGroups instanceof PropelCollection) {
			$this->collUserGroups->clearIterator();
		}
		$this->collUserGroups = null;
		if ($this->collAlertSubscriptions instanceof PropelCollection) {
			$this->collAlertSubscriptions->clearIterator();
		}
		$this->collAlertSubscriptions = null;
		if ($this->collScheduleSubscriptions instanceof PropelCollection) {
			$this->collScheduleSubscriptions->clearIterator();
		}
		$this->collScheduleSubscriptions = null;
		if ($this->collGroups instanceof PropelCollection) {
			$this->collGroups->clearIterator();
		}
		$this->collGroups = null;
		$this->aLevel = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UserPeer::DEFAULT_STRING_FORMAT);
	}

	// soft_delete behavior
	
	/**
	 * Bypass the soft_delete behavior and force a hard delete of the current object
	 */
	public function forceDelete(PropelPDO $con = null)
	{
		UserPeer::disableSoftDelete();
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

	// timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     User The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = UserPeer::UPDATED_AT;
		return $this;
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

} // BaseUser
