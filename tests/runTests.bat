@ECHO OFF
REM - csak egy file - phpunit Factories/RenderersFactory.php --coverage-html _coveragereport --bootstrap ../autoload.php
phpunit --coverage-html _coveragereport --bootstrap ../autoload.php