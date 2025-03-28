<?php

declare(strict_types=1);

return [
    /*
     * ------------------------------------------------------------------------
     * Default Firebase project
     * ------------------------------------------------------------------------
     */

    'default' => env('FIREBASE_PROJECT', 'app'),

    /*
     * ------------------------------------------------------------------------
     * Firebase project configurations
     * ------------------------------------------------------------------------
     */

    'projects' => [
        'app' => [

            /*
             * ------------------------------------------------------------------------
             * Credentials / Service Account
             * ------------------------------------------------------------------------
             *
             * In order to access a Firebase project and its related services using a
             * server SDK, requests must be authenticated. For server-to-server
             * communication this is done with a Service Account.
             *
             * If you don't already have generated a Service Account, you can do so by
             * following the instructions from the official documentation pages at
             *
             * https://firebase.google.com/docs/admin/setup#initialize_the_sdk
             *
             * Once you have downloaded the Service Account JSON file, you can use it
             * to configure the package.
             *
             * If you don't provide credentials, the Firebase Admin SDK will try to
             * auto-discover them
             *
             * - by checking the environment variable FIREBASE_CREDENTIALS
             * - by checking the environment variable GOOGLE_APPLICATION_CREDENTIALS
             * - by trying to find Google's well known file
             * - by checking if the application is running on GCE/GCP
             *
             * If no credentials file can be found, an exception will be thrown the
             * first time you try to access a component of the Firebase Admin SDK.
             *
             */

            'credentials' => env('GOOGLE_APPLICATION_CREDENTIALS', 'storage/app/firebase-auth.json'),

            // 'credentials' => [
            //     'type' => 'service_account',
            //     'project_id' => 'iads-1eb75',
            //     'private_key_id' => '8b3674bd3d2d88c58940e52c24142ccb611d8a7d',
            //     'pr ivate_key' => "-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCpFvFrL13/f702\nqOrU1rFE7HMVMbKxtdzMEIiJ0ntPxmVUsuEx0PQtCNyqYL2PYOIO+DL8L4EKncTm\n7HdCOT8iDpsd9IXjx7I6G0Hy4bzc+CR7VtG/NkzYLSH2mg0/TGuTrXdifb67ZYCQ\np9/4tsKCR+WAY0TcbilBAtlHbk48LuZLPj83/Ih9Ko2gbjOqhCwUomRx16/mrRVj\ntkbtA079SS1SxOFSPtVaEQ1YxC8LAs5xoo4UJrdX17G4s9gDvNCmst0zPkJfrviQ\nK2G/tNOHTq3I9ELZp35yVZmyO5Xcx1eUaBMKSIF6fSqWXJ8IKJ8ezoNNr8/EmsHf\nYZNJ++onAgMBAAECggEAHljBx0ze/+X7HX4/dyd49TfCh8E9outSz0UAXEvsWarv\nsL3R8NDhodt/TwzBuKPYrnsZG22jKTabih5SYQ5JKGGasUubZAAJGqids2uUK8xV\nL9WrGzgxnnKrL8kCK6QZgo2VaZXLz3IuGsgmSEr0qdEhfWNTjoQu3z4VpN5FKEOv\nZVvcTwcPo4GQw4epCRLbUkRCszGtU8MzOpI5KHZ43dj2nTjCSqnsQtNGzXUYGngD\nq2nngm06LbV6NM1+EMUeLv3t2IR/X0b98fnL+S7xUVV3CHaGaX66Bvmp4g4aJVng\neaR0DKGTMYIqRHX8Odd85JYdK1jA5pCJZ0VktHk+IQKBgQDo4LRUE255rvjCiYT4\n9S0XI+TxDSdWmu9jeensqpjZ1HGtkprF/ZSstq+9e4Nfi7vmUEcJjppZQWHeAVC2\nF2tqasWgydD0l7VHbpQHtzITe0/eiS1kPlaeONMSFcaxpl9mr4df8SiaTEgLDGdY\nplGKDJOTWLQ8+sKmVJdJ4tBP3wKBgQC54N6XdXKISQ2zeO5wzNlFftTDBYYoKaVA\nyKPrSVhdH79quLwHqu++PAzI578De0UILkuQyjj+kADoQaUmDYFvjBAg+mr/x7/x\ny7ZNeas44VGjojUy96ltI0XUiOl14DdSXkNCHTmApMwXFJh/XeKaDcSr7mlOoqLI\ntW6oFWwOuQKBgQDHwbftRp3FEyme9YdyZhy/dLK1cqsDxvMBSVo3AD8M2waH9PF+\nU/5sCGjHCGOwWZRcAxBsSj5rwYHJhSdOithA+EV9np/2rwt4somX9LSnsWbZZKHj\nEvYJ0oR7RuKhEC1VT8u3qI1DjZtens0nZcMbv533DmfMxuyg8H61ijFV0QKBgQCA\nqy6qfXx45sj7MX0szECioLc7ALnrV1izTbBakP0ACZgBkjtmu2cVso/PCszo5g3V\nKebZJYLqhFh8beSaQMMWqkgH7BDhWi5+fFuHqe9igmZ29TQKQfIgQEh4ZQXmuPzS\nobnBLGW/rVQxreoaUK0poto/gduXuXEhqqYc6CdS0QKBgG+KnGBUtSKiZNLs3pes\n9jByXlo/CtibX5hYhN/QWqyjZas6pBv7+tQbG8fBmI0COYzdN6motzN3gfe3av2P\nh1g5j58y6mO97Ot88wrzVTMzAFyIDXyqf+LE/gpBqUKhwh3KqdUKOwDRFjeRo82g\np7VaXo24bTEmiXId/OH2xf55\n-----END PRIVATE KEY-----\n",
            //     'client_email' => "firebase-adminsdk-uq3ha@iads-1eb75.iam.gserviceaccount.com",
            //     'client_id' => '111224422901447599573',
            //     'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
            //     'token_uri' => 'https://oauth2.googleapis.com/token',
            //     'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
            //     'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-uq3ha%40iads-1eb75.iam.gserviceaccount.com',
            //     'universe_domain' => 'googleapis.com',
            // ],


            /*
             * ------------------------------------------------------------------------
             * Firebase Auth Component
             * ------------------------------------------------------------------------
             */

            'auth' => [
                'tenant_id' => env('FIREBASE_AUTH_TENANT_ID'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firestore Component
             * ------------------------------------------------------------------------
             */

            'firestore' => [

                /*
                 * If you want to access a Firestore database other than the default database,
                 * enter its name here.
                 *
                 * By default, the Firestore client will connect to the `(default)` database.
                 *
                 * https://firebase.google.com/docs/firestore/manage-databases
                 */

                // 'database' => env('FIREBASE_FIRESTORE_DATABASE'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Realtime Database
             * ------------------------------------------------------------------------
             */

            'database' => [

                /*
                 * In most of the cases the project ID defined in the credentials file
                 * determines the URL of your project's Realtime Database. If the
                 * connection to the Realtime Database fails, you can override
                 * its URL with the value you see at
                 *
                 * https://console.firebase.google.com/u/1/project/_/database
                 *
                 * Please make sure that you use a full URL like, for example,
                 * https://my-project-id.firebaseio.com
                 */

                'url' => env('FIREBASE_DATABASE_URL'),

                /*
                 * As a best practice, a service should have access to only the resources it needs.
                 * To get more fine-grained control over the resources a Firebase app instance can access,
                 * use a unique identifier in your Security Rules to represent your service.
                 *
                 * https://firebase.google.com/docs/database/admin/start#authenticate-with-limited-privileges
                 */

                // 'auth_variable_override' => [
                //     'uid' => 'my-service-worker'
                // ],

            ],

            'dynamic_links' => [

                /*
                 * Dynamic links can be built with any URL prefix registered on
                 *
                 * https://console.firebase.google.com/u/1/project/_/durablelinks/links/
                 *
                 * You can define one of those domains as the default for new Dynamic
                 * Links created within your project.
                 *
                 * The value must be a valid domain, for example,
                 * https://example.page.link
                 */

                'default_domain' => env('FIREBASE_DYNAMIC_LINKS_DEFAULT_DOMAIN'),
            ],

            /*
             * ------------------------------------------------------------------------
             * Firebase Cloud Storage
             * ------------------------------------------------------------------------
             */

            'storage' => [

                /*
                 * Your project's default storage bucket usually uses the project ID
                 * as its name. If you have multiple storage buckets and want to
                 * use another one as the default for your application, you can
                 * override it here.
                 */

                'default_bucket' => env('FIREBASE_STORAGE_DEFAULT_BUCKET'),

            ],

            /*
             * ------------------------------------------------------------------------
             * Caching
             * ------------------------------------------------------------------------
             *
             * The Firebase Admin SDK can cache some data returned from the Firebase
             * API, for example Google's public keys used to verify ID tokens.
             *
             */

            'cache_store' => env('FIREBASE_CACHE_STORE', 'file'),

            /*
             * ------------------------------------------------------------------------
             * Logging
             * ------------------------------------------------------------------------
             *
             * Enable logging of HTTP interaction for insights and/or debugging.
             *
             * Log channels are defined in config/logging.php
             *
             * Successful HTTP messages are logged with the log level 'info'.
             * Failed HTTP messages are logged with the log level 'notice'.
             *
             * Note: Using the same channel for simple and debug logs will result in
             * two entries per request and response.
             */

            'logging' => [
                'http_log_channel' => env('FIREBASE_HTTP_LOG_CHANNEL'),
                'http_debug_log_channel' => env('FIREBASE_HTTP_DEBUG_LOG_CHANNEL'),
            ],

            /*
             * ------------------------------------------------------------------------
             * HTTP Client Options
             * ------------------------------------------------------------------------
             *
             * Behavior of the HTTP Client performing the API requests
             */

            'http_client_options' => [

                /*
                 * Use a proxy that all API requests should be passed through.
                 * (default: none)
                 */

                'proxy' => env('FIREBASE_HTTP_CLIENT_PROXY'),

                /*
                 * Set the maximum amount of seconds (float) that can pass before
                 * a request is considered timed out
                 *
                 * The default time out can be reviewed at
                 * https://github.com/kreait/firebase-php/blob/6.x/src/Firebase/Http/HttpClientOptions.php
                 */

                'timeout' => env('FIREBASE_HTTP_CLIENT_TIMEOUT'),

                'guzzle_middlewares' => [],
            ],
        ],
    ],
];
