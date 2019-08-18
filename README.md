# Matomo - Dynamic IP Address Updater

Simple script that can update the global exclude IP's of [Matomo](https://matomo.org/) to the resolution of hostnames.

Dynamic DNS hostnames can be specified in the array, along with any static IP's you wish to add. Matomo will then exclude visitors at these addresses from being tracked.

**Any IP addresses added via the UI, will be overwritten by this script.**

## Install

1. Clone the repository to a web server, with access to your database.

```sh
$ git clone <repo_url>
```

2. Change into the repository folder.
```sh
$ cd matomo-dip
```

3. Copy `variables.example.php` to `variables.php`.

```sh
$ cp variables.example.php variables.php
```

4. Update `variables.php` with your database connection, and Hostnames / IP Addresses to exclude from analytics.

```php
$hostnames = array('domain1.dynu.net, domain2.dynu.net');

$ip_addresses = array('172.217.169.46, 151.101.192.81');

$db_host = "localhost";
$db_name = "matomo";
$db_username = "matomo";
$db_password = "somethingsecure";

```

5. Add `engine.php` as a cron job *(recommended)* the following will run once per day, or post as a public page you can manually visit when needed *(not recommended)*.

```sh
0 0 12 1/1 * ? * /usr/bin/php -q /home/user/tools/matomo-dip/engine.php
```
