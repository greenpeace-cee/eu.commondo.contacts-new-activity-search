<?php

require_once 'contacts_new_activity_search.civix.php';

use CRM_ContactsNewActivitySearch_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function contacts_new_activity_search_civicrm_config(&$config)
{
    _contacts_new_activity_search_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function contacts_new_activity_search_civicrm_xmlMenu(&$files)
{
    _contacts_new_activity_search_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function contacts_new_activity_search_civicrm_install()
{
    _contacts_new_activity_search_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function contacts_new_activity_search_civicrm_postInstall()
{
    _contacts_new_activity_search_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function contacts_new_activity_search_civicrm_uninstall()
{
    _contacts_new_activity_search_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function contacts_new_activity_search_civicrm_enable()
{
    _contacts_new_activity_search_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function contacts_new_activity_search_civicrm_disable()
{
    _contacts_new_activity_search_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function contacts_new_activity_search_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL)
{
    return _contacts_new_activity_search_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function contacts_new_activity_search_civicrm_managed(&$entities)
{
    _contacts_new_activity_search_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function contacts_new_activity_search_civicrm_caseTypes(&$caseTypes)
{
    _contacts_new_activity_search_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function contacts_new_activity_search_civicrm_angularModules(&$angularModules)
{
    _contacts_new_activity_search_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function contacts_new_activity_search_civicrm_alterSettingsFolders(&$metaDataFolders = NULL)
{
    _contacts_new_activity_search_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
 * function contacts_new_activity_search_civicrm_preProcess($formName, &$form) {
 *
 * } // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
 * function contacts_new_activity_search_civicrm_navigationMenu(&$menu) {
 * _contacts_new_activity_search_civix_insert_navigation_menu($menu, NULL, array(
 * 'label' => E::ts('The Page'),
 * 'name' => 'the_page',
 * 'url' => 'civicrm/the-page',
 * 'permission' => 'access CiviReport,access CiviContribute',
 * 'operator' => 'OR',
 * 'separator' => 0,
 * ));
 * _contacts_new_activity_search_civix_navigationMenu($menu);
 * } // */


function contacts_new_activity_search_civicrm_buildForm($formName, &$form)
{
  foreach ($form->_elements as $element) {
    if (isset($element->_attributes['data-api-entity']) && $element->_attributes['data-api-entity'] == 'contact') {
      $element->_attributes['data-api-entity'] = 'contact2';
    }
  }
}