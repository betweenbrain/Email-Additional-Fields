# Overview #
This plugin does not add any fields to forms. It instead includes in the email all data from fields added to the core contact form when using a custom plugin like that described at http://docs.joomla.org/Adding_custom_fields_to_core_components_using_a_plugin.

Without this plugin, if you add fields to the core contact form, the data submitted in those fields are not included in the email that you receive.

For a working example of a custom contact form plugin, please visit https://github.com/betweenbrain/Custom-Contact-Form-Plugin

## Translatable Language Constant Support for Labels ##
To define language constants, used for the field labels in the email, create a language override that follows the convention `PLG_CONTACT_EMAILADDITIONALFIELDS_[FIELD NAME]` where `[FIELD NAME]` is the uppercase name of the form field. For example, if my form field name is `city`, then the language string is `PLG_CONTACT_EMAILADDITIONALFIELDS_CITY`.
