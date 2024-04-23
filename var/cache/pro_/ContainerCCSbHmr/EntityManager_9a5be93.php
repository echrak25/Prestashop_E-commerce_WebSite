<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder741d6 = null;
    private $initializer38b91 = null;
    private static $publicPropertiesa2e5c = [
        
    ];
    public function getConnection()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getConnection', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getMetadataFactory', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getExpressionBuilder', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'beginTransaction', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getCache', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getCache();
    }
    public function transactional($func)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'transactional', array('func' => $func), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'wrapInTransaction', array('func' => $func), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'commit', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->commit();
    }
    public function rollback()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'rollback', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getClassMetadata', array('className' => $className), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'createQuery', array('dql' => $dql), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'createNamedQuery', array('name' => $name), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'createQueryBuilder', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'flush', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'clear', array('entityName' => $entityName), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->clear($entityName);
    }
    public function close()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'close', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->close();
    }
    public function persist($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'persist', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'remove', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'refresh', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'detach', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'merge', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getRepository', array('entityName' => $entityName), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'contains', array('entity' => $entity), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getEventManager', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getConfiguration', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'isOpen', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getUnitOfWork', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getProxyFactory', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'initializeObject', array('obj' => $obj), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'getFilters', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'isFiltersStateClean', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'hasFilters', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return $this->valueHolder741d6->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer38b91 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder741d6) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder741d6 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder741d6->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__get', ['name' => $name], $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        if (isset(self::$publicPropertiesa2e5c[$name])) {
            return $this->valueHolder741d6->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder741d6;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder741d6;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder741d6;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder741d6;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__isset', array('name' => $name), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder741d6;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder741d6;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__unset', array('name' => $name), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder741d6;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder741d6;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__clone', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        $this->valueHolder741d6 = clone $this->valueHolder741d6;
    }
    public function __sleep()
    {
        $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, '__sleep', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
        return array('valueHolder741d6');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer38b91 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer38b91;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer38b91 && ($this->initializer38b91->__invoke($valueHolder741d6, $this, 'initializeProxy', array(), $this->initializer38b91) || 1) && $this->valueHolder741d6 = $valueHolder741d6;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder741d6;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder741d6;
    }
}
