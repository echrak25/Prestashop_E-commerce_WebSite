<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder4844b = null;
    private $initializerb7b6d = null;
    private static $publicProperties2631c = [
        
    ];
    public function getConnection()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getConnection', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getMetadataFactory', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getExpressionBuilder', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'beginTransaction', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->beginTransaction();
    }
    public function getCache()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getCache', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getCache();
    }
    public function transactional($func)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'transactional', array('func' => $func), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'wrapInTransaction', array('func' => $func), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'commit', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->commit();
    }
    public function rollback()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'rollback', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getClassMetadata', array('className' => $className), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'createQuery', array('dql' => $dql), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'createNamedQuery', array('name' => $name), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'createQueryBuilder', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'flush', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'clear', array('entityName' => $entityName), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->clear($entityName);
    }
    public function close()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'close', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->close();
    }
    public function persist($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'persist', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'remove', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'refresh', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'detach', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'merge', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getRepository', array('entityName' => $entityName), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'contains', array('entity' => $entity), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getEventManager', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getConfiguration', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'isOpen', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getUnitOfWork', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getProxyFactory', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'initializeObject', array('obj' => $obj), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'getFilters', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'isFiltersStateClean', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'hasFilters', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return $this->valueHolder4844b->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializerb7b6d = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder4844b) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder4844b = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder4844b->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__get', ['name' => $name], $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        if (isset(self::$publicProperties2631c[$name])) {
            return $this->valueHolder4844b->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4844b;
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
        $targetObject = $this->valueHolder4844b;
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
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4844b;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder4844b;
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
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__isset', array('name' => $name), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4844b;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder4844b;
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
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__unset', array('name' => $name), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder4844b;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder4844b;
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
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__clone', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        $this->valueHolder4844b = clone $this->valueHolder4844b;
    }
    public function __sleep()
    {
        $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, '__sleep', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
        return array('valueHolder4844b');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerb7b6d = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerb7b6d;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerb7b6d && ($this->initializerb7b6d->__invoke($valueHolder4844b, $this, 'initializeProxy', array(), $this->initializerb7b6d) || 1) && $this->valueHolder4844b = $valueHolder4844b;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder4844b;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder4844b;
    }
}
