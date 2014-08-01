<?php defined('_JEXEC') or die;

/**
 * File       emailadditionalfields.php
 * Created    8/1/14 2:29 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

/**
 * An example custom contact plugin.
 *
 * @package    Joomla.Plugin
 * @subpackage Contact
 * @version    1.6
 */
class plgContactEmailadditionalfields extends JPlugin
{
	/**
	 * @param       $contact
	 * @param array $data The associated data for the form.
	 *
	 * @return boolean
	 * @since    1.6
	 */
	function onSubmitContact($contact, $data)
	{
		foreach ($data as $field => $value)
		{
			if (!in_array($field, array('contact_name', 'contact_email', 'contact_subject', 'contact_message')))
			{
				$data['contact_message'] .= "\n" . ucfirst($field) . ': ' . $value;
			}
		}

		return $data;
	}
}
