
### Testing
```
sail pest --watch --colors=always
```
With watch mode colors are not set so this set it. Use `sail pest -xdebug [REST]`
to debug a pest test

### Development
In 2 tabs:
```
sail up (Docker Laravel setup)
sail npm run dev (Frontend CSS/JS generation with Vite)
```

### Migrations
```
sail php artisan migrate:fresh --seed
```
