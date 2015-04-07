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
 * Leverages the mystical onSubmitContact Joomla! plugin event to email additional field data added by plugins.
 *
 * @package    Joomla.Plugin
 * @subpackage Contact
 * @version    1.0
 */
class plgContactEmailadditionalfields extends JPlugin
{
	/**
	 * @param       $contact
	 * @param array $data The associated data for the form.
	 *
	 * @return boolean
	 *
	 * @since  1.0
	 */
	function onSubmitContact(&$contact, &$data)
	{
		foreach ($data as $field => $value)
		{
			if (!in_array($field, array('contact_name', 'contact_email', 'contact_subject', 'contact_message')))
			{
				$data['contact_message'] .= is_array($value) ?
					"\n" . implode("\n", array_map(function ($v, $k)
					{
						return ucfirst($k) . ': ' . $v;
					}, $value, array_keys($value))) :
					"\n" . ucfirst($field) . ': ' . $value;
			}
		}

		return $data;
	}
}
