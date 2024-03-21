<?php
declare(strict_types=1);

namespace tests\src;

/**
 * test utils
 */
trait TestUtils
{
    /**
     * execute non-accessible method
     *
     * @param $obj                    - obj
     * @param $methodName             - method name
     * @param ...$parametersForMethod - parameters for method
     *
     * @return mixed
     */
    private function executeNonAccessibleMethod(object $obj, string $methodName, ...$parametersForMethod)
    {
        $ref = (new \ReflectionClass(get_class($obj)))->getMethod($methodName);
        $ref->setAccessible(true);
        return $ref->invoke($obj, ...$parametersForMethod);
    }

    /**
     * get non accessible property
     *
     * @param $obj          - obj
     * @param $propertyName - property name
     *
     * @return mixed
     */
    private function getNonAccessibleProperty(object $obj, string $propertyName)
    {
        $ref = (new \ReflectionObject($obj));
        $ref2 = null;
        do
        {
            try
            {
                $ref2 = $ref->getProperty($propertyName);
            }
            catch(\ReflectionException $e)
            {
                $ref = $ref->getParentClass();
                if ($ref === false)
                {
                    throw new \RuntimeException('No such property: "'.$propertyName.'" in "'.get_class($obj).'"');
                }
            }
        }while($ref2 === null);
        $ref2->setAccessible(true);
        //if ($ref->isInitialized(get_class($obj)))
        return $ref2->getValue($obj);
    }
}