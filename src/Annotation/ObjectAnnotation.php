<?php


namespace EasySwoole\HttpAnnotation\Annotation;

use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroup;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroupAuth;
use EasySwoole\HttpAnnotation\AnnotationTag\ApiGroupDescription;

class ObjectAnnotation extends AnnotationBean
{
    /** @var ApiGroup|null */
    protected $apiGroup;
    /** @var ApiGroupDescription|null */
    protected $apiGroupDescription;

    protected $groupAuth = [];

    protected $__methods = [];

    protected $__properties = [];

    function addGroupAuthTag(ApiGroupAuth $apiGroupAuth):ObjectAnnotation
    {
        $this->groupAuth[$apiGroupAuth->name] = $apiGroupAuth;
        return $this;
    }

    function getGroupAuthTag(?string $paramName = null)
    {
        if($paramName && isset($this->groupAuth[$paramName])){
            return $this->groupAuth[$paramName];
        }else{
            return $this->groupAuth;
        }
    }

    function addMethod(MethodAnnotation $method)
    {
        $this->__methods[$method->getName()] = $method;
        return $this;
    }

    function addProperty(PropertyAnnotation $annotation)
    {
        $this->__properties[$annotation->getName()] = $annotation;
        return $this;
    }

    function getProperty(?string $name = null)
    {
        if($name && isset($this->__properties[$name])){
            return $this->__properties[$name];
        }else{
            return $this->__properties;
        }
    }

    function getMethod(?string $name = null)
    {
        if($name && isset($this->__methods[$name])){
            return $this->__methods[$name];
        }else{
            return $this->__methods;
        }
    }

    /**
     * @return ApiGroup|null
     */
    public function getApiGroupTag(): ?ApiGroup
    {
        return $this->apiGroup;
    }

    /**
     * @param ApiGroup|null $apiGroup
     */
    public function setApiGroupTag(?ApiGroup $apiGroup): void
    {
        $this->apiGroup = $apiGroup;
    }

    /**
     * @return ApiGroupDescription|null
     */
    public function getApiGroupDescriptionTag(): ?ApiGroupDescription
    {
        return $this->apiGroupDescription;
    }

    /**
     * @param ApiGroupDescription|null $apiGroupDescription
     */
    public function setApiGroupDescriptionTag(?ApiGroupDescription $apiGroupDescription): void
    {
        $this->apiGroupDescription = $apiGroupDescription;
    }
}

