# Birthday Reminder - API

## Technologies

- PHP 8
    - Laravel 8
      > Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:
        - Sail
      > Laravel Sail is a light-weight command-line interface for interacting with Laravel's default Docker development environment. Sail provides a great starting point for building a Laravel application using PHP, MySQL, and Redis without requiring prior Docker experience.
    - PHPUnit
- MySQL
- Redis
- Docker
- [Mailhog](https://github.com/mailhog/MailHog)
  > MailHog is an email testing tool for developers:
  > - Configure your application to use MailHog for SMTP delivery View messages in the web UI, or retrieve them with the JSON
  > - API Optionally release messages to real SMTP servers for delivery

## [Roadmap](./documentation/Roadmap.md)

## Todo

- [x] JWT
    - [x] Authorization
    - [x] Authentication
- [x] User
    - [x] Login
    - [x] Register
    - [x] Profile
    - [x] Refresh Token
    - [x] Loggout
- [ ] My birthday agenda
    - [ ] Contact
        - [ ] Create
            - Thumb image (optional)
            - Name
            - Birthday
            - Annotation (optional)
        - [ ] List
            - Thumb image
            - Name (ordered)
            - Birthday (ordered)
        - [ ] Update
            - Thumb image
              > Delete and send another
            - Name
            - Birthday
            - Annotation (optional)
        - [ ] Delete
            - Contact ID
- [ ] Tests
    - [ ] Unit test
        - [ ] User
            - [ ] Login
            - [ ] Register
            - [ ] Profile
            - [ ] Refresh Token
            - [ ] Loggout

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

