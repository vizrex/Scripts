# clear-storage.php
This is a PHP commandline/console script to clear auto-generated files of Laravel. It simple clears the following directories

`storage/framework/cache`

`storage/framework/sessions`

`storage/framework/views`

## Usage
Place this file in root directory of your project and execute the following command:

`php clear-storage.php`

This utility excepts a parameter to clear either a specific folder or all of them.

### Parameters

`--all` If you pass this then it will clear all of the three above said directories (cache, sessions, views)

`--cache` Clears `storage/framework/cache` directory only

`--sessions`  Clears `storage/framework/sessions` directory only

`--views` Clears `storage/framework/views` directory only

You can pass a parameter as follow:

`php clear-storage.php --views`

# Vizrex Scripts

We create several utilities and write scripts for our in-house use. We have now begin to gradually make them open source. We warmly welcome your suggestions and contributions to these utilities. 
In order to contact or to know more about us, please visit our website http://vizrex.com

