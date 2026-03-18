#!/usr/bin/env php
<?php

declare(strict_types=1);

$basePath = require __DIR__.'/../bin/bootstrap.php';

fwrite(STDOUT, $basePath);
