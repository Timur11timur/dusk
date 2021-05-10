config
    .env.duck.local

Create test
    php artisan dusk:make AuthTest


Execute test
    php artisan dusk tests/Browser/AuthTest.php

if '--headless' do not comment out in DuskTestCase
    will be no displaying
