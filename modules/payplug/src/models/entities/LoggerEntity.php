<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of Payplug SAS
 */

namespace PayPlug\src\models\entities;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PayPlug\src\exceptions\BadParameterException;

class LoggerEntity
{
    /** @var string */
    private $content;

    /** @var string with a specific pattern matching 'yyyy-mm-dd hh:mm:ss' */
    private $date_add;

    /** @var string with a specific pattern matching 'yyyy-mm-dd hh:mm:ss' */
    private $date_upd;

    /** @var array */
    private $definition;

    /** @var string */
    private $id;

    /** @var int */
    private $limit_number;

    /** @var string */
    private $limitDate;

    /** @var string */
    private $process;

    /** @var string */
    private $table;

    /** @var string */
    private $type;

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string with a specific pattern matching 'yyyy-mm-dd hh:mm:ss'
     */
    public function getDateAdd()
    {
        return $this->date_add;
    }

    /**
     * @return string with a specific pattern matching 'yyyy-mm-dd hh:mm:ss'
     */
    public function getDateUpd()
    {
        return $this->date_upd;
    }

    /**
     * @return array
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLimitDate()
    {
        return $this->limitDate;
    }

    /**
     * @return int
     */
    public function getLimitNumber()
    {
        return $this->limit_number;
    }

    /**
     * @return string
     */
    public function getProcess()
    {
        return $this->process;
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        if (!is_string($content)) {
            throw new BadParameterException('Invalid argument, $content must be a string');
        }

        $this->content = $content;

        return $this;
    }

    /**
     * @param $date_add
     *
     * @return $this
     */
    public function setDateAdd($date_add)
    {
        if (!is_string($date_add) || !preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $date_add)) {
            throw new BadParameterException('Invalid argument, $date_add must be a date format \'y-m-d h:m:s\'');
        }

        $this->date_add = $date_add;

        return $this;
    }

    /**
     * @param $date_upd
     *
     * @return $this
     */
    public function setDateUpd($date_upd)
    {
        if (!is_string($date_upd) || !preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $date_upd)) {
            throw new BadParameterException('Invalid argument, $date_upd must be a date format \'y-m-d h:m:s\'');
        }

        $this->date_upd = $date_upd;

        return $this;
    }

    /**
     * @param $definition
     *
     * @return $this
     */
    public function setDefinition($definition)
    {
        if (!is_array($definition)) {
            throw new BadParameterException('Invalid argument, $definition must be an array');
        }

        $this->definition = $definition;

        return $this;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        if (!is_string($id)) {
            throw new BadParameterException('Invalid argument, $id must be an string');
        }

        $this->id = $id;

        return $this;
    }

    /**
     * @param $limitDate
     *
     * @return $this
     */
    public function setLimitDate($limitDate)
    {
        if (!is_string($limitDate)) {
            throw new BadParameterException('Invalid argument, $limit_number must be an integer');
        }

        $this->limitDate = $limitDate;

        return $this;
    }

    /**
     * @param $limit_number
     *
     * @return $this
     */
    public function setLimitNumber($limit_number)
    {
        if (!is_int($limit_number)) {
            throw new BadParameterException('Invalid limit param, $limit_number must be an integer');
        }

        $this->limit_number = $limit_number;

        return $this;
    }

    /**
     * @param $process
     *
     * @return $this
     */
    public function setProcess($process)
    {
        if (!is_string($process)) {
            throw new BadParameterException('Invalid argument, $process must be a string');
        }

        $this->process = $process;

        return $this;
    }

    /**
     * @param $table
     *
     * @return $this
     */
    public function setTable($table)
    {
        if (!is_string($table)) {
            throw new BadParameterException('Invalid argument, $table must be a string');
        }

        $this->table = $table;

        return $this;
    }

    /**
     * @param $type
     *
     * @return $this
     */
    public function setType($type)
    {
        if (!is_string($type)) {
            throw new BadParameterException('Invalid argument, $type must be a string');
        }

        $this->type = $type;

        return $this;
    }
}
