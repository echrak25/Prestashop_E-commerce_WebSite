<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder14eb4 = null;
    private $initializercb336 = null;
    private static $publicProperties03464 = [
        
    ];
    public function getConnection()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getConnection', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getMetadataFactory', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getExpressionBuilder', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'beginTransaction', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->beginTransaction();
    }
    public function getCache()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getCache', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getCache();
    }
    public function transactional($func)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'transactional', array('func' => $func), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'wrapInTransaction', array('func' => $func), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'commit', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->commit();
    }
    public function rollback()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'rollback', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getClassMetadata', array('className' => $className), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'createQuery', array('dql' => $dql), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'createNamedQuery', array('name' => $name), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'createQueryBuilder', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'flush', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'clear', array('entityName' => $entityName), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->clear($entityName);
    }
    public function close()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'close', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->close();
    }
    public function persist($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'persist', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'remove', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'refresh', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'detach', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'merge', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getRepository', array('entityName' => $entityName), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'contains', array('entity' => $entity), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getEventManager', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getConfiguration', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'isOpen', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getUnitOfWork', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getProxyFactory', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'initializeObject', array('obj' => $obj), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'getFilters', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'isFiltersStateClean', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'hasFilters', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return $this->valueHolder14eb4->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializercb336 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder14eb4) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder14eb4 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder14eb4->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__get', ['name' => $name], $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        if (isset(self::$publicProperties03464[$name])) {
            return $this->valueHolder14eb4->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder14eb4;
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
        $targetObject = $this->valueHolder14eb4;
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
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__set', array('name' => $name, 'value' => $value), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder14eb4;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder14eb4;
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
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__isset', array('name' => $name), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder14eb4;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder14eb4;
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
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__unset', array('name' => $name), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder14eb4;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder14eb4;
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
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__clone', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        $this->valueHolder14eb4 = clone $this->valueHolder14eb4;
    }
    public function __sleep()
    {
        $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, '__sleep', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
        return array('valueHolder14eb4');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializercb336 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializercb336;
    }
    public function initializeProxy() : bool
    {
        return $this->initializercb336 && ($this->initializercb336->__invoke($valueHolder14eb4, $this, 'initializeProxy', array(), $this->initializercb336) || 1) && $this->valueHolder14eb4 = $valueHolder14eb4;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder14eb4;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder14eb4;
    }
}
