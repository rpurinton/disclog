# Disclog

Disclog is a PHP-based logging system that sends application and error logs to a specified webhook URL.

## Installation

1. Clone the repository using `git clone https://github.com/rpurinton/disclog`.
2. Rename `/config/disclog.json.example` to `disclog.json`.
3. Edit `disclog.json` and set the webhook URLs for `app-log` and `error-log`. You can log to the same channel or separate channels, based on your preference. The file should look like this:
    ```json
    {
        "app-log": "https://discord.webhook.url...",
        "error-log": "https://..."
    }
    ```
4. Run `composer install` to generate the autoloader.
5. To make the commands available on the system, run `sudo ln /path/to/scripts/* /usr/bin/`.

## Systemd Service Setup

1. Edit the provided systemd example in `./systemd/disclog.service`. Configure the path to the file which you want to stream to Discord (Default `/var/log/php-fpm/www-error.log`).
2. You can create multiple services to tail multiple files if you want. These files should be symlinked from `/etc/systemd/system`.
3. Run `systemctl daemon-reload` and `systemctl enable disclog.service --now` to start the service (and restart at reboot).

## Usage

You can send a message to either channel from the command line:

```bash
app_log "This is an application log message!"
error_log "This is an error message!"
```

Both commands will also accept STDIN if no arguments are provided. For example:

```bash
uptime | app_log
```

This will display the results of the uptime command in the app_log channel on Discord.

License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
