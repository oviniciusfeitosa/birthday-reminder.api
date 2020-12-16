# Roadmap

## Authentication Test

- Create a `.env.testing` file

    ```shell
    cp .env .env.testing
    ```

  > This file will be used instead of the `.env` file when running PHPUnit tests or executing Artisan commands with the
  > `--env=testing` option.

- Creating a feature test

    ```sh
    sail artisan make:test UserTest
    ```

- Execute your first test

    ```sh
    sail artisan test
    ```
