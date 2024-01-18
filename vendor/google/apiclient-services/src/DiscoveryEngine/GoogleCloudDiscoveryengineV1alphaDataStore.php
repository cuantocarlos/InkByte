<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\DiscoveryEngine;

class GoogleCloudDiscoveryengineV1alphaDataStore extends \Google\Collection
{
  protected $collection_key = 'solutionTypes';
  /**
   * @var string
   */
  public $contentConfig;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $defaultSchemaId;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $industryVertical;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string[]
   */
  public $solutionTypes;

  /**
   * @param string
   */
  public function setContentConfig($contentConfig)
  {
    $this->contentConfig = $contentConfig;
  }
  /**
   * @return string
   */
  public function getContentConfig()
  {
    return $this->contentConfig;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDefaultSchemaId($defaultSchemaId)
  {
    $this->defaultSchemaId = $defaultSchemaId;
  }
  /**
   * @return string
   */
  public function getDefaultSchemaId()
  {
    return $this->defaultSchemaId;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setIndustryVertical($industryVertical)
  {
    $this->industryVertical = $industryVertical;
  }
  /**
   * @return string
   */
  public function getIndustryVertical()
  {
    return $this->industryVertical;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string[]
   */
  public function setSolutionTypes($solutionTypes)
  {
    $this->solutionTypes = $solutionTypes;
  }
  /**
   * @return string[]
   */
  public function getSolutionTypes()
  {
    return $this->solutionTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDiscoveryengineV1alphaDataStore::class, 'Google_Service_DiscoveryEngine_GoogleCloudDiscoveryengineV1alphaDataStore');
