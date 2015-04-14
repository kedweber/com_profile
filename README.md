# com_profile

## Introduction

`com_profiles` is a component that extends the stock `com_users` and 
`com_groups` components. If ACL is based on anything non-standard, 
`com_profiles` assigns users or groups to any other object using a taxonomy.

The profiles component was developed by [Moyo Web Architects](http://moyoweb.nl).

## Requirements

* Joomla 2.5 or 3.X .
* Koowa 0.9 or 1.0 (as yet, Koowa 2 is not supported)
* PHP 5.3.10 or better
* Composer
* Moyo Components
    * com_moyo
    * com_taxonomy

## Installation

### Composer

Installation is done through composer. In your `composer.json` file, you should add the following lines to the repositories
section:

```json
{
    "name": "cta/profile",
    "type": "vcs",
    "url": "https://github.com/cta-int/profile.git"
}
```

The require section should contain the following line:

```json
    "cta/profile": "1.1.*",
```

Afterward, just run `composer update` from the root of your Joomla project.

### jsymlinker

Another option, currently only available for Moyo developers, is by using the jsymlink script from the [Moyo Git
Tools](https://github.com/derjoachim/moyo-git-tools).

## Usage

In the components menu, select `com_profiles` > `users` or `groups` to assign 
taxonomy objects to users or groups. When affected users or group members log 
in, they can only edit content assigned to the linked taxonomy objects.
