# Turkish ID Number (TCKN) Profile Field

Custom user profile field type for Moodle that validates the Turkish Identification Number (TCKN) using official checksum rules.

## Requirements

- Moodle 4.4 or later
- PHP 8.1 or later

## Features

- 11-digit numeric validation
- Cannot start with 0
- Validates 10th and 11th checksum digits
- Works on:
  - User profile edit
  - Signup form
  - CSV user upload

## Installation

1. Copy the plugin to:
   `user/profile/field/tckn`
2. Visit:
   Site administration → Notifications
3. Create the field:
   Site administration → Users → Accounts → User profile fields

Select **Turkish ID Number (TCKN)** as the field type.

Recommended settings:

- Short name: `tckn`
- Visibility: Not visible to other users
- Lock field if users should not edit it

## Privacy

This plugin does not create its own database tables.
Field values are stored in Moodle core user profile tables.

## License

GNU GPL v3 or later.
