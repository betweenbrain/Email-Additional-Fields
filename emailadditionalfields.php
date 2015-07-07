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
	public function onSubmitContact(&$contact, &$data)
	{
		$data['contact_message'] .= "\n";

		foreach ($data as $field => $value)
		{
			if (!in_array($field, array('contact_name', 'contact_email', 'contact_subject', 'contact_message')))
			{

				if (is_array($value))
				{
					foreach ($value as $label => $input)
					{
						$data['contact_message'] .= "\n" . $this->getLabel($label) . ': ' . $input;
					}
				}

				if (!is_array($value))
				{
					$data['contact_message'] .= "\n" . $this->getLabel($field) . ': ' . $value;
				}

			}
		}

		return $data;
	}

	/**
	 * Checks if the JText translation of a dynamically generated constant has a value
	 *
	 * @param $label
	 *
	 * @return string
	 *
	 * @since 1.1.0
	 */
	private function getLabel($label)
	{
		$constant = 'PLG_CONTACT_EMAILADDITIONALFIELDS_' . strtoupper($label);

		if (JText::_($constant) != $constant)
		{
			return JText::_('PLG_CONTACT_EMAILADDITIONALFIELDS_' . strtoupper($label));
		}

		if (JText::_($constant) == $constant)
		{
			return ucfirst($label);
		}
	}
}
