<?php

use CRM_ContactsNewActivitySearch_ExtensionUtil as E;

/**
 * Contact2.Getlist API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_contact2_Getlist_spec(&$spec)
{

}

/**
 * Contact2.Getlist API
 * Extended Contact.getlist API call.
 * This getlist API call can search by Contact ID (if input is numeric) or by sort name and email (if input is string).
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_contact2_Getlist($params)
{

    if (isset($params['entity'])) {
        $entity = _civicrm_api_get_entity_name_from_camel($params['entity']);
    } else {
        $entity = 'contact';
    }

    if (isset($params['input'])) {
        $input = $params['input'];
    } else {
        $input = '';
    }

    $returnValues = array();
    $output = array();

    // Check input to find out whether to search by ID OR sort name and email
    if (is_numeric($input)) {

        $result = civicrm_api3('Contact', 'get', array(
            'sequential' => 1,
            'return' => "id,sort_name,email,contact_type",
            'id' => $input,
        ));

    } else {

        // Search input string by contact sort name
        $result = civicrm_api3('Contact', 'get', array(
            'sequential' => 1,
            'return' => "id,sort_name,email,contact_type",
            'options' => [
              'sort' => 'sort_name',
            ],
            'sort_name' => $input,
        ));

        // Search input string by contact email
        $result2 = civicrm_api3('Contact', 'get', array(
            'sequential' => 1,
            'return' => "id,sort_name,email,contact_type",
            'options' => [
              'sort' => 'sort_name',
            ],
            'email' => $input,
        ));

        // Sum up both result sets
        foreach ($result2['values'] as $contact) {

            if (!idExistsInResult($result, $contact['id'])) {
                $result['values'][] = $contact;
            }
        }
    }

    // Structure data for output.
    foreach ($result['values'] as $contact) {
        $returnValues[] = array('id' => $contact['id'], 'label' => $contact['sort_name'], 'description' => array('Contact ID: ' . $contact['id'], $contact['email']), 'icon_class' => $contact['contact_type']);
    }


    if (isset($params['page_num'])) {
        $output['page_num'] = $params['page_num'];
    } else {
        $output['page_num'] = 1;
    }
    //$output['more_results'] = TRUE;

    // ALTERNATIVE: $returnValues = array(); // OK, success
    // ALTERNATIVE: $returnValues = array("Some value"); // OK, return a single value

    // Spec: civicrm_api3_create_success($values = 1, $params = array(), $entity = NULL, $action = NULL)
    return civicrm_api3_create_success($returnValues, $params, $entity, 'getlist', CRM_Core_DAO::$_nullObject, $output);
}


/*
 * Check whether contact ID exists in set of results returned by API
 */
function idExistsInResult($result, $id)
{

    $idList = array();

    if (!empty($result['values'])) {

        foreach ($result['values'] as $contact) {
            $idList[] = $contact['id'];
        }

        if (in_array($id, $idList)) {
            $return = TRUE;
        } else {
            $return = FALSE;
        }

    } else {
        $return = FALSE;
    }

    return $return;
}