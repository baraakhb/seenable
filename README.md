# Seenable

**Seenable** is a Laravel package designed to manage the "seen" status of models within FilamentPHP applications. It's
perfect for tracking whether certain records—like contact messages, orders, or notifications—have been viewed by users.

## Features

- Track "seen" status for any Eloquent model.
- Provides Filament-compatible actions to mark items as read or unread.
- Simple integration with FilamentPHP resources.

## Installation

1. Install the package via Composer:

   ```bash
   composer require baraa-al-khateeb/seenable
   ```

2. Publish and run the migrations:

   ```bash
   php artisan vendor:publish --tag="seenable-migrations"
   php artisan migrate
   ```

## Usage

### Making a Model "Seenable"

To track the "seen" status for a model, use the `Seenable` trait:

```php
use BaraaAlKhateeb\Seen\Traits\ActSeenable;

class ContactMessage extends Model
{
    use ActSeenable;

    // Your model code here
}
```

### Accessing Seen Status in Code

```php
// Mark a record as unseen
$message->setNotSeen();
// Mark a record as seen
$message->markAsSeen();
// Check if a record is seen by the current user
if ($message->isSeen()) {
    // Do something
}
```

### Example Scenario

If you have a model, say `Order`, and you want to track whether each order has been seen by a user, simply add
the `Seenable` trait to the model:

```php
use BaraaAlKhateeb\Seen\Traits\ActSeenable;

class Order extends Model
{
    use ActSeenable;
}
```

Now, every `Order` instance will have "seen" functionality, allowing you to track which orders each user has viewed.

## Credits

- **Baraa Al Khateeb** - [GitHub](https://github.com/baraakhateeb)

## License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
