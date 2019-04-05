## Installation

You can install the package via composer:

``` bash
composer require rjvim/notifier
```

The package will automatically register itself.

You can publish the migration with:
```bash
php artisan vendor:publish --provider="Betalectic\Notifier\NotifierServiceProvider" --tag="migrations"
```

```bash
php artisan migrate
```

You can optionally publish the config file with:
```bash
php artisan vendor:publish --provider="Betalectic\Notifier\NotifierServiceProvider" --tag="config"
```

## Documentation

First Initialize the Notifier

Notifier::addJob($job_identifier, $description);

params are the job and it's description.

Ex: addJob('welcome_user', 'welcome User')


same like:

Notifier::removeJob($job_identifier, $description);

Notifier::disableJob($job_identifier, $description);

Notifier::enableJob($job_identifier, $description);


add Template: addTemplate($job_identifier,$type,$content_data);

the above 3 params are job, job type, and template data like Hi * * user_name* * welcome to our site, you are registered with this mobile * * user_mobile* * .

same like:

Notifier::removeTemplate($job_identifier,$type);

Notifier::disableTemplate('welcome_user', 'email');

Notifier::enableTemplate('welcome_user', 'email');

Fill template content :

Notifier::fillContent($job_identifier,$type,$placeholders);

Refer to this Example:

Notifier::fillContent('welcome_user','email', ["user_name" => "Rajiv","user_mobile" => "8094545444"]);

And also there are:

Notifier::getJobTemplates($job_identifier);

Notifier::getAllTemplates();

Notifier::getAllJobs();


Then you can dispatch your job by taking needed content.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
