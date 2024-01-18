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

namespace Google\Service\SASPortalTesting;

class SasPortalMigrateOrganizationResponse extends \Google\Collection
{
  protected $collection_key = 'deploymentAssociation';
  /**
   * @var SasPortalDeploymentAssociation[]
   */
  public $deploymentAssociation;
  protected $deploymentAssociationType = SasPortalDeploymentAssociation::class;
  protected $deploymentAssociationDataType = 'array';

  /**
   * @param SasPortalDeploymentAssociation[]
   */
  public function setDeploymentAssociation($deploymentAssociation)
  {
    $this->deploymentAssociation = $deploymentAssociation;
  }
  /**
   * @return SasPortalDeploymentAssociation[]
   */
  public function getDeploymentAssociation()
  {
    return $this->deploymentAssociation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalMigrateOrganizationResponse::class, 'Google_Service_SASPortalTesting_SasPortalMigrateOrganizationResponse');
